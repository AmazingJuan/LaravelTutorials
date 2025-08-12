<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ['id' => '1', 'name' => 'TV', 'description' => 'Best TV', 'price' => '5000'],
        ['id' => '2', 'name' => 'iPhone', 'description' => 'Best iPhone', 'price' => '1000'],
        ['id' => '3', 'name' => 'Chromecast', 'description' => 'Best Chromecast', 'price' => '200'],
        ['id' => '4', 'name' => 'Glasses', 'description' => 'Best Glasses', 'price' => '400'],
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = ProductController::$products;

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $product = null;
        foreach (ProductController::$products as $prod) {
            if ($prod['id'] === $id) {
                $product = $prod;
                break;
            }
        }

        if (! $product) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData['title'] = $product['name'].' - Online Store';
        $viewData['subtitle'] = $product['name'].' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product - Online Store';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|gt:0',
        ]);
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Successfully created a product - Online Store';

        return view('product.success')->with('viewData', $viewData);
        // here will be the code to call the model and save it to the database
    }
}
