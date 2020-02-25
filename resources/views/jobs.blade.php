@extends('layouts.job_layout')


@section('jobs')

                                    <!--  Div Find Job And Search  --> 
                                    <div style="height: 113px;"></div>
<div class="site-blocks-cover overlay" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12" data-aos="fade">
        <h1>{{ucfirst('find job')}}</h1><br/>
        <form action="{{url('/jobs')}}" method="GET">
          <div class="row mb-3">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-md-0">
                      <input type="text" class="mr-3 form-control border-0 px-4" placeholder="Job Title" name="job_name">
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                      <div class="input-wrap">
                        <span class="icon icon-room"></span>
                        <input type="text" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="City" onFocus="geolocate()" name="city_name">
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                      <select class="form-control rounded" name="location_id">
                        <option value="">{{ucfirst('all locations')}}</option>
                        @foreach($locations as $location)
                        <option value="{{$location->id}}">{{ucfirst($location->name)}}</option>
                        @endforeach
                      </select>
                    </div>    
                    <div class="col-md-3 mb-3 mb-md-0">
                      <select class="form-control rounded" name="category_id">
                        <option value="">{{ucfirst(__('index.all categories'))}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ucfirst(__('index.'.$category->name))}}</option>
                        @endforeach
                      </select>
                    </div> 
                                    
                </div> 
            </div> 
            <div class="col-md-2">
              <input type="submit" class="btn btn-search btn-primary btn-block" value="{{ucfirst(__('index.search'))}}">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

                                        <!--  Div JObs -->

<div class="site-section">
  <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Jobs</h2>
        </div>
    </div>
    <div class="row">
        @foreach($jobs as $job)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
          <a href="{{url('/jobs/'.$job->id)}}" class="h-100 feature-item">
            <h2>{{$job->title}}</h2>
            <span class="icon-money mr-1"> {{$job->salary}} </span>
            <div class="p-3">
              <span class="text-{{$job->type->icon}} p-2 rounded border border-{{$job->type->icon}}">{{$job->type->name}}</span>
            </div>
            <div class="mr-3"><span class="icon-room mr-1"></span>{{$job->location->name}}</div> 
            </a>
        </div>
        @endforeach
    </div>
    {{$jobs->links()}}
  </div>
</div>



@endsection