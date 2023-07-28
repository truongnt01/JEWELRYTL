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
      <a href="{{ route('attribute.create') }}">Add More Attribute</a>
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>VALUE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            
              @foreach ($data as $item => $value)
              <tr>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->value }}</td>
                  <td>
                    <a style="cursor: pointer"
                    onclick="
                        if (confirm('Are you sure?')) {
                            document.getElementById('item-{{ $value->id }}').submit();
                        }
                    ">Xóa</a>
                    <form action="{{route('category.destroy', $value)}}"
                          id="item-{{$value->id}}"
                          method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                        {{--  --}}
                      <a href="{{ route('category.edit', $value) }}">CHANGE</a>
                  </td>
              </tr>
          @endforeach          
            </tbody> 
          </table>
          <div>
            {{ $data->links() }}
        </div>
    </main>
@endsection