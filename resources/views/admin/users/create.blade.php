@extends('layouts/admin.app-admin')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{url('')}}" class="simple-text">
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
                    <a href="{{url('/admin/users')}}">
                        <i class="pe-7s-users"></i>
                        <p>Show All Users</p>
                    </a>
                </li>                  
                <li class="active">
                    <a href="{{url('/admin/users/create')}}">
                        <i class="pe-7s-add-user"></i>
                        <p>Create User</p>
                    </a>
                </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                
                        <a class="navbar-brand" href=""></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                    
                            <li>
                                <a href="{{url('admin/users/create')}}" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>Create New User :</p>
                                </a>
                             </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    <p>Account</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('logout')}}">
                                    <p>Log out</p>
                                </a>
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
                                    <h4 class="title"></h4>
                                </div>
                                <div class="content">
                                    <form action="{{url('admin/users')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name :</label>
                                                    <input type="text" class="form-control"  placeholder="Name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address :</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_password">Password :</label>
                                                    <input type="password" id="user_password" class="form-control" placeholder="password" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="re_password">Re-Password :</label>
                                                    <input type="password" class="form-control" id="re_password" placeholder="re_password" name="confirm_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Type :</label>
                                                    <select  class="form-control" name='type'>
                                                        <option value="normal" selected>Normal</option>
                                                        <option value="employeer">Employeer</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-9'>
                                            @if(count($errors) > 0)
                                    <div class="col-sm-10">
                                        @foreach($errors->all() as $error)
                                            
                                                <p class='alert alert-danger'>{{ucwords($error)}}</p>
                                        @endforeach
                                    </div>    
                                    @endif
                                    @if(\Session::has('success'))
                                        <div class=' col-sm-10'>
                                            <p class='alert alert-success'>{{\Session::get('success')}}</p>
                                        </div>
                                    @endif
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-info btn-fill pull-right" value="Create">
                                        <div class="clearfix"></div>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                               
                                <div class="content">
                                   
                                
                                </div>
                                <hr>
                          
                            </div>
                        </div>

                    </div>
                </div>
            </div>


@endsection
