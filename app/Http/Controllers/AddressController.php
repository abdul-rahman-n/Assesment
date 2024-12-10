<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
        ]);

        UserAddress::create([
            'user_id' => auth()->id(),
            'location_name' => $request->location_name,
            'address' => $request->address,
            'pincode' => $request->pincode,
        ]);

        return redirect()->route('dashboard')->with('success', 'Address added successfully.');
    }

    public function edit($id)
    {
        $address = UserAddress::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
        ]);

        $address = UserAddress::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $address->update($request->only(['location_name', 'address', 'pincode']));

        return redirect()->route('dashboard')->with('success', 'Address updated successfully.');
    }
}