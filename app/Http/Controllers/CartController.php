<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function getCartPage() {
        $cart_items = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart', ['cart_items' => $cart_items]);
    }

    public function addProduct(Request $request) {

        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $user_id = Auth::user()->id;
        $product = Product::find($product_id);
        $cart_item = Cart::where([['product_id', $product->id], ['user_id', $user_id]])->first();

        if(!$product) {
            return redirect()->back();
        }

        if(!$cart_item) {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        } else {
            $new_quantity = $cart_item->quantity + $quantity;
            if($new_quantity > $product->stock) {
                $new_quantity = $product->stock;
            }
            DB::table('carts')->where([['product_id', $product->id], ['user_id', $user_id]])
            ->update(['quantity' => $new_quantity]);
        }

        return redirect()->route('CartPage');
    }

    public function deleteProduct($product_id) {
        $user_id = Auth::user()->id;
        $product = Product::find($product_id);

        Cart::where([['product_id', $product->id], ['user_id', $user_id]])->delete();

        return redirect()->back();
    }

    public function makeOrder(Request $request) {
        $items = [];
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}_/', $key)) {
                $uuid = substr($key, 0, 36);
                $attribute = substr($key, 37);
                $index = -1;
                foreach ($items as $i => $item) {
                    if ($item['id'] === $uuid) {
                        $index = $i;
                        break;
                    }
                }
                if ($index === -1) {
                    $index = count($items);
                    $items[] = ['id' => $uuid];
                }
                $items[$index][$attribute] = $value;
            }
        }

        $user_id = Auth::user()->id;
        $trHeaderController = new TransactionHeaderController();
        $trHeader = $trHeaderController->createTransactionHeader();

        $trDetailController = new TransactionDetailController();
        foreach ($items as $item) {
            if (isset($item['checkbox'])) {
                $product = Product::find($item['id']);
                $quantity = $item['quantity'];
                Cart::where([['product_id', $product->id], ['user_id', $user_id]])->delete();
                $product->decrement('stock', $quantity);
                $trDetailController->createTransactionDetail($trHeader->id, $product->id, $quantity);
            }
        }

        return redirect()->route('HomePage');
    }
}
