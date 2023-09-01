@extends('../admin/layouts.app')



@section('content')
    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">View job : {{ $job->title }} </li>
            </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;Back to jobs</a>
            
            
        </div>
    </div>
        <!--  Header BreadCrumb --> 


<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

 

            <div class="form-group row">
                <div class="col-md-2">Job Title</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->title }}" class="form-control">
   

                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Job Position</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->position }}" class="form-control">
                   
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Year of experience</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control"  value="{{ $job->experience }}">
                  

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Job Type</div>
                <div class="col-md-4">
                    <select readonly class="form-control">
                        <option value="Fulltime"{{ $job->type=='Fulltime' ? 'selected':'' }}>Fulltime</option>
                        <option value="Partime"{{ $job->type=='Partime' ? 'selected':'' }}>Partime</option>
                        <option value="Remote"{{ $job->type=='Remote' ? 'selected':'' }}>Remote</option>
                        
                    </select>
             
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Category</div>
                <div class="col-md-4">
                    <select readonly id="category_id" class="form-control">
                        @foreach (App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id==$job->category_id ? 'selected':'' }}>{{ $cat->name }}</option>
                            
                        @endforeach
                    </select>

                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Address</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->address }}" class="form-control">
                   
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Role</div>
                <div class="col-md-6">
                    <textarea readonly style="height: 140px" class="form-control" >{{ $job->roles }}</textarea>
                   

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Description</div>
                <div class="col-md-6">
                    <textarea readonly  style="height: 120px"  class="form-control" >{{ $job->description }}</textarea>
                  
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Nomber of vacancy</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control"  value="{{ $job->number_of_vacancy }}">
                   
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Gender</div>
                <div class="col-md-4">
                    <select class="form-control" readonly>
                        <option value="any"{{ $job->gender=='any' ? 'selected':'' }}>Any</option>
                        <option value="male"{{ $job->gender=='male' ? 'selected':'' }}>Male</option>
                        <option value="female"{{ $job->gender=='female' ? 'selected':'' }}>Female</option>
                      
                    </select>
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Salary/year</div>
                <div class="col-md-4">

                    <select class="form-control" readonly>
                        <option value="negotiable"{{ $job->salary=='negotiable' ? 'selected':'' }}>Negotiable</option>
                        <option value="2000-5000"{{ $job->salary=='2000-5000' ? 'selected':'' }}>2000-5000</option>
                        <option value="50000-10000"{{ $job->salary=='50000-10000' ? 'selected':'' }}>5000-10000</option>
                        <option value="10000-20000"{{ $job->salary=='10000-20000' ? 'selected':'' }}>10000-20000</option>
                        <option value="30000-500000"{{ $job->salary=='30000-500000' ? 'selected':'' }}>50000-500000</option>
                        <option value="500000-600000"{{ $job->salary=='500000-600000' ? 'selected':'' }}>500000-600000</option>
    
                        <option value="600000 plus"{{ $job->salary=='600000 plus' ? 'selected':'' }}>600000 plus</option>
                    </select>
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Status</div>
                <div class="col-md-4">
                    <select readonly id="status" class="form-control">
                        <option value="1"{{ $job->status=='1' ? 'selected':'' }}>Live</option>
                        <option value="0"{{ $job->status=='0' ? 'selected':'' }}>Draft</option>
                    </select>
                
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 ">Job apply last date</div>
                <div class="col-md-4">
                    <input type="date" readonly value="{{ $job->last_date }}" class="form-control">
              
                 </div>
            </div>
            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="/dashboard/jobs" class="theme-primary-btn btn btn-success">Back to jobs</a>
                 
                 </div>
            </div>

    
  
    </div>
</div>  

@endsection
