@extends('site.template')
@section('pageContent')
@if(session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif
<form action=" {{route('postEditCategory', $category->id)}} " method="POST">
    @csrf()
    <div class="main-content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="form-row">
                                    <h3>Edit Category</h3>
                                    </br>
                                    <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name of the product" value="{{ $category->categoryname}}" name="categoryname">
                                </div>
                            </br>

                            <button type="submit" class="btn btn-primary">Edit Category</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@stop