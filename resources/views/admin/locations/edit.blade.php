@extends('layouts/admin.app-admin')
@section('content')
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

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
                    <a href="{{url('/admin/locations')}}">
                        <i class="pe-7s-map-marker"></i>
                        <p>Show All Locations</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/locations/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New Job Location</p>
                    </a>
                </li>
                <li class='active'>
                    <a href="{{url('admin/locations/{id}/edit')}}">
                        <i class='pe-7s-edit'></i>
                        <p>Edit Location</p>
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
                    <a class="navbar-brand" href="{{url('/admin/locations')}}">locations</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Locations</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="{{url('dashboard/account/'.auth()->user()->id)}}">
                               <p>Account</p>
                            </a>
                            <li>
                            <a href="/#" onclick="document.getElementById('form-logout').submit();"><p>Log out</p></a>
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
                            <li class="breadcrumb-item"><a href="{{url('admin/locations')}}">locations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit No : {{$location->id}} : {{ucwords($location->name)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-offset-1 col-sm-9">
                        <div class="card create-p">
                        <form class="form-horizontal form-update" method="POST" action="{{url('admin/locations/'.$location->id)}}">  
                          
                          <div>
                              <label for="old_location" class='col-sm-2 control-label'>Old Location :</label>
                              <div class='col-sm-10'>
                                  <input type='text' class='form-control' id='old_location' value="{{$location->name}}" disabled>
                              </div>
                          </div>
                          <div class='form-group'>
                          </div>
                          <div>
                              <label for="location_name" class='col-sm-2 control-label'>Location Name :</label>
                              <div class='col-sm-10'>
                                  <input type='text' class='form-control' id='location_new' name="location_name">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="old_icon" class="col-sm-2 control-label">Old Icon :</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="old_icon" disabled value="{{$location->icon}}">
                              </div>
                          </div>
                          <div class='form-group'>
                              <label for='location_icon' class='col-sm-2 control-label'>Location Icon :</label>
                              <div class='col-sm-10'>
                                  <input type='text' class='form-control' id='location_icon' name='location_icon' placeholder='Category Icon'>
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
