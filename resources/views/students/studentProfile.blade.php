<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .profile_container {
        background: linear-gradient(rgb(255, 149, 149)(225, 0, 255), rgb(123, 123, 252)) !important;
    }
</style>

<body class="p-3">
    <a href="{{ route('logout') }}">
        <button class="btn btn-secondary p-2">Logout</button>
    </a>
    <div class=" mx-auto mt-4 p-2 profile_container" style="max-width: 50% ">
        <h4 class="text-center">Student Profile </h4>
        <h6 class="my-3">Name: {{ $data->name }}</h6>
        <h6 class="my-3">Email: {{ $data->email }}</h6>
        <h6 class="my-3">Mark: {{ $data->marks }}</h6>
        <h6 class="my-3">Status: {{ $data->status }}</h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
