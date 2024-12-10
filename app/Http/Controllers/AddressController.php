<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\UserAddress;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.create');
    }

    public function store(StoreAddressRequest $request)
    {
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

    public function update(UpdateAddressRequest $request, $id)
    {
        $address = UserAddress::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $address->update($request->only(['location_name', 'address', 'pincode']));

        return redirect()->route('dashboard')->with('success', 'Address updated successfully.');
    }
}
