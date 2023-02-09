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
                                <h4 class="card-title ">Category</h4>
                                <style>
                                    .card-title{
                                        margin-left: 10px;  
                                    }
                                </style>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('getAddCategory') }}" class="btn btn-sm btn-primary">Add Category</a>
                                <style>
                                    .btn{
                                        margin-left: 100px;
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
                                                Category Name
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            {{-- <th>
                                                Image
                                            </th>
                                            <th>
                                                Cost
                                            </th>
                                            <th>
                                                Action
                                            </th> --}}
                                        </thead>
                                        <tbody>
                                            @foreach(
                                                $categories as $Category
                                            )
                                            <tr>
                                                <td>
                                                    {{ $Category->id }}
                                                </td>
                                                <td>
                                                    {{ $Category->categoryname }}
                                                </td>
                                                {{-- <td>
                                                    {{ $Product->category }}
                                                </td>
                                                <td>
                                                    <img style="width: 10%" height="20%" src="{{ asset('site/uploads/product/'.$Product->image) }}">
                                                   
                                                </td>
                                                <td>
                                                    {{ $Product->cost }}
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('getEditCategory', $Category->id) }}">Edit | </a>
                                                    <a href="{{ route('getDeleteCategory', $Category->id) }}">Delete</a>
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