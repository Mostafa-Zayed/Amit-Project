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
                    <a href="{{url('/admin/testimonies')}}">
                        <i class="pe-7s-note"></i>
                        <p>Show All Testimonies</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/testimonies/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New Testimonie</p>
                    </a>
                </li>
                <li class='active'>
                    <a href="{{url('admin/testimonies/'.$testimonie->id.'/edit')}}">
                        <i class='pe-7s-edit'></i>
                        <p>Edit Testimonie</p>
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
                    <a class="navbar-brand" href="{{url('/admin/testimonies')}}">Testimonies</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Testimonies</p>
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
                            <li class="breadcrumb-item"><a href="{{url('admin/testimonies')}}">Testimonies</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit No : {{$testimonie->id}} : {{ucwords($testimonie->user->name)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-offset-1 col-sm-9">
                        <div class="card create-p">
                            <form class="form-horizontal form-update" method="POST" action="{{url('admin/testimonies/'.$testimonie->id)}}">  
                          
                                <div>
                                    <label for="user_id_old" class='col-sm-2 control-label'>User ID :</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='user_id_old' value="{{$testimonie->user_id}}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <label for="user_id_new" class='col-sm-2 control-label'>User ID :</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='user_id' name='user_id'>
                                    </div>
                                </div>
                                <div class='form-group'>
                                </div>
                                <div class='form-group'>
                                    <label for="message_old" class='col-sm-2 control-label'>Message</label> 
                                    <div class='col-sm-10'>
                                        <textarea id="message_old" cols="30" rows="5" class="form-control" disabled>
                                            {{$testimonie->content}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="message" class='col-sm-2 control-label'>Message</label> 
                                    <div class='col-sm-10'>
                                        <textarea name="content" id="message" cols="30" rows="5" class="form-control">
                                        </textarea>
                                    </div>
                                </div>
                                <div class='form-group'>
                                </div>
                                <div>
                                    <label for="image_video_old" class='col-sm-2 control-label'>Image && Video :</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='image_video_old' value="{{$testimonie->img_video}}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <label for="image_video" class='col-sm-2 control-label'>Image && Video :</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='image_video' name="image_video">
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
