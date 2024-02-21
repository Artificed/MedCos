<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAllProducts() {
        $products = Product::all();
        return $products;
    }

    public function getNewestProducts() {
        $products = Product::latest()->get();
        return $products;
    }

    public function getBestSellingProducts() {
        $find_id = TransactionDetail::selectRaw('product_id, SUM(quantity) as total_quantity')
        ->groupBy('product_id')->orderByDesc('total_quantity')->pluck('product_id');

        $bestSellingProducts = Product::whereIn('id', $find_id)->get();

        return $bestSellingProducts;
    }

    public function getSearchPage(Request $request) {
        $products = Product::where('name', 'LIKE', '%'.$request->filter.'%')->get();

        return view('search', ['products' => $products]);
    }

    public function getCategoryPage($category_name) {
        $category = Category::where('name', 'LIKE', $category_name)->first();

        if(!$category) {
            return view('notfound');
        }

        $products = $category->Product()->get();

        return view('search', ['products' => $products]);
    }

    public function getProductPage($product_name) {
        $product = Product::where('name', 'LIKE', $product_name)->first();

        if(!$product) {
            return view('notfound');
        }

        $product_images = $product->ProductImage()->get();

        $best_sellers = $this->getBestSellingProducts();

        return view('productDetail', ['product' => $product, 'product_images' => $product_images, 'best_sellers' => $best_sellers]);
    }

    public function getNotFoundPage() {
        return view('notfound');
    }
}
