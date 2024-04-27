@extends('layouts.app')

@section('breadtitle', 'Products')
@section('breaddesc', 'List of all products')

@section('bodycontent')
<div>
    <a href="{{ route('product.create') }}" class="btn mb-2 btn-outline-primary">New Product</a>
</div>
@endsection
@section('cardcontent')
<table class="table datatables" id="dataTable-1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->users->name }}</td>
                    <td>
                        <button
                            class="btn btn-sm dropdown-toggle more-horizontal"
                            type="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('product.edit', $product) }}">Edit</a>
                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                               <button class="dropdown-item">Remove</button>
                            </form>
                        </div>
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
@endsection
@section('jscontext')
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [
                16, 32, 64, -1
            ],
            [
                16, 32, 64, "All"
            ]
        ]
    });
</script>
@endsection