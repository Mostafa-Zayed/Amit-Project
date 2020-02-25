
@extends('layouts.main')
@section('content')

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

                                        <!--  Div Categories -->

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">{{ucfirst(__('index.categories'))}}</h2>
        
      </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-{{$category->icon}} mb-3 text-primary"></span>
              <h2>{{ucwords(__('index.'.$category->name))}}</h2>
              <span class="counting">10,391</span>
            </a>
          </div>
        @endforeach
    </div>

  </div>
</div>





                                                <!-- Div Recent Jobs --> 

                                                <div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-5 h3">{{ucfirst(__('index.recent jobs'))}}</h2>
        <div class="rounded border jobs-wrap">
          @foreach($jobs as $job)
        
          <a href="{{url('/jobs/'.$job->id)}}" class="job-item d-block d-md-flex align-items-center  border-bottom {{($job->type->name == 'freelance')? $job->type->name : 'fulltime' }}">
            <div class="company-logo blank-logo text-center text-md-left pl-3">
              <img src="images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
            </div>
            <div class="job-details h-100">
              <div class="p-3 align-self-center">
                <h3>{{$job->title}}</h3>
                <div class="d-block d-lg-flex">
                  <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{$job->category->name}}</div>
                  <div class="mr-3"><span class="icon-room mr-1"></span>{{$job->location->name}}</div>
                  <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                </div>
              </div>
            </div>
            <div class="job-category align-self-center">
              <div class="p-3">
                <span class="text-{{$job->type->icon}} p-2 rounded border border-{{$job->type->icon}}">{{$job->type->name}}</span>
              </div>
            </div>  
            
          
      
          </a>
          
          @endforeach 
        
        </div>

        <div class="col-md-12 text-center mt-5">
          <a href="{{url('/jobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
        </div>
      </div>

    </div>
  </div>
</div>                                                
       





                                               <!--  TestMoinal  Div --> 

                                               <div class="site-section" data-aos="fade">
  <div class="container">
  
    <div class="row align-items-center">
    
      <div class="col-md-6 mb-5 mb-md-0">
        
          <div class="img-border">
            <a href="{{$testimonie->image_video}}" class="popup-vimeo image-play">
              <span class="icon-wrap">
                <span class="icon icon-play"></span>
              </span>
              <img src="images/hero_2.jpg" alt="Image" class="img-fluid rounded">
            </a>
          </div>
        
      </div>
      <div class="col-md-5 ml-auto">
        <div class="text-left mb-5 section-heading">
          <h2>Testimonies</h2>
        </div>
        
        <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{$testimonie->content}}&rdquo;</p>
        <p>&mdash; <strong class="text-black font-weight-bold">{{ucfirst($testimonie->user->name)}}</strong> , {{ucfirst($testimonie->user->profile->job)}}</p>
        <p><a href="{{$testimonie->image_video}}" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
        
      </div>
      
    </div>
    
  </div>
  
</div>








                         <!--  Your Dream Job Div   -->


                         <div class="site-blocks-cover overlay inner-page" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6 text-center" data-aos="fade">
        <h1 class="h3 mb-0">Your Dream Job</h1>
        <p class="h3 text-white mb-5">Is Waiting For You</p>
        <p><a href="#" class="btn btn-outline-warning py-3 px-4">Find Jobs</a> <a href="{{url('/jobs')}}" class="btn btn-warning py-3 px-4">Apply For A Jobs</a></p>
      </div>
    </div>
  </div>
</div>





                                <!--    WHY Choose  Us   Div   -->

                                <div class="site-section site-block-feature bg-light">
  <div class="container">
      <div class="text-center mb-5 section-heading">
        <h2>Why Choose Us</h2>
      </div>

      <div class="d-block d-md-flex border-bottom">
          @foreach($features as $feature)
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="{{$feature->icon}} display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">{{$feature->title}}</h2>
            <p>{{$feature->content}}</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          @endforeach
      </div>
  </div>
</div>
@endsection