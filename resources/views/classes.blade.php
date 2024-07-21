<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div>
        <h1>Class Details</h1>
        <table>
            <tr>
                <th>Class Name</th>
                <th>Capacity</th>
                <th>Is Fulled</th>
                <th>Price</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Published</th>
                <th>Edit</th>

            </tr>
            @foreach ($class as $clas)
            <tr>
                
                <td>{{$clas['className']}}</td>
                <td>{{ $clas['capacity'] }}</td>
                <td>{{ $clas['is_fulled']=="1"? 'Yes' : 'No' }}</td>
                <td>{{ $clas['price'] }}</td>
                <td>{{ $clas['time_from'] }}</td>
                <td>{{$clas['time_to'] }}</td>
                <td>{{$clas['published']=="1"? 'Yes' : 'No' }}</td>
                <td><a href="{{route('class.edit',$clas['id'])}}">Edit</a></td>
            </tr>
            @endforeach

        </table>
    </div>
</body>
</html>
