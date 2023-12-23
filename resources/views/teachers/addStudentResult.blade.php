<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div class="mt-5 d-flex align-items-center gap-4">
        <a href="{{route('student_table')}}"><button class="bg-warning btn">Back </button></a>
        <h4> Add Student Results</h4>

    </div>
    <form action="{{ route('add.studentResult') }}" method="post" class="p-4 border rounded shadow-sm mt-4">
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
            <label for="marks" class="form-label">Marks</label>
            <input type="number" class="form-control" name="marks" placeholder="Enter Marks"
                value="{{ old('marks') }}">
            @error('marks')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" placeholder="Enter Status"
                value="{{ old('status') }}">
            @error('status')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
