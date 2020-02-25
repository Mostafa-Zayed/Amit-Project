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
                    <a href="{{url('/admin/features')}}">
                        <i class="pe-7s-monitor"></i>
                        <p>Show All Features</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/features/create')}}">
                        <i class="pe-7s-plus"></i>
                        <p>New Feature</p>
                    </a>
                </li>
                <li class='active'>
                    <a href="{{url('admin/features/{id}/edit')}}">
                        <i class='pe-7s-display2'></i>
                        <p>Show Feature</p>
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
                    <a class="navbar-brand" href="{{url('/admin/features')}}">Features</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

								<p class="hidden-lg hidden-md">Features</p>
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
                            <li class="breadcrumb-item"><a href="{{url('admin/features')}}">Features</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit No : {{$feature->id}} : {{ucwords($feature->title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-offset-1 col-sm-9">
                        <div class="card create-p">
                            <form class="form-horizontal form-update" method="POST" action="{{url('admin/features/'.$feature->id)}}">  
                        
                                <div class='form-group'>
                                </div>
                                <div>
                                    <label for="feature_title" class='col-sm-2 control-label'>feature title :</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' id='feature_title' name="feature_title" value="{{$feature->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feature_icon" class="col-sm-2 control-label">Feature Icon :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="feature_icon" value="{{$feature->icon}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content" class='col-sm-2 control-label'>Content :</label> 
                                    <div class='col-sm-10'>
                                        <textarea name="content" id="message" cols="30" rows="5" class="form-control">{{$feature->content}}
                                        </textarea>
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
