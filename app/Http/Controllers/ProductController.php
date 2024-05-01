<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Product;
use App\Models\Theater;
use App\Models\TheaterMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function addProduct()
    {
        return view('dashboard.product.form');
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->back();
    }

    public function listProduct()
    {
        $data = ['products' => Product::all()];

        return view('dashboard.product.list', $data);
    }

    public function editProduct($id)
    {
        $data = ['product' => Product::find($id)];

        return view('dashboard.product.edit', $data);
    }

    public function updateProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        Product::find($request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('product.list');
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();

        return redirect()->route('product.list');
    }

}
