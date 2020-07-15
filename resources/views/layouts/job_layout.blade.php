@extends('layouts.main')
@section('content')
@yield('jobs')

                                                <!-- Div Recent Jobs --> 

                                                <div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-5 h3">Recent Jobs</h2>
        <div class="rounded border jobs-wrap">
          @foreach($jobs as $job)
        
          <a href="job-single.html" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
            <div class="company-logo blank-logo text-center text-md-left pl-3">
              <img src="images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
            </div>
            <div class="job-details h-100">
              <div class="p-3 align-self-center">
                <h3>{{$job->title}}</h3>
                <div class="d-block d-lg-flex">
                  <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{--$job->category['name']--}}</div>
                  <div class="mr-3"><span class="icon-room mr-1"></span>{{'Location'}}</div>
                  <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                </div>
              </div>
            </div>
            <div class="job-category align-self-center">
              <div class="p-3">
                <span class="text-{{'info'}} p-2 rounded border border-info">{{'FreeLancing'}}</span>
              </div>
            </div>  
            
          <button class="btn btn-primary rounded ml-5 mr-5 p-1">Apply Job</button>
      
          </a>
          
          @endforeach 
        
        </div>
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