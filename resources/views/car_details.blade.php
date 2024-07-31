<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        .car-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .car-image img {
            max-width: 100%;
            border-radius: 8px;
        }
        .details {
            font-size: 18px;
            color: #333;
        }
        .details p {
            margin: 10px 0;
        }
        .details .label {
            font-weight: bold;
        }
        .details .value {
            color: #555;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            color: #fff;
            background-color: #6f42c1;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $car->carTable }} Details</h1>
        </div>
        <div class="car-image">
            <img src="{{asset('assets/images/'.$car->image) }}" alt="Car Image">
        </div>
        <div class="details">
            <p><span class="label">Car Name:</span> <span class="value">{{ $car->carTable }}</span></p>
            <p><span class="label">Description:</span> <span class="value">{{ $car->description }}</span></p>
            <p><span class="label">Price:</span> <span class="value">${{ $car->price }}</span></p>
        </div>
        <div class="button-container">
            <a href="{{ route('cars.index') }}">Return to All Cars</a>
        </div>
    </div>
</body>
</html>
