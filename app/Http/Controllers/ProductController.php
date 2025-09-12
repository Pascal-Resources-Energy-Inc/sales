<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            // dd($request->all());

            $this->validate($request, [
                'product_name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'deposit' => 'nullable|numeric|min:0',
                'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $data = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'deposit' => $request->deposit,
            ];

            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads/products');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);
                $data['product_image'] = $imageName;
            }

            $product = Product::create($data);

            // dd($product);

            return redirect()->route('popular')->with('success', 'Product added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            // dd($request->all());

            $request->validate([
                'product_name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'deposit' => 'nullable|numeric|min:0',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $data = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'deposit' => $request->deposit,
            ];

            if ($request->hasFile('product_image')) {
                if ($product->product_image && file_exists(public_path('uploads/products/' . $product->product_image))) {
                    unlink(public_path('uploads/products/' . $product->product_image));
                }

                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads/products');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);
                $data['product_image'] = $imageName;
            }

            $product->update($data);

            // dd($product);

            return redirect()->route('popular')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->product_image && file_exists(public_path('uploads/products/' . $product->product_image))) {
                unlink(public_path('uploads/products/' . $product->product_image));
            }

            $product->delete();

            return redirect()->route('popular')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }

    public function getProducts()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return response()->json($products);
    }
}
