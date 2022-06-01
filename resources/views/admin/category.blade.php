@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
@section('container')

@if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif  

    <h1 class="mb10">Category</h1>
    <a href="{{url('admin/manage_category')}}" >
        <button type="button" class="btn btn-success">
            Add Category
        </button>
    </a>
    
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                           
                            <td>{{$list->category_name}}</td>
                            
                            <td>
                            @if($list->category_image!='')
                                <img width="100px" src="{{asset('storage/media/category/'.$list->category_image)}}"/>
                            @endif
                            </td>
                            
                            <td>
                            <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                    
                            <a href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection