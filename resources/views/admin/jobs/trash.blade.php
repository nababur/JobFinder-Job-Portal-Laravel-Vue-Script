

@extends('../admin/layouts.app')

@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">Trash job</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;Back to jobs</a>
           
          
        </div>
    </div>
      <!--  Header BreadCrumb -->  



        <!-- Users DataTable-->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-body mt-3">
                      <div class="table-responsive">
                          <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                   
                                    <th>Job Title</th>
                                    <th>Job Description</th>
                            
                                    <th>Posted Date</th>
        
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i=0; ?>
                                @foreach ($jobs as $job)
                                <?php $i++ ?>
                                    
    
                                    <tr>
                                        <td>{{ $i }}</td>
                                        
                                        <td>{{ $job->title }}</td>
                                        <td>{{ Str::limit($job->description, 50)}}</td>
                                
                                        <td><span class="badge badge-lg badge-info text-white">{{ $job->created_at->diffForHumans() }}</span></td>


                     
                                        <td style="width: 18%">
                                            
                                            <a class="btn btn-sm btn-secondary" href="{{route('adminJobRestore', [$job->id])}}"><i class="material-icons">restore</i> Restore </a>

                                            
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#postDeletePermanent-{{ $job->id }}" type="button">Delete</button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="postDeletePermanent-{{ $job->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $job->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $job->id }}">{{ $job->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> Do you want to Delete job Permanantly?</h4>
                                                    </div>
                                                    <form action="{{ route('adminJobDelPermanent') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $job->id }}">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>


                                                </div>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                    
                                @endforeach
                             



                        </table>
                      </div>
                    </div>
                </div>
            </div>

        </div>

         <!-- Users DataTable-->   










@endsection
