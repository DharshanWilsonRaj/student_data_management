<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Data Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex flex-column justify-content-center gap-3" style="height: 100vh">
        <h6 class="fs-4 text-center mt-3"> Welcome to Students Data Management</h6>
        <div class="d-flex align-items-center justify-content-center gap-2">
            <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
            <a href="{{ route('register') }}"><button class="btn btn-dark">Register</button></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
