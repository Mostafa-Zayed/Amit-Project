@extends('layouts/admin.app-admin')
@section('content')
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">



    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('/')}}" class="simple-text">
                    Job Finder
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
                    <a href="{{url('/admin/jobtypes')}}">
                        <i class="pe-7s-expand1"></i>
                        <p>Show All JobTypes</p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{url('/admin/jobtypes/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New JobType</p>
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
                    <a class="navbar-brand" href="{{url('/admin/jobtypes')}}">Type Jobs</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Type Jobs</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="{{url('dashboard/account/'.auth()->user()->id)}}">
                               <p>Account</p>
                            </a>
                            <li>
                            <a href="#" onclick="document.getElementById('form-logout').submit();"><p>Log out</p></a>
                            <form action="{{url('logout')}}" method='POST' id='form-logout'>{{csrf_field()}}</form>
                            </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
            <div class='row'>
                <div class='col-md-12'>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/jobtypes')}}">Job Types</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Job Type</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-offset-1 col-sm-9">
                        <div class="card create-p">
                            <form class="form-horizontal"  action="{{url('admin/jobtypes')}}" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="type_new" class="col-sm-2 control-label">Type Name :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cat_new" name='jobtype_name' placeholder="New Type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="icon" class="col-sm-2 control-label">Icon :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="icon" name='icon' placeholder="icon">
                                    </div>
                                </div>

                                
                                    @if(count($errors) > 0)
                                    <div class=" col-sm-offset-2  col-sm-10">
                                        @foreach($errors->all() as $error)
                                            
                                                <p class='alert alert-danger'>{{ucwords($error)}}</p>
                                        @endforeach
                                    </div>    
                                    @endif
                                    @if(\Session::has('success'))
                                        <div class='col-sm-offset-2 col-sm-10'>
                                            <p class='alert alert-success'>{{\Session::get('success')}}</p>
                                        </div>
                                    @endif
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
           

    	});
	</script>
@endsection
