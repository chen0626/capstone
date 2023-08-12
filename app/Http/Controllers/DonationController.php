<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function show($animal)
    {
        return view('donation', ['animal' => $animal]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer',
            'note' => 'nullable|string|max:250',
        ]);
    
        $userId = Auth::id();
    
        Order::create([
            'User_id' => $userId,
            'animal' => $request->input('animal'),
            'amount' => $request->input('amount'),
            'Note' => $request->input('note'),
        ]);
    
        return redirect()->route('dashboard')->with('status', 'Donation recorded successfully!');
    }
}
