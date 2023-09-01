@extends('layouts.main')

@section('content')
<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">Applicants</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="#">Comapany</a> </span> <span><span class="sep m-0"> ></span> {{ Auth::user()->company->cname }}</span></p>
  </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($applicants) > 0)
                    
                <div class="card">
                    @foreach ($applicants as $applicant)
                    <div class="card-header">Job Title:  <a href="{{ route('job.show', [$applicant->id, $applicant->slug]) }}">{{ $applicant->title }}</a></div>

                    <?php $i=0; ?>
                    @foreach ($applicant->users as $user)
                    <?php $i++; ?>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    
                                  
                                    <th scope="col">Sl:</th>
                                    <th scope="col">Nababur:</th>
                                 
                                    <th scope="col">Email:</th>
                                    <th scope="col">Gender:</th>
                               
                                    <th scope="col">Bio:</th>
                                    <th scope="col">Cover letter:</th>
                                    <th scope="col">Resume:</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        <td scope="row">{{ $i }}</td>
                                        <td>{{$user->name }}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->profile->gender}}</td>
                           
                                        <td>{{$user->profile->bio}}</td>
                            
                                        @if ($user->profile->cover_letter)
                                        <td><a class="badge badge-secondary" target="_blank" href="{{ url('storage/'.$user->profile->cover_letter) }}">Cover letter</a></td>
                                        
                                        @else
                                        <td>Not uploaded</td>
                                        @endif

                                        @if ($user->profile->resume)
                                        <td><a class="badge badge-secondary" target="_blank" href="{{ url('storage/'.$user->profile->resume) }}">Resume</a></td>
                                        
                                        @else
                                        <td>Not uploaded</td>
                                        @endif
                                    
                                    </tr>
                            
                        
                                </tbody>
                            </table>
                        </div>
                        @endforeach

                    @endforeach
                </div>
                @else

                    <h3 class="text-center">No applicants apply your yet.</h3>

                @endif
            </div>
        </div>
    </div>

</div>
@endsection
