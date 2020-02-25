@extends('layouts/admin.app-admin')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{url('/')}}" class="simple-text">
                        Job Finder Home Page
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="{{url('/dashboard/'.auth()->user()->id)}}">
                            <i class="pe-7s-culture"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{url('dashboard/my_profile/'.auth()->user()->id)}}">
                            <i class="pe-7s-user"></i>
                            <p>My Profile</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                
                        <a class="navbar-brand" href="{{url('dashboard/my_profile/'.auth()->user()->id)}}">Welcom {{ucfirst(auth()->user()->name)}} </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                    
            
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{url('/dashboard/jobs/'.auth()->user()->id)}}">
                                    <p>All Jobs</p>
                                </a>
                            </li>
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
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Show  My Profile</h4>
                                </div>
                                <div class="content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name :</label>
                                                    <input type="text" class="form-control"  placeholder="Full Name" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->first_name.' '.$user->profile->last_name:null)}}" disabled>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address :</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" placeholder="First Name" class="form-control" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->first_name:null)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->last_name:null)}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" placeholder="Home Address" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->address:null)}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" placeholder="City" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->city:null)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->country:null)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="test" class="form-control" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->postal_code:null)}}" placeholder="Postal Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Job</label>
                                                    <input type="text" class="form-control" placeholder="Job" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->job:null)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" placeholder="Phone" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->phone:null)}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" >{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->about_me:null)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>FaceBook Account :</label>
                                                    <input type="text" class="form-control" placeholder="Link FaceBook" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->fac_link:null)}}" name="link_facebook">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Twitter Account :</label>
                                                    <input type="text" class="form-control" placeholder="Link Twitter" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->twt_link:null)}}" name="link_twitter">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Google Account :</label>
                                                    <input type="text" class="form-control" placeholder="Link Google" value="{{(isset($hasprofile) && !empty($hasprofile) ?$user->profile->goog_link:null)}}" name="link_twitter">
                                                </div>
                                            </div>
                                        </div>                                        

                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                </div>
                                <div class="content">
                                    <div class="author">
                                        <a href="">
                                            <img class="avatar border-gray" src="{{asset('img/faces/face-3.jpg')}}" alt="..."/>

                                            <h4 class="title"><br />
                                                <small></small>
                                            </h4>
                                        </a>
                                    </div>
                                    <p class="description text-center"> "Lamborghini Mercy 
                                        Your chick she so thirsty 
                                        I'm in that two seat Lambo"
                                    </p>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a href="{{url(isset($hasprofile) && !empty($hasprofile)?$user->profile->fac_link:'')}}" class="btn btn-simple"><i class="fa fa-facebook-square"></i></a>
                                    <a href="{{(isset($hasprofile) && !empty($hasprofile)?$user->profile->twt_link:'')}}" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
                                    <a href="{{(isset($hasprofile) && !empty($hasprofile)?$user->profile->goog_link:'')}}" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


@endsection
