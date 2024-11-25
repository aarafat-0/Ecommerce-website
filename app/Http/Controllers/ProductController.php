<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);
        
        $product = new Product();

        if ($request->image) {
            $image = $request->image;
            $name = time() . '.' . "webp";
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->image = $name;
        } else {
            $product->image = 'default.png';
        }

        
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];

        $product->save();

        return redirect()->route('products.index')->with('status', 'product added successfully');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);
        if ($request->image) {
            if ($product->image != 'default.png') {
                $image_path = public_path('/images/') . $product->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $name = time() . '.' . "webp";
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }

        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];

        $product->save();

        return redirect()->route('products.show', ['product' => $product])->with('status', 'product updated successfully');
    }


    public function destroy(Product $product)
    {
        if ($product->image != 'default.png') {
            $image_path = public_path('/images/') . $product->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('status', 'product deleted successfully');
    }
    
}
