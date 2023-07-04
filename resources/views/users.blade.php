<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
</head>

<body>
    <h1>Users</h1>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div>

        /* <a href="{{ route('export_users') }}">Export Excel</a>*/
        <a href="{{ route('export_users_pdf') }}" class="btn btn-primary">Export PDF</a>
        <form action="{{ route('import_users') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".xlsx, .xls, .csv">
            <button type="submit">Import Users</button>

    </div>
    <table id="my-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
