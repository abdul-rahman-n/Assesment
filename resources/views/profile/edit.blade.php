<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<body>
    <h1>Update Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div>
            <label>Father's Name</label>
            <input type="text" name="father_name" value="{{ old('father_name', $user->profile->father_name ?? '') }}">
            @error('father_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Mother's Name</label>
            <input type="text" name="mother_name" value="{{ old('mother_name', $user->profile->mother_name ?? '') }}">
            @error('mother_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>

</html>