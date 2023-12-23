<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Student Table</title>
</head>

<body>
    <div class="d-flex justify-content-between p-3 align-items-center">

        @if (auth()->check())
            <h4 class="m-2"> welcome {{ auth()->user()->name }}</h4>
        @else
            Welcome, Guest
        @endif
        <a href="{{route('logout')}}">

            <button class="btn btn-secondary p-2">Logout</button>
        </a>
    </div>

    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="mb-4">Student Data Table</h2>
            <a href="{{ route('add.studentResult.view') }}" class="ms-auto"> <button
                    class="btn bg-primary text-light">Add Student</button></a>
        </div>

        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Marks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student_table.ajax') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'marks',
                        name: 'marks'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'mycolu',
                        name: 'mycolu'
                    },
                ]
            });
        });
    </script>
</body>

</html>
