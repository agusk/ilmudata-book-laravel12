<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ProductViewModel;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function result(Request $request)
    {
        $product = new ProductViewModel(
            $request->input('name'),
            (float) $request->input('price')
        );

        return view('product.result', [
            'name' => $product->getName(),
            'formattedPrice' => $product->getFormattedPrice()
        ]);
    }
}
