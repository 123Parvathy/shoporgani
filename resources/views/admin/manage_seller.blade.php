@extends('admin/layout')
@section('page_title','Seller')
@section('seller_select','active')
@section('container')

@if($id>0)
    {{$image_required=""}}
@else
    {{$image_required="required"}}
@endif

    <h1 class="mb10">Manage Seller</h1>
    <a href="{{url('admin/seller')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('seller.manage_seller_process')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"> Name</label>
                                                <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>
                                            
<div class="form-group">
    <label for="image" class="control-label mb-1"> Image</label>
    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
    @error('image')
    <div class="alert alert-danger" role="alert">
        {{$message}}		
    </div>
    @enderror
</div>
 
<div class="form-group">
    <label for="category_id" class="control-label mb-1"> Category</label>
    <select id="category_id" name="category_id" class="form-control" required>
        <option value="">Select Categories</option>
        @foreach($category as $list)
            @if($category_id==$list->id)
                <option selected value="{{$list->id}}">
            @else
                <option value="{{$list->id}}">
            @endif
            {{$list->category_name}}</option>
        @endforeach
    </select>
</div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                           
                            
                            
                            
</div>
                        
        </div>
    </div>
                        
@endsection