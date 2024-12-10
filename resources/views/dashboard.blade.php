<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap 5 CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Logout button at the top right -->
    <form method="POST" action="{{ route('logout') }}" class="position-absolute top-0 end-0 m-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <!-- Main Container -->
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h1 class="text-success">Dashboard</h1>
            <h4>Welcome, {{ $user->name }}</h4>
            <p class="text-muted">{{ $user->email }}</p>
        </div>

        <!-- Profile Section -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Profile Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Father's Name:</strong> {{ $user->profile->father_name ?? 'Not updated' }}</p>
                <p><strong>Mother's Name:</strong> {{ $user->profile->mother_name ?? 'Not updated' }}</p>
                <div class="text-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Update Profile</a>
                </div>
            </div>
        </div>

        <!-- Address Section -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">User Addresses</h5>
            </div>
            <div class="card-body">
                @if($user->addresses->isEmpty())
                <p class="text-muted">No address added</p>
                @else
                <ul class="list-group">
                    @foreach($user->addresses as $address)
                    <li class="list-group-item">
                        <strong>Location:</strong> {{ $address->location_name }}<br>
                        <strong>Address:</strong> {{ $address->address }}<br>
                        <strong>Pincode:</strong> {{ $address->pincode }}<br>
                        <a href="{{ route('address.edit', $address->id) }}" class="btn btn-sm btn-primary mt-2">Edit</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="text-end mt-3">
                    <a href="{{ route('address.create') }}" class="btn btn-success">Add New Address</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>