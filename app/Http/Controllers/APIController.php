<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Page;
use App\Job;
class APIController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        $users = User::all();
        $pages = Page::all();
        return ['categories'=>$categories,'pages'=>$pages,'users','users'=>$users];
    }

    public function jobs(){
        $jobs = Job::all();
        return $jobs;
    }
}
