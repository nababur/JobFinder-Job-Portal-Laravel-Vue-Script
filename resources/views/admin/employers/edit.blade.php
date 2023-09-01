@extends('../admin/layouts.app')



@section('content')
       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">Edit : {{ $employer->company->cname ?? '' }}</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/employers" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;Back to employers</a>
          
        </div>
    </div>
      <!--  Header BreadCrumb --> 


<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

        <form action="{{ route('adminEmpUpdate', [$employer->id]) }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">Company Name</div>
                <div class="col-md-4">
                    <input type="text" name="cname" value="{{ $employer->company->cname }}" class="form-control{{ $errors->has('cname') ? ' is-invalid' : '' }}">
                    @if ($errors->has('cname'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('cname') }}</p>
                        </div>
                    @endif

                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Company Email</div>
                <div class="col-md-4">
                    <input type="email" name="email" value="{{ $employer->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Company Address</div>
                <div class="col-md-4">
                    <input type="text" name="address" value="{{ $employer->company->address ?? '' }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('address') }}</p>
                        </div>
                    @endif

                 </div>
            </div>


            <div class="form-group row">
                <div class="col-md-2">Company Website</div>
                <div class="col-md-4">
                    <input type="text" name="website" value="{{ $employer->company->website ?? '' }}" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}">
                    @if ($errors->has('website'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('website') }}</p>
                        </div>
                    @endif

                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Company Phone number</div>
                <div class="col-md-4">
                    <input type="text" name="phone" value="{{ $employer->company->phone ?? '' }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                    @if ($errors->has('phone'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('phone') }}</p>
                        </div>
                    @endif

                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Company Description</div>
                <div class="col-md-6">
                    <textarea name="description" style="height: 140px" class="form-control" >{{ $employer->company->description ?? '' }}</textarea>
                    @if ($errors->has('description'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('description') }}</p>
                        </div>
                    @endif

                 </div>
            </div>

      
            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">Update company</button>
                 
                 </div>
            </div>

        </form>
  
    </div>
</div>  

@endsection
