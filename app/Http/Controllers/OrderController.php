<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function show(Order $order){
        return view('order.show', compact('order'));
    }
    
    public function edit(Order $order){
        if(auth()->id() !== $order->user_id){
            return redirect()->back()->with('error', 'You cannot edit this order.');
        }
        return view('order.edit', compact('order'));
    }
    
    public function update(Request $request, Order $order){
        if(auth()->id() !== $order->user_id){
            return redirect()->back()->with('error', 'You cannot edit this order.');
        }
        
        $order->update($request->only(['amount', 'Note']));
        return redirect()->route('order.show', $order)->with('success', 'Order updated.');
    }
    public function updateNote(Request $request, $id) {
        $order = Order::findOrFail($id);
    
        if ($order->User_id == auth()->id()) {
            $order->Note = $request->input('note');
            $order->save();
            return redirect()->route('dashboard')->with('status', 'Note updated successfully.');
        } else {
            return redirect()->route('dashboard')->with('status', 'You are not authorized to update this note.');
        }
    }
    
}
