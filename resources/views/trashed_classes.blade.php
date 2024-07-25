<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trashed Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 16px;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .btn-restore {
            background-color: #4CAF50;
        }
        .btn-restore:hover {
            background-color: #45a049;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-delete:hover {
            background-color: #e63629;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions a {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trashed Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($class as $clas)
                    <tr>
                        <td>{{ $clas->className }}</td>
                        <td>{{ $clas->capacity }}</td>
                        <td>{{ $clas->is_fulled == "1" ? 'Available' : 'Not Available' }}</td>
                        <td>{{ $clas->price }}</td>
                        <td>{{ $clas->time_from }}</td>
                        <td>{{ $clas->time_to }}</td>
                        <td>{{ $clas->published }}</td>
                        <td class="actions">
                            
                        <button type="submit" class="btn btn-restore">Restore</button>
                            
                        <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete Permanently</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button ><a href="{{ route('clas') }}" class="btn">Back to All Classes</a></button>
    </div>
</body>
</html>
