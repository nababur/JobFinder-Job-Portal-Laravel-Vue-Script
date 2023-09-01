@extends('../admin/layouts.app')

@section('content')
       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">Create new post</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/posts" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;Back to posts</a>
           
          
        </div>
    </div>
      <!--  Header BreadCrumb --> 


<div class="card bg-white">
    <div class="card-body mt-5 mb-5">

        <form action="{{ route('adminPostStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">Title</div>
                <div class="col-md-4">
                    <input id="name" type="text" placeholder="Post Title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value=""  autofocus="">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                     @endif


                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="category">Category:</label>
                </div>
                <div class="col-md-4">
                    <select name="category_id" id="category_id" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}">
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
                <div class="col-md-2">Description</div>
                <div class="col-md-10">

                    <textarea name="description" id="editor" class="{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('description') }}</p>
                        </div>
                    @endif
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="file-input-logo">Upload post Thumbnail:</label>
                </div>
                <div class="col-md-4">
                    <div class="set_thumb">

                        <div id='settings-logo'>
                          <img id="preview-thumb" align='middle'src="{{ asset('backend/assets/images/icons/favicon.png') }}" alt="your image" title=''/>
                        </div>
                            <div class="fileUploadInput">
                                <input type="file" name="post_thumbnail" id="file-input-logo"/>
                                <button class="input-file-btn"><i class="material-icons"> cloud_upload </i></button>
                            </div>
                      </div>
                      @if ($errors->has('post_thumbnail'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('post_thumbnail') }}</p>
                            </div>
                        @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="status">Status:</label>
                </div>
                <div class="col-md-4">
                    <select name="status" id="status" class="form-control">
                        
                        <option value="1">Live</option>
                        <option value="0">Draft</option>
                            
                       
                    </select>
                

                 </div>
            </div>




            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">Create post</button>
                   
                 </div>
            </div>

        </form>
  
    </div>
</div>
@endsection
