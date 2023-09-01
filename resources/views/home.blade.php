@extends('layouts.main')

@section('content')
<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">Applied jobs</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Saved jobs</span></p>
  </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (Auth::user()->user_type=='seeker')
                    @foreach ($jobs as $job)
                        <div class="card mb-3">
                            <div class="card-header"><h5>Job title: {{ $job->title }}</h5></div>

                            <div class="card-body">
                                <small class="badge bg-secondary badge-primary mb-2">Job position: {{ $job->position }}</small>
                                <p>Description: {{ $job->description }}</p>
                            </div>
                            <div class="card-footer">
                                <span><a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="btn-sm btn btn-primary">View job</a></span>
                                <span class="float-end">Last date : {{ $job->last_date }}</span>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
