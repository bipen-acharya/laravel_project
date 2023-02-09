@extends('site.template')
@section('pageContent')
@if(session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif
<form action=" {{route('postEditProduct', $product->id)}} " method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="main-content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="form-row">
                                    <h3>Edit Product</h3>
                                    </br>
                                    <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name of the product" value="{{ $product->name}}" name="productname">
                                </div>
                            </br>
                            </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control" name="category">
                                        <option @if($product->category=="Breakfast") selected @endif >Breakfast</option>
                                        <option @if($product->category=="Snack") selected @endif >Snack</option>
                                        <option @if($product->category=="Lunch") selected @endif >Lunch</option>
                                        <option @if($product->category=="Dinner") selected @endif >Dinner</option>
                                    </select>
                                </br>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <input type="file" class="form-control" name="product_image" id="product_image">
                                    </div>
                                    <div>
                                        <img style="width: 50px; height:20%" src="{{ asset('site/uploads/product/'.$product->image) }}">
                                    </div>
                                </br>
        
                                </div>
                            
                                <div class="form-group col-md-2">
                                    <label>Cost</label>
                                    <input type="text" class="form-control" name="cost" value="{{ $product->cost}}">
                                </br>
                                </div>
                            </br>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Edit Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@stop