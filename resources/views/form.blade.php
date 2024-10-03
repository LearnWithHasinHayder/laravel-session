<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Form to Show Form Errors</title>
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">

</head>
<body>

    <h1>Form Validation</h1>
    <form method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Password Confirmation:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>
    <p>
        <h2>All Errors</h2>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            <p>No errors found</p>
        @endif
    </p>

</body>
</html>

