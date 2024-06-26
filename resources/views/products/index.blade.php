@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Table Products') }}</div>
  
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-secondary">
                        Tambah Product
                    </a>
                    <a href="{{ route('products-export') }}" class="btn btn-sm btn-primary">
                        Export Product to Excel
                    </a>
                    <a id="importButton" class="btn btn-sm btn-warning">
                        Import Product
                    </a>
                    <table class="table table-striped" id="products">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Buying Price</th>
                                <th scope="col">Product Type</th>
                                <th scope="col">Product Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; ?>
                        @foreach($products as $row)
                        <?php $no++ ?>
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{$row->product_name}}</td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->selling_price}}</td>
                            <td>{{$row->buying_price}}</td>
                            <td>{{$row->product_type->product_type_name}}</td>
                            <td>
                                @if ($row->qty > 0)
                                    Available
                                @else
                                    Unavailable
                                @endif
                            </td>
                                <td> 
                                    <a href="{{ route('products.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy',$row->id) }}" method="POST"
                                    style="display: inline" onsubmit="return confirm('Do you really want to delete {{ $row-> product_name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                        Delete
                                    </span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="importModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('products-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamic_modal_title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#importButton').click(function() {
                $('#dynamic_modal_title').text('Add Import Product');
                $('#importModal').modal('show');
            });
        })
        new DataTable('#products');
    </script>
    @endsection