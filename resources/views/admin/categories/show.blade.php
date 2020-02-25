@extends('layouts/admin.app-admin')
@section('content')
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('')}}" class="simple-text">
                    JobFinder Team
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('/admin')}}">
                        <i class="pe-7s-culture"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/categories')}}">
                        <i class="pe-7s-monitor"></i>
                        <p>Show All Categories</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/categories/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New Category</p>
                    </a>
                </li>
                <li class='active'>
                    <a href="{{url('/admin/categories/'.$category->id)}}">
                        <i class="pe-7s-display2"></i>
                        <p>Show Category</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/admin')}}">Categories</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Categories</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-6'>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/categories')}}">Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Show N0 : {{$category->id}} : {{$category->name}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class='col-md-6'>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" name='keywords' placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class='row'>
                    <div class='col-md-12'>
                    <div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>

                                        <th><a href='#'>ID</a></th>
                                    	<th><a href='#'>Name</a></th>
                                        <th><a href="#">Icon</a></th>
                                    	<th><a href='#'>Created At</a></th>
                                        <th><a href='#'>Updated At</a></th>
                                        <th><a href='#'>Deleted At</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->icon}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td>{{$category->deleted_at}}</td>
                                            <td><a href="{{url('admin/categories/'.$category->id.'/edit')}}" class='btn btn-info'>Edit</a></td>
                                            <td>
                                                <form action="{{url('admin/categories/'.$category->id)}}" method="POST" class='form-delete'>
                                                {{csrf_field()}}
                                                    <input type='hidden' name="_method" value="DELETE">
                                                    <button type='submit' class='btn btn-info'>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                            
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-md-offset-1'>
                       
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12'>
                    <a class="btn btn-info btn-fill pull-right" href="{{url('admin/categories/create')}}">Create Anew Category</a>
                    </div>
                </div>
                <br>
@endsection
@section('scripts')
<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });
            $('.form-delete').on('submit',function(){
                if(confirm('Are You Sure Baby?')){
                    return true;
                }else{
                    return false;
                }
            });

    	});
	</script>
@endsection
