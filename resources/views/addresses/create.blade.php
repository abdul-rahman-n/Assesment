<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address</title>
</head>

<body>
    <h1>Add New Address</h1>

    <form method="POST" action="{{ route('address.store') }}">
        @csrf
        <div>
            <label>Location Name</label>
            <input type="text" name="location_name" value="{{ old('location_name') }}">
            @error('location_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address') }}">
            @error('address') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Pincode</label>
            <input type="text" name="pincode" value="{{ old('pincode') }}">
            @error('pincode') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Add Address</button>
    </form>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>

</html>