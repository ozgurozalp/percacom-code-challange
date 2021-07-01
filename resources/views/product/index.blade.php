@extends('layouts.app')

@section('title', 'Ürün Listesi')

@section('content')
    @if (session('message'))
        <div class="alert alert-{{ session('message')['type'] }} alert-dismissible fade show" role="alert">
            <p class="fs-3 mb-0 text-center">{{ session('message')['text'] }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Ürün Listesi</h1>
    <div class="table-responsive-md">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ürün Adı</th>
                <th scope="col">Açıklama</th>
                <th scope="col">Stok</th>
                <th scope="col">Fiyat</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }} ₺</td>
                    <td>
                        <form action="{{ route('product.update', [$product]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button @if ($product->stock === 0) disabled @endif class="btn btn-sm btn-outline-success">
                                Ürünün çıkışını yap
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <th scope="row" colspan="6">
                        <span class="fs-3 text-danger">Ürün Bulunamadı !!!</span>
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <h2 class="mt-2">Parça Listesi</h2>
    <div class="table-responsive-md">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Parça Adı</th>
                <th scope="col">Bağlı olduğu ürün</th>
                <th scope="col">Açıklama</th>
                <th scope="col">Stok</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pieces as $piece)
                <tr>
                    <th scope="row">{{ $piece->id }}</th>
                    <td>{{ $piece->name }}</td>
                    <td>{{ $piece->product->name }}</td>
                    <td>{{ $piece->description }}</td>
                    <td>{{ $piece->stock }}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <th scope="row" colspan="5">
                        <span class="fs-3 text-danger">Parça Bulunamadı !!!</span>
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
