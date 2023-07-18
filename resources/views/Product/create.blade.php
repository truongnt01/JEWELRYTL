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
    <h1>ADD NEW PRODUCT</h1>
    <a href="{{ route('product.index') }}">Back to Product's dashboard</a>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <label for="">Name: </label> <input type="text" name="name">
        <br><br>
        <label for="">Image: </label> <img src="" alt="" id="show_file"> <input type="file" name="image" accept="image/*" onchange="showFile(event)">
        <br><br>
        <label for="">Description: </label> <input type="text" name="description">
        <br><br>
        <label for="">Price:</label> <input type="text" name="price">
        <br><br>
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