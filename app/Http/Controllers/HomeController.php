<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Profile;
use App\Category;
use App\Testimonie;
use App\Feature;
use App\Aboute;
use App\Job;
use App\Location;
use App\About;
use App\Team;
use App\User;
use App\Timeservice;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Gate;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        
        $categories = DB::table('categories')->take(8)->get();
        $pages = DB::table('pages')->take(7)->get();
        $locations = Location::all();
        $jobs = Job::orderBy('created_at','desc')->take(8)->get();
        $testimonie = Testimonie::with('user');
        $testimonie = $testimonie->first();
        $features   = DB::table('features')->take(4)->get();
        //$about_us = About::findOrFail(1);
        $about_us = DB::table('abouts')->first();
        
        return view('index',compact('categories','pages','locations','jobs','testimonie','features','about_us',$categories,$pages,$locations,$jobs,$testimonie,$features,$about_us));
    }


    public function about(){

        $pages = Page::all();
        $categories = Category::all();
        $locations = Location::all();
        $about_us = About::with('user');
        $about_us = $about_us->first();
        //$about_us = DB::table('abouts')->first();
        $team =  Team::all();
        
        return view('about',compact('pages','categories','about_us','team',$pages,$categories,$about_us,$team));
    }

    public function contact(){

        $pages = Page::all();
        $categories = Category::all();
        $about_us = About::findOrFail(1);
        $servicestimes = DB::table('timeservices')->take(3)->get();
        $settings = Setting::select('location','email','phone');
        return view('contact',compact('pages','categories','about_us','servicestimes','settings',$pages,$categories,$about_us,$servicestimes,$settings));

    }

    public function jobs(Request $request){
        
        
        $jobs = Job::select('id','user_id','category_id','type_id','location_id','title','company_name','describe','city','salary','number_days');

        if($request->has('job_name') && !empty($request['job_name'])){
            
            $jobs = $jobs->where('title','like',$request['job_name']);
        }

        if($request->has('location_id') && !empty($request['location_id'])){

            $jobs = $jobs->where('location_id','=',$request['location_id']);
        }

        if($request->has('category_id') && !empty($request['category_id'])){

            $jobs = $jobs->where('categroy_id','=',$request['category_id']);

        }

        $jobs = $jobs->paginate(5);

        $pages = Page::all();
        $categories = Category::all();
        $locations = Location::all();
        $features   = Feature::all();
        $about_us = About::findOrFail(1);
        
        return view('jobs',compact('pages','categories','locations','jobs','features','about_us',$pages,$categories,$locations,$jobs,$features,$about_us));
    }

    public function categories(){

        $pages = Page::all();
        return view('categories',compact('pages',$pages));
    }

    public function blog(){
        $pages = Page::all();
        return view('blog',compact('pages',$pages));
    }

    public function admin(){
      
        return view('admin.dashboard');
    }

    public function show_job($id){

        $pages= Page::all();
        $about_us = About::findOrFail(1);
        $categories = Category::all();
        $job = Job::findOrFail($id);
        return view('singlejob')->with('pages',$pages)->with('about_us',$about_us)->with('categories',$categories)->with('job',$job);
    }

    

    public function sendContact(Request $request){

        
    }

    public function dashboard(){
        
        return view('dashboard/index');
    }
}
