@extends('../admin/layouts.app')



@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">Candidates</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="#" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>&nbsp;Create new candidate</a>
            <a href="#" class="theme-secondary-btn btn btn-secondary"><i class="material-icons">import_export</i>&nbsp;Export candidate</a>
           
          
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
                               
                                    <th>Candidate Name</th>
                                    <th>Email Verified</th>
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i=0; ?>
                                @foreach ($candidates as $candidate)
                                <?php $i++ ?>
                                    
    
                                    <tr>
                                        <td>{{ $i }}</td>
                                        
                                        <td>{{ $candidate->name }}</td>
                                        <td>
                                            
                                            @if ($candidate->email_verified_at)
                                            <i class="material-icons  alert-success">check_circle</i>
                                            @else
                                            <i class="material-icons  alert-danger">close</i>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($candidate->status == '0')
                                                <a  class="badge badge-lg badge-danger text-white" href="{{ route('adminCanToggle',[$candidate->id]) }}"
                                                    >{{ __('Deactive') }}</a>


                                            @else

                                                <a  class="badge badge-lg badge-success text-white" href="{{ route('adminCanToggle',[$candidate->id]) }}"
                                                    >{{ __('Active') }}</a>

                                               

                                            @endif
                                            
                                        </td>
                                       
                                        <td style="width: 18%">
                                            <a  class="btn btn-sm btn-info" href="{{route('adminEditCan',[$candidate->id])}}"><i class="material-icons">edit</i></a> 


                                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#candidateDelete-{{ $candidate->id }}" type="button"><i class="material-icons">delete</i></button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="candidateDelete-{{ $candidate->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $candidate->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $candidate->id }}">Name: {{ $candidate->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> Do you want to move candidate Trash?</h4>
                                                    </div>
                                                    <form action="{{ route('adminCanDelete',[$candidate->id]) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $candidate->id }}">
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
