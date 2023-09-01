@extends('../admin/layouts.app')



@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href={{ route('adminCatCreate') }} class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>&nbsp;Create new category</a>

           
          
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
                               
                                    <th>Category Name</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i=0; ?>
                                @foreach ($categories as $category)
                                <?php $i++ ?>
                                    
    
                                    <tr>
                                        <td>{{ $i }}</td>
                                        
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            
                                            <span class="badge badge-secondary">{{ $category->created_at->diffForHumans() }}</span>

                                        </td>
                                        <td>
                                            @if ($category->status == '0')
                                                <a  class="badge badge-lg badge-danger text-white" href="{{ route('adminCatToggle',[$category->id]) }}"
                                                    >{{ __('Deactive') }}</a>


                                            @else

                                                <a  class="badge badge-lg badge-success text-white" href="{{ route('adminCatToggle',[$category->id]) }}"
                                                    >{{ __('Active') }}</a>

                                               

                                            @endif
                                            
                                        </td>
                                       
                                        <td style="width: 18%">
                                            <a  class="btn btn-sm btn-info" href="{{route('adminEditCat',[$category->id])}}"><i class="material-icons">edit</i></a> 


                                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#categoryDelete-{{ $category->id }}" type="button"><i class="material-icons">delete</i></button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="categoryDelete-{{ $category->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $category->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $category->id }}">Name: {{ $category->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> Do you want delete Category?</h4>
                                                    </div>
                                                    <form action="{{ route('adminCatDelete',[$category->id]) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $category->id }}">
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
