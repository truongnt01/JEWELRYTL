@extends('Layout_admin.layout')
@section('layout')
<style>
table {
    width: 100%;
    border-collapse: collapse;
  }
  
  thead th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 8px;
  }
  
  tbody td {
    border-bottom: 1px solid #ddd;
    padding: 8px;
  }
  
  tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  tbody tr:hover {
    background-color: #e6e6e6;
  }
  img {
        max-width: 100px;
        height: auto;
    }
  tbody td a {
    margin-right: 5px;
    text-decoration: none;
    color: #333;
  }
  
  tbody td a:hover {
    color: #000;
  }
  </style>
@endsection
@section('content')
    <main>
      @if ($message= Session::get('success'))
          <div>
            <ul>
              <li>{{ $message }}</li>
            </ul>
          </div>
      @endif       
      <a href="{{ route('product.create') }}">Add More Product</a>
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td><img src="{{ asset('/image/'.$value->image) }}" alt=""></td>
                        <td>{{ $value->description }}</td>
                        <td>${{ $value->price }}</td>
                        <td>
                            <a href="">DELETE</a>

                            <a href="{{ route('product.edit', $value) }}">CHANGE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
          </table>
    </main>
@endsection