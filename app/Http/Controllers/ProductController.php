<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
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

        Product::create($request->only(['name', 'price']));

        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Successfully created a product - Online Store';

        return view('product.success')->with('viewData', $viewData);
        // here will be the code to call the model and save it to the database
    }
}
