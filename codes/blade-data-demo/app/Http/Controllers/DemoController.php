<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function showData()
    {
        $name = 'Devi';
        $fruits = ['Apple', 'Banana', 'Cherry'];
        $user = [
            'name' => 'Eva',
            'email' => 'eva@ilmudata.id',
            'is_active' => true,
        ];
        $product = (object)[
            'id' => 1,
            'name' => 'Laptop',
            'price' => 12000000
        ];

        return view('demo', compact('name', 'fruits', 'user', 'product'));
    }
}
