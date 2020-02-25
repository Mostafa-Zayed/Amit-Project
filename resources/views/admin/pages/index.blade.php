@extends('layouts/admin.app-admin')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{url('/')}}" class="simple-text">
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
                    <li class="active">
                        <a href="{{url('/admin/pages')}}">
                            <i class="pe-7s-albums"></i>
                            <p>Show All Pages</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/pages/create')}}">
                            <i class="pe-7s-plus"></i>
                            <p>New Page</p>
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
                        <a class="navbar-brand" href="{{url('/admin/pages')}}">Pages</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="{{url('/admin')}}" class="dropdown-toggle" data-toggle="dropdown">

                                    <p class="hidden-lg hidden-md">Pages</p>
                                </a>
                            </li>

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
                            <li class="separator hidden-lg"></li>
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
                                    <li class="breadcrumb-item"><a href="{{url('admin/pages')}}">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                                </ol>
                            </nav>
                        </div>
                        <div class='col-md-8'>
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
                                        <th>ID</th>
                                        <th><a href="{{url('admin/pages')}}?orderBy=name">Name</a></th>
                                        <th><a href="{{url('admin/pages')}}?orderBy=created_at">Created At</a></th>
                                        <th><a href="{{url('admin/pages')}}?orderBy=updated_at">Updated At</a></th>
                                        <th>Action</th>
                                        <th>Action</th>

                                        </thead>
                                        <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{$page->id}}</td>
                                                <td><a href="{{url('/'.$page->name)}}">{{ucfirst($page->name)}}</a></td>
                                                <td>{{$page->created_at}}</td>
                                                <td>{{$page->updated_at}}</td>
                                                <td><a href="{{url('admin/pages/'.$page->id.'/edit')}}" class='btn btn-info'>Edit</a></td>
                                                <td>
                                                <form method='POST' class='form-delete' action="{{url('admin/pages/'.$page->id)}}">
                                                    <button type='submit' class='btn btn-info'>Delete</button>
                                                    <input type='hidden' name='_method' value='DELETE'>
                                                    {{csrf_field()}}
                                                 </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
                            <a class="btn btn-info btn-fill pull-right" href="{{url('admin/pages/create')}}">Create New Page</a>
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
