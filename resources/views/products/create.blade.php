@extends('layouts.master')

@section('title', 'Create Product')


@section('content')
    <form class="add-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Create Product</h1>
        <label for="image" class="form-label">Product image</label>
        <input class="form-control" type="file" name="image" id="image">
        @error('image')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <label for="name">Product name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value={{ old('price') }}>
        @error('price')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity" value={{ old('quantity') }}>
        @error('quantity')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-outline-primary" id="add-btn">Add Product</button>
        
    </form>
@endsection
