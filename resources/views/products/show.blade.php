@extends('layouts.master')

@section('title', 'Product Details')


@section('content')

    @if (Session::has('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- product card --}}
    <div class="card" style="width: 18rem;">
        {{-- <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="..."> --}}
        <img src="{{ $product->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <h5 class="card-title">{{ $product->price }}$</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Available : {{ $product->quantity }}</p>
        </div>
        <div class="btn-group">
            <button class="btn btn-outline-info" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#editModal">Update</button>
            <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            <a href="#"><button class="btn btn-outline-dark">Add To Cart</button></a>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="editModal" data-bs-backdrop="center" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- edit form --}}
                    <form class="edit-form" action="{{ route('products.update', ['product' => $product->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="image" class="form-label">Product image</label>
                        <input class="form-control" type="file" name="image" id="image">
                        @error('image')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{ $product->description }}">
                        @error('description')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" value={{ $product->price }}>
                        @error('price')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="quantity" value={{ $product->quantity }}>
                        @error('quantity')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                @if ($errors->any())
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif

                </form>
            </div>
        </div>
    </div>

@endsection
