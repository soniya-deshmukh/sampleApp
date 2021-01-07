@extends('layouts.app')
 
@section('content') 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD n Git Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> <span class="glyphicon glyphicon-plus"></span> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
          <label for="filter" class="col-sm-2 col-form-label">Filter</label>
          <input type="text" class="form-control" id="filter" name="filter" placeholder="Product name..." value="{{$filter}}">
        </div>
      </form>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>@sortablelink('name')</th>
            <th>@sortablelink('detail')</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->appends(\Request::except('page'))->render() !!}
  {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
      
@endsection
