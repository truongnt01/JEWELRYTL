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
    <h1>ADD NEW ATTRIBUTE</h1>
    <a href="{{ route('attribute.index') }}">Back to Category's dashboard</a>
    <form action="{{ route('attribute.store') }}" method="post" enctype="multipart/form-data">
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
        <label for="">Value: </label> <input type="text" name="name">
        <br><br>
        <button>Save</button>
    </form>
</main>
    
@endsection
