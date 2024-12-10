<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addresses</title>
</head>

<body>
    <h1>Your Addresses</h1>

    <ul>
        @foreach($addresses as $address)
        <li>
            <p>{{ $address->address1 }}, {{ $address->address2 }} - {{ $address->pincode }}</p>
            <form method="POST" action="{{ route('address.update', $address->id) }}">
                @csrf
                <div>
                    <label>Address 1</label>
                    <input type="text" name="address1" value="{{ $address->address1 }}">
                </div>
                <div>
                    <label>Address 2</label>
                    <input type="text" name="address2" value="{{ $address->address2 }}">
                </div>
                <div>
                    <label>Pincode</label>
                    <input type="text" name="pincode" value="{{ $address->pincode }}">
                </div>
                <button type="submit">Update</button>
            </form>
        </li>
        @endforeach
    </ul>

    <h2>Add New Address</h2>
    <form method="POST" action="{{ route('address.add') }}">
        @csrf
        <div>
            <label>Address 1</label>
            <input type="text" name="address1" required>
        </div>
        <div>
            <label>Address 2</label>
            <input type="text" name="address2">
        </div>
        <div>
            <label>Pincode</label>
            <input type="text" name="pincode" required>
        </div>
        <button type="submit">Add Address</button>
    </form>
</body>

</html>