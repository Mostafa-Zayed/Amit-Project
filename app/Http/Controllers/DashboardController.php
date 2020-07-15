<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\User;
use App\Category;
use App\Type;
use App\Location;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    //
    public function index($id){
        
        if(Auth::user()->id == $id){
            return view('dashboard/index');
        }else{

            dd('errorjjjj');
        }
    }


    public function profile($id){
        if(Auth::user()->id == $id){

            $user = User::findOrFail($id);
            if(isset($user->profile) && !empty($user->profile)){
                $hasprofile = 1;
            }else{
                $hasprofile = 0;
            }
            return view('dashboard/profile',compact('user','hasprofile',$user,$hasprofile));

        }
        
    }
    public function jobs($id){
        
        if(Auth::user()->id == $id){

            $jobs = Job::where('user_id','=',$id)->paginate(5);
            return view('dashboard/jobs',compact('jobs',$jobs));
        }
    }

    public function create(){

        $categories = Category::all();
        $types      = Type::all();
        $locations  = Location::all();
        return view('dashboard/create',compact('categories','types','locations',$categories,$types,$locations));
    }


    public function store(Request $request){

        if(Auth::user()->id == $request['user_id']){
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
              
              $job->save();
                Session::flash('success','Job Is Added  Successfuly');
            return redirect('dashboard/jobs/'.Auth::user()->id);

            }
        
        }
        public function edit($id){
            //dd($request->all());
            $job = Job::FindOrFail($id);
            if(Auth::user()->id == $job->user->id){
                $categories = Category::all();
                $types      = Type::all();
                $locations  = Location::all();
                return view('dashboard/edit',compact('job','categories','types','locations',$job,$categories,$types,$locations));
            }
            
          }

    public function update(Request $request,$id){
        
        $job = Job::FindOrFail($id);
        if(Auth::user()->id == $job->user->id){

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
            return redirect('dashboard/jobs/'.Auth::user()->id);
        }

    }
       
      
        public function destroy($id){
      
          $job = Job::findOrFail($id);
          if(Auth::user()->id == $job->user->id){
              $job->delete();
              return redirect('dashboard/jobs/'.Auth()->user()->id)->with('success','Job Is Deleted Successfuly');
          }
          
      }
}
