@extends('layouts.master')

@section('title', 'Products')


@section('content')

    @if ($products->count() == 0)
        @if (Session::has('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>No products found</h1>
    @else
        @if (Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach ($products as $product)
            <div class="card" style="width: 17rem;">
                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="..."> 
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h5 class="card-title">{{ $product->price }}$</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-outline-success">
                        Show details
                    </a>
                </div>
            </div>
        @endforeach
        {{ $products->links() }}
    @endif
@endsection
