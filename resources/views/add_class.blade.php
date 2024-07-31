<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD new </title>
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
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        input[type="time"],
        input[type="checkbox"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            width: auto;
            margin-right: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div>
        <h1>ADD NEW Class </h1>
        <form action="{{ route('save') }}" method="POST">
            @csrf
            
            <!-- Class Name -->
            <label for="className">Class Name:</label>
            <input type="text" id="className" name="className" maxlength="100" required>
            @error('className')
            <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <!-- Capacity -->
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>
            @error('capacity')
            <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <!-- Is Fulled -->
            <label for="is_fulled">Is Fulled:</label>
            <input type="checkbox" id="is_fulled" name="is_fulled">

            <!-- Price -->
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
            @error('price')
            <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <!-- Time From -->
            <label for="time_from">Time From:</label>
            <input type="time" id="time_from" name="time_from" required>
            @error('time_from')
            <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <!-- Time To -->
            <label for="time_to">Time To:</label>
            <input type="time" id="time_to" name="time_to" required>
            @error('time_to')
            <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <!-- Published -->
            <label for="published">Published:</label>
            <input type="checkbox" id="published" name="published">

            <button type="submit" >Submit</button>
        </form>
    </div>
</body>
</html>
