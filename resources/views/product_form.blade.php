@extends('welcome')
@section('main_content')

@if (!isset($product))
<div class="container">
    <h2>Add product</h2>
    <form action="product_insert" method="POST">
        @csrf
        <label for="p_name">enter product name</label>
        <input type="text" name="p_name" id="" required class="form-control"><br>

        <label for="p_price">enter product price</label>
        <input type="number" name="p_price" id="" required class="form-control">
        <br>
        <label for="p_description">enter product description</label><br>
        <textarea name="p_description" id="" cols="30" rows="" required class="form-control"></textarea><br>
        <input type="submit" value="submit" class="btn btn-primary form">
    </form>
</div>
@endif

{{-- update product form --}}
@if (isset($product))
<div class="container">
    <h2>Update Product</h2>
    <form action="{{ route('product_update_details', ['id' => $product->id]) }}" method="POST">
        <form action="">
            @csrf
            <label for="p_name">Product Name:</label>
            <input type="text" name="p_name" value="{{ $product->p_name }}" class="form-control"><br><br>

            <label for="p_price">Product Price:</label>
            <input type="text" name="p_price" value="{{ $product->p_price }}" class="form-control"><br><br>

            <label for="p_description">Product Description:</label>
            <textarea name="p_description" class="form-control">{{ $product->p_description }}</textarea><br><br>

            <input type="submit" value="update product" class="btn btn-primary">
        </form>
</div>
@endif

{{-- {{ print_r($product_details) }} --}}
<br>

<h2>Product List</h2>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach($product_details as $p)
    <tr>
        <td>{{ $p['p_name'] }}</td>
        <td>{{ $p['p_price'] }}</td>
        <td>{{ $p['p_description'] }}</td>
        <td>
            <a href="{{ route('product_update', ['id' => $p['id']]) }}" class="btn btn-primary">update</a>
            <a href="{{ route('product_delete', ['id' => $p['id']]) }}" class="btn btn-danger">delete</a>
        </td>
    </tr>
    @endforeach
</table>



@if (session("insert"))
<span style="color: green"> {{ session('insert')  }} </span>
@endif
@if (session("del"))
<span style="color: red">{{ session('del')  }} </span>
@endif

@endsection