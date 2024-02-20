<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHomePage() {

        $productController = new ProductController();
        $new_products = $productController->getNewestProducts();
        $best_sellers = $productController->getBestSellingProducts();

        if(Auth::user()) {
            return view('home', ['new_products' => $new_products, 'best_sellers' => $best_sellers]);
        } else {
            return redirect()->route('LoginPage');
        }
    }
}
