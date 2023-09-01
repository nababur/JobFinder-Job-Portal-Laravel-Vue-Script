@extends('../admin/layouts.app')



@section('content')

    <!--  Header BreadCrumb -->
    <div class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
        
        <li class="breadcrumb-item active" aria-current="page">Create new job</li>
        </ol>
    </nav>
    <div class="create-item">
        <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;Back to jobs</a>
        
        
    </div>
</div>
    <!--  Header BreadCrumb --> 



<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

        <form action="{{ route('adminJobStore') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">Company name</div>
                <div class="col-md-4">
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach (App\Models\Company::all() as $company)
                      
                        <option value="{{ $company->id }}">{{ $company->cname }}</option>
                     
                            
                        @endforeach

                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                    </select>
              


                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Job Title</div>
                <div class="col-md-4">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    @if ($errors->has('title'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('title') }}</p>
                        </div>
                    @endif

                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Job Position</div>
                <div class="col-md-4">
                    <input type="text" name="position" value="{{ old('position') }}" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}">
                    @if ($errors->has('position'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('position') }}</p>
                        </div>
                    @endif

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Year of experience</div>
                <div class="col-md-4">
                    <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience') }}">
                    @if ($errors->has('experience'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('experience') }}</strong>
                    </span>
                     @endif

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Job Type</div>
                <div class="col-md-4">
                    <select name="type" id="type" class="form-control">
                        <option value="fulltime">Fulltime</option>
                        <option value="partime">Partime</option>
                        <option value="remote">Remote</option>
                    </select>
                    @if ($errors->has('type'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('type') }}</p>
                        </div>
                    @endif
             
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Category</div>
                <div class="col-md-4">
                    <select name="category" id="category" class="form-control">
                        @foreach (App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('category') }}</p>
                        </div>
                    @endif


                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Address</div>
                <div class="col-md-4">
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('address') }}</p>
                        </div>
                    @endif
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Role</div>
                <div class="col-md-6">
                    <textarea name="roles" style="height: 140px" class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}" >{{ old('roles') }}</textarea>
                    @if ($errors->has('roles'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('roles') }}</p>
                        </div>
                    @endif

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Description</div>
                <div class="col-md-6">
                    <textarea name="description" id="editor" style="height: 120px"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('description') }}</p>
                        </div>
                    @endif
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Nomber of vacancy</div>
                <div class="col-md-4">
                    <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" value="{{ old('number_of_vacancy') }}" >
                    @if ($errors->has('number_of_vacancy'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                    </span>
                     @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Gender</div>
                <div class="col-md-4">
                    <select class="form-control" name="gender">
                        <option value="any">Any</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Salary/year</div>
                <div class="col-md-4">
                    <select class="form-control" name="salary">
                        <option value="negotiable">Negotiable</option>
                        <option value="2000-5000">2000-5000</option>
                        <option value="50000-10000">5000-10000</option>
                        <option value="10000-20000">10000-20000</option>
                        <option value="30000-500000">50000-500000</option>
                        <option value="500000-600000">500000-600000</option>
    
                        <option value="600000 plus">600000 plus</option>
                    </select>
                 </div>
            </div>


            <div class="form-group row">
                <div class="col-md-2">Status</div>
                <div class="col-md-4">
                    <select name="status" id="status" class="form-control">
                        <option value="1">Live</option>
                        <option value="0">Draft</option>
                    </select>
                    @if ($errors->has('status'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('status') }}</p>
                        </div>
                    @endif
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 ">Job apply last date</div>
                <div class="col-md-4">
                    <input type="date" name="last_date" value="{{ old('last_date') }}" class="form-control{{ $errors->has('last_date') ? ' is-invalid' : '' }}">
                    @if ($errors->has('last_date'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('last_date') }}</p>
                        </div>
                    @endif

                 </div>
            </div>
            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">Post job</button>
                 
                 </div>
            </div>

        </form>
  
    </div>
</div>  

@endsection
