@extends('site.template')
@section('pageContent')
<a href="" id="showProduct">Show Product</a>
@stop

@section('js')
<script>
    $('#showProduct').on('click', function(){
        $.ajax({
            url:"/getajaxproduct",
            type:"post",
            data:{
                "_token":"{{ csrf_token() }}"
            }
        })
        
    })
</script>
@stop