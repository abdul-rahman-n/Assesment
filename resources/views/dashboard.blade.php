<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <!-- Logout button at the top right -->
    <form method="POST" action="{{ route('logout') }}" style="position: absolute; top: 10px; right: 10px;">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Dashboard</h1>
    <p>Welcome, {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <h2>Profile Information</h2>
    <p>Father's Name: {{ $user->profile->father_name ?? 'Not updated' }}</p>
    <p>Mother's Name: {{ $user->profile->mother_name ?? 'Not updated' }}</p>
    <a href="{{ route('profile.edit') }}">Update Profile</a>

    <h2>Addresses</h2>
    @if($user->addresses->isEmpty())
    <p>No address added</p>
    @else
    <ul>
        @foreach($user->addresses as $address)
        <li>
            <strong>Location:</strong> {{ $address->location_name }}<br>
            <strong>Address:</strong> {{ $address->address }}<br>
            <strong>Pincode:</strong> {{ $address->pincode }}<br>
            <a href="{{ route('address.edit', $address->id) }}">Edit</a>
        </li>
        @endforeach
    </ul>
    @endif
    <a href="{{ route('address.create') }}">Add New Address</a>
</body>

</html>