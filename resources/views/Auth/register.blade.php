<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div class="mt-5 d-flex align-items-center gap-4">
        <a href="/"><button class="bg-warning btn">Back </button></a>
        <h4>Register</h4>

    </div>
    <form action="{{ route('register') }}" method="post" class="p-4 border rounded shadow-sm mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name"
                value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email"
                value="{{ old('email') }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password"
                value="{{ old('password') }}">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <div class="d-flex gap-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="role" id="teacher" value="1"
                        {{ old('role') == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="teacher">Teacher</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="role" id="student" value="0"
                        {{ old('role') == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="student">Student</label>
                </div>
            </div>

            @error('role')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2" style="width: 100%">Submit</button>
        <a href="/login">allready have a account?</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
