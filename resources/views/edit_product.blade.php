<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-group textarea {
            resize: vertical;
            height: 100px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{route('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/*">
        <img src="{{ asset('assets/images/product/' . $product->image) }}" alt="productImage" style="max-width: 200px; max-height: 200px;" value="{{old('image',$product->image)}}"/>
        @error('image')
        <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{old('title',$product->title)}}">
        @error('title')
        <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" value="{{old('price',$product->price)}}">
        @error('price')
        <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="short_description">Short Description</label>
        <textarea id="short_description" name="short_description">{{old('short_description',$product->short_description)}}</textarea>
        @error('short_description')
        <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="published">Published</label>
        <input type="checkbox" id="published" name="published" value="1" {{ old('published', $product->published ) ? 'checked' : '' }} >
    </div>
    
    <button type="submit" class="btn">Edit</button>
</form>


    </div>
</body>
</html>
