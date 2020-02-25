@extends('layouts/admin.app-admin')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


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
                    <li class="active">
                        <a href="{{url('/admin/settings')}}">
                            <i class="pe-7s-settings"></i>
                            <p>WebSite Settings</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                
                        <a class="navbar-brand" href="{{url('admin/settings')}}">Settings</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                    
            
                        </ul>

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
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">WebSite Settings</h4>
                                </div>
                                <div class="content">
                                    <form action="{{url('admin/settings/'.$settings[0]->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Title :</label>
                                                    <input type="text" class="form-control"  placeholder="WebSite Title" value="{{$settings[0]->title}}" name="title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email WebSite :</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="{{$settings[0]->email}}" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Phone :</label>
                                                    <input type="text" class="form-control" value="{{$settings[0]->phone}}" placeholder="Phone" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Location :</label>
                                                    <input type="text" class="form-control" placeholder="Location" value="{{$settings[0]->location}}" name="location">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address :</label>
                                                    <input type="text" class="form-control" placeholder="Address" value="{{$settings[0]->address}}" name="address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Logo WebSite Icon :</label>
                                                    <input type="text" class="form-control" placeholder="Logo Icon" value="{{$settings[0]->logo_icon}}" name="logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Link WebSite FaceBook :</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="{{$settings[0]->link_facebook}}" name="link_facebook">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Link WebSite Twitter :</label>
                                                    <input type="test" class="form-control" value="{{$settings[0]->link_twitter}}" name="link_twitter">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>LInk WebSite Instagram :</label>
                                                    <input type="text" class="form-control" placeholder="Job" value="{{$settings[0]->link_instagram}}" name="link_instagram">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Link Website Viemo :</label>
                                                    <input type="text" class="form-control" placeholder="Phone" value="{{$settings[0]->link_vimeo}}" name="link_viemo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='form-group'>
                                                    <label>WebSite BackGround Header Image Link :</label>
                                                    <input type="text" class="form-control" value="{{$settings[0]->header_bg}}" placeholder='Header Background Image' name="header_bg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>More Information About Website :</label>
                                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" name="about">{{$settings[0]->more_info}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Save Settings </button>
                                        <input type='hidden' name='_method' value='PUT'>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            
                        </div>

                    </div>
                </div>
            </div>


@endsection
