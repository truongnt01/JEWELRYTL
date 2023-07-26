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
    <h1>UPDATING CATEGORY</h1>
    <a href="{{ route('category.index') }}">Back to Product's dashboard</a>
    
    <form action="{{ route('category.update',$data->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        
        <label for="">Name: </label> <input type="text" name="name" value="{{ $data->name }}">
        <br><br>
        <input type="hidden" name="hidden_id" value="{{ $data->id }}">
        <button>Save</button>
    </form>
</main>
    
@endsection
