<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



<body>
    @if ($errors->has('email'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 70% ;margin:1% auto">
            {{ $errors->first('email') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex align-items-center justify-content-center flex-column">
        <div class="mt-5 d-flex align-items-center gap-4">
            <a href="/"><button class="bg-warning btn">Back </button></a>
            <h4>Login</h4>

        </div>
        <form action="{{ route('login') }}" method="post" class="p-4 border rounded shadow-sm mt-4">
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
                {{-- @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror --}}
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password"
                    value="{{ old('password') }}">
                {{-- @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror --}}
            </div>
            <button type="submit" class="btn btn-primary mb-2" style="width: 100%">Submit</button>
            <a href="/register">create new account</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
