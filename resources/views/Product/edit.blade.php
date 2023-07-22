@extends('Layout_admin.layout')
@section('layout')
<style>
    form {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    img#show_file {
        max-width: 200px;
        margin-bottom: 10px;
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

@endsection
@section('content')
<main>
    <h1>UPDATING PRODUCT</h1>
    <a href="{{ route('product.index') }}">Back to Product's dashboard</a>
    
    <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        
        <label for="">Name: </label> <input type="text" name="name" value="{{ $product->name }}">
        <br><br>
        <label for="">Image: </label> <img src="{{ asset('/image/'.$product->image) }}" alt="" id="show_file">
        <input type="hidden" name="hidden_product_image" value="{{ $product->image }}">
        <input type="file" name="image" accept="image/*" onchange="showFile(event)">
        <br><br>
        <label for="">Categories: 
            <select name="category" id="category">
                @foreach ($categories as $categoryId => $categoryValue)
                    <option value="{{ $categoryValue->id }}" {{ (isset($product->categories_id) && $product->categories_id == $categoryValue->id) ? 'select' : 
                    '' }}>{{ $categoryValue->name }}</option>
                @endforeach
            </select>   
        <br><br>
        <label for="">Description: </label> <input type="text" name="description" value="{{ $product->description }}">
        <br><br>
        <label for="">Price:</label> <input type="text" name="price" value="{{ $product->price }}">
        <br><br>
        <input type="hidden" name="hidden_id" value="{{ $product->id }}">
        <button>Save</button>
    </form>
</main>
    
@endsection
@section('script')
    <script>
        function showFile(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function (){
                var dataURL = reader.result;
                var output = document.getElementById('show_file');
                output.src = dataURL;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection