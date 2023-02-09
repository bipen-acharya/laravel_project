@extends('site.template')
@section('pageContent')
@if(session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif
<form action="{{ route('postAddProducts') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="main-content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="form-row">
                                    <h3>Add Product</h3>
                                    </br>
                                    <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name of the product" name="productname">
                                </div>
                            </br>
                            </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control" name="category">
                                        <option selected>Choose...</option>
                                        <option>Breakfast</option>
                                        <option>Snack</option>
                                        <option>Lunch</option>
                                        <option>Dinner</option>
                                        
                                    </select>
                                </br>
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label for="inputState"> Image</label>
                                    <input type="file" class="form-control" name="product_image" id="product_image">
                                </br>
                                </div>
                            
                                <div class="form-group col-md-2">
                                    <label>Cost</label>
                                    <input type="text" class="form-control" name="cost">
                                </br>
                                </div>
                            </br>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@stop