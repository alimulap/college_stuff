<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function category($category)
    {
        //$categories = ['food-beverage', 'beauty-health', 'home-care', 'baby-kid'];
        switch ($category) {
            case 'food-beverage':
                $title = 'Food & Beverage';
                $products = [
                    ['name' => 'Bread', 'price' => 2],
                    ['name' => 'Milk', 'price' => 3],
                    ['name' => 'Eggs', 'price' => 1],
                ];
                break;
            case 'beauty-health':
                $title = 'Beauty & Health';
                $products = [
                    ['name' => 'Soap', 'price' => 2],
                    ['name' => 'Shampoo', 'price' => 3],
                    ['name' => 'Toothpaste', 'price' => 2],
                ];
                break;
            case 'home-care':
                $title = 'Home Care';
                $products = [
                    ['name' => 'Detergent', 'price' => 3],
                    ['name' => 'Floor Cleaner', 'price' => 4],
                    ['name' => 'Glass Cleaner', 'price' => 2],
                ];
                break;
            case 'baby-kid':
                $title = 'Baby & Kid';
                $products = [
                    ['name' => 'Diapers', 'price' => 5],
                    ['name' => 'Milk', 'price' => 3],
                    ['name' => 'Baby Wipes', 'price' => 2],
                ];
                break;
            default:
                $title = 'Products';
                $products = [];
                break;
        }
        return view('products.category')
            ->with('title', $title)
            ->with('products', $products);
    }
}
