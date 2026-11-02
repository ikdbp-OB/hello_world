<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return view('dashboard', compact('order'));
    }

    public function store(Request $request){
        return DB::transaction(function () use ($request)){
            $order = Order::create([
                'total' = 0,
                'status' = 'pendding',
            ]);

            $totalSum = 0;
            $attachData = [];

            foreach ($request->products as $item){
                $product = Product::findOrFail($item['id']);
                $sumtotal = $product->price * $item['quantity'];
                $totalSum = $subtotal;

                $attachData[$product->id] = [
                    'quatity' => $item['quatity'],
                    'price' => $product->price,
                ]
            }
            $order->products()->attach($attachData);

            $order->update(['total' => $subtotal]);

            return response()->json([
                'message' => 'Creado';
                'order' => $order->load('products')
            ])
        }
    }   
}
