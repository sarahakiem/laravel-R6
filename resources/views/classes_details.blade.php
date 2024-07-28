<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Details</title>
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
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 18px;
            margin: 10px 0;
        }
        .card .status {
            font-weight: bold;
            color: #4CAF50;
        }
        .card .status.full {
            color: #F44336;
        }
        .card .info {
            margin-top: 20px;
        }
        .card .info div {
            margin-bottom: 10px;
        }
        .card .info span {
            font-weight: bold;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            margin-right: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button.secondary {
            background-color: #6c757d;
        }
        .button.secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Class Name: <span id="className">{{$classes->className}}</span></h1>
            <p class="status" id="is_fulled">Status:  {{$classes['is_fulled']=="1" ? 'Available':'Not Available'}}  </p>
            <div class="info">
                <div><span>Capacity:</span> <span id="capacity">{{$classes->capacity}}</span></div>
                <div><span>Price:</span> <span id="price">${{$classes->price}}</span></div>
                <div><span>Time:</span> <span id="time_from">{{$classes->time_from}} AM</span> - <span id="time_to">{{$classes->time_to}} AM</span></div>
                <div><span>Published:</span> <span id="published">{{$classes['published']=="1" ? 'yes':'No'}}</span></div>
            </div>
            <a href="#" class="button">Enroll Now</a>
            <a href="{{route('clas')}}" class="button secondary">Back to All Classes</a>
        </div>
    </div>
</body>
</html>
