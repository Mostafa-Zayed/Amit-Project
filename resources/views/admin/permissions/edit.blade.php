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
                <a href="{{url('/')}}" class="simple-text">
                    Job Finder Team
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
                    <a href="{{url('/admin/permissions')}}">
                        <i class="pe-7s-switch"></i>
                        <p>Show All Permissions</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/permissions/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New Permission</p>
                    </a>
                </li>
                <li class='active'>
                    <a href="{{url('admin/permissions/{id}/edit')}}">
                        <i class='pe-7s-edit'></i>
                        <p>Edit Category</p>
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
                    <a class="navbar-brand" href="{{url('/admin/permissions')}}">Permissions</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Permissions</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        <li>
                            <a href="{{url('logout')}}">
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
                <div class='col-md-12'>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/permissions')}}">Permissions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit No : {{$permission->id}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-offset-1 col-sm-9">
                        <div class="card create-p">
                            <form class="form-horizontal form-update" method="POST" action="{{url('admin/permissions/'.$permission->id)}}">  
                          
                                <div>
                                    <label for="cat_old" class='col-sm-2 control-label'>Permission Show:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='cat_old' value="{{ucfirst($permission->show)}}" disabled>
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="cat_new" class='col-sm-2 control-label'>New Permission:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='cat_new' name="permission_show">
                                    </div>
                                </div>
                                <div class='form-group'>
                                </div>
                                <div>
                                    <label for="cat_old" class='col-sm-2 control-label'>Permission Add:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='cat_old' value="{{ucfirst($permission->add)}}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <label for="cat_new" class='col-sm-2 control-label'>New Permission:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='cat_new' name="permission_add">
                                    </div>
                                </div>  
                                <div class='form-group'>
                                </div>                              
                                <div>
                                    <label for="update_old" class='col-sm-2 control-label'>Permission Update:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='update_old' value="{{ucfirst($permission->update)}}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <label for="update_new" class='col-sm-2 control-label'>New Permission:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='update_new' name="permission_update">
                                    </div>
                                </div>
                                <div class='form-group'>
                                </div>
                                <div>
                                    <label for="delete_old" class='col-sm-2 control-label'>Permission Delete:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='delete_old' value="{{ucfirst($permission->delete)}}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <label for="delete_new" class='col-sm-2 control-label'>New Permission:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='delete_new' name="permission_delete">
                                    </div>
                                </div>
                                <div class='form-group'>
                                </div>
                                <div>
                                    <label for="permission_old" class='col-sm-2 control-label'>Permission Name:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='permission_old' name="permission_old" disabled value="{{ucfirst($permission->name)}}">
                                    </div>
                                </div>
                                <div>
                                    <label for="permission_name" class='col-sm-2 control-label'>Permission Name:</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='permission_name' name="permission_name">
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                                        {{csrf_field()}}
                                        <input type='hidden' name='_method' value='PUT'>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <div class='col-sm-offset-2 col-sm-10'>
                                        
                                            @foreach($errors->all() as $error)
                                            <p class='alert alert-danger'>
                                                {{ucwords($error)}}
                                            </p>
                                            @endforeach

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
            $('.form-update').on('submit',function(){
                if(confirm('Are You Sure Baby?')){
                    return true;
                }else{
                    return false;
                }
            });

    	});
	</script>
@endsection
