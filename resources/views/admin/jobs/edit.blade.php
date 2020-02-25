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
                        <a href="{{url('/admin/jobs')}}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Show All Jobs</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/jobs/create')}}">
                            <i class="pe-7s-plus"></i>
                            <p>Create Job</p>
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
                        <a class="navbar-brand" href="{{url('admin/jobs')}}">Jobs</a>
                    </div>
                    <div class="collapse navbar-collapse">


                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{url('dashboard/account/'.auth()->user()->id)}}">
                                    <p>Account</p>
                                </a>
                            </li>

                            <li>
                            <a href="/#" onclick="document.getElementById('form-logout').submit();"><p>Log out</p></a>
                            <form action="{{url('logout')}}" method='POST' id='form-logout'>{{csrf_field()}}</form>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-4'>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
           
                </div>





                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Edit Job  :</h4>
                                </div>
                                <div class="content">
                                    <form action="{{url('admin/jobs/'.$job->id)}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Job  TiTle :</label>
                                                    <input type="text" class="form-control"  placeholder="Job Title" value="{{$job->title}}" name="job_title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Categories :</label>
                                                    <select class='form-control' name="category_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{($category->id === $job->category->id)?'selected':null}}>{{ucfirst($category->name)}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Job Type :</label>
                                                    <select class='form-control' name="type_id">
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}" {{($type->id === $job->type->id)?'selected':null}}>{{ucfirst($type->name)}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Locations :</label>
                                                    <select class='form-control' name="location_id">
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->id}}" {{($location->id === $job->location->id)?'selected':null}}>{{ucfirst($location->name)}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Name :</label>
                                                    <input type="text" class="form-control" placeholder="Company Name" value="{{$job->company_name}}" name="company">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>city :</label>
                                                    <input type="text" class="form-control" placeholder="City" value="{{$job->city}}" name="city">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone :</label>
                                                    <input type="text" class="form-control" placeholder="Phone" value="{{$job->phone}}" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Salary :</label>
                                                    <input type="number" class="form-control" placeholder="Salary" value="{{$job->salary}}" name="salary">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number Days :</label>
                                                    <input type="number" class="form-control" value="{{$job->number_days}}" name="number_days">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Job Describtion :</label>
                                                    <textarea rows="10" class="form-control" placeholder="Job Details Here" name="job_describe">{{$job->describe}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>More Information :</label>
                                                    <textarea rows="6" class="form-control" placeholder="More Information" name="more_info">{{$job->more_info}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='form-group'>
                                                    <label>Job Video / Image : </label>
                                                    <input type="text" class="form-control" placeholder="LInk Video / Image" value="{{$job->image_video}}" name="link_video">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <input type='hidden' name='_method' value='PUT'>
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
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Save Changes</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                      

                    </div>
                </div>
            </div>


@endsection
