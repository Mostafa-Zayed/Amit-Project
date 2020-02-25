<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\Type;
use App\Location;
use Illuminate\Support\Facades\Session;
class JobController extends Controller
{
    //
    public function index(Request $request){


        //$jobs = Job::select('id','category_id','user_id','count_apply','title','type_id','salary','company_name','location','number_days')->get();
        //dd($request->all());
        $jobs = Job::all();
        return view('admin/jobs/index',compact('jobs',$jobs));

    }

    public function create(){
      $categories = Category::all();
      $types      = Type::all();
      $locations  = Location::all();
      return view('admin/jobs/create',compact('categories','types','locations',$categories,$types,$locations));
  }

  public function store(Request $request){
    //dd($request->all());
    $this->validate($request,[
      'job_title' => 'required',
      'user_id' => 'required',
      'category_id'=>'required',
      'type_id'=> 'required',
      'location_id'=>'required',
      'company'=>'required',
      'city'=>'required',
      'phone'=>'required',
      'salary'=>'required',
      'number_days'=>'required',
      'job_describe'=>'required',
      'more_info'=>'required',
      
  ]);
  $job = new Job([
    'user_id'   =>$request->get('user_id'),
    'category_id'=>$request->get('category_id'),
    'type_id'=>$request->get('type_id'),
    'location_id'=>$request->get('location_id'),
    'title'=>$request->get('job_title'),
    'company_name'=>$request->get('company'),
    'describe'=>$request->get('job_describe'),
    'city'=>$request->get('city'),
    'phone'=>$request->get('phone'),
    'salary'=>$request->get('salary'),
    'number_days'=>$request->get('number_days'),
    'more_info'=>$request->get('more_info'),
    'image_video'=>$request->get('link_video')
  ]);
  //dd($request->all());
  $job->save();
  Session::flash('success','Job Is Added  Successfuly');
        return redirect('admin/jobs');

  }
    public function show($id){
        $job = Job::findOrFail($id);
      
        return view('admin/jobs/show',compact('job',$job));
        
    }

 
    public function edit($id){

      $job = Job::FindOrFail($id);
      $categories = Category::all();
      $types      = Type::all();
      $locations  = Location::all();
      return view('admin/jobs/edit',compact('job','categories','types','locations',$job,$categories,$types,$locations));
    }

    public function update(Request $request,$id){
      $job = Job::FindOrFail($id);
      $this->validate($request,[
        'job_title' => 'required',
        'user_id' => 'required',
        'category_id'=>'required',
        'type_id'=> 'required',
        'location_id'=>'required',
        'company'=>'required',
        'city'=>'required',
        'phone'=>'required',
        'salary'=>'required',
        'number_days'=>'required',
        'job_describe'=>'required',
        'more_info'=>'required',
        
    ]);

      $job->user_id   = $request['user_id'];
      $job->category_id =$request['category_id'];
      $job->type_id = $request['type_id'];
      $job->location_id = $request['location_id'];
      $job->title = $request['job_title'];
      $job->company_name = $request['company'];
      $job->describe = $request['job_describe'];
      $job->city = $request['city'];
      $job->phone = $request['phone'];
      $job->salary = $request['salary'];
      $job->number_days = $request['number_days'];
      $job->more_info = $request['more_info'];
      $job->image_video = $request['link_video'];
    
    $job->save();
    Session::flash('success','Job Is Updated   Successfuly');
      return redirect('admin/jobs');

    }
 

  public function destroy($id){

    $job = Job::findOrFail($id)->delete();
    return redirect('admin/jobs')->with('success','Job Is Deleted Successfuly');
}
/////////////////////////////////////////////////////////////////////////////////////////////////


  public function showJobs($id){
      
    $jobs = Job::where('user_id','=',$id)->get();
    return view('dashboard/jobs',compact('jobs',$jobs));
}
}



