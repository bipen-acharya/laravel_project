@extends('site.template')
@section('pageContent')
<div class="main-content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                @if(session('deleteStatus'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('deleteStatus') }}
                                </div>
                                @endif
                                <h4 class="card-title ">Product</h4>
                                <style>
                                    .card-title{
                                        margin-left: 10px;  
                                    }
                                </style>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('getAddProducts') }}" class="btn btn-sm btn-primary">Add Product</a>
                                <style>
                                    .btn{
                                        margin-left: 150px;
                                    }
                                </style>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Category
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Cost
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach(
                                                $products as $Product
                                            )
                                            <tr>
                                                <td>
                                                    {{ $Product->id }}
                                                </td>
                                                <td>
                                                    {{ $Product->name }}
                                                </td>
                                                <td>
                                                    {{ $Product->category }}
                                                </td>
                                                <td>
                                                    <img style="width: 50px; height:10%" src="{{ asset('site/uploads/product/'.$Product->image) }}">  
                                                </td>
                                                <td>
                                                    {{ $Product->cost }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('getEditProduct', $Product->id) }}">Edit | </a>
                                                    <a href="{{ route('getDelete', $Product->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop