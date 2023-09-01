@extends('../admin/layouts.app')



@section('content')
<div class="card bg-white">
    <div class="card-body mt-3 mb-3">
        <div class="geleral-settings">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#app-setting">App Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#authotication" role="tab" aria-controls="profile" aria-selected="false">Auth Settings</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="app-setting" role="tabpanel" aria-labelledby="home-tab">
                <form action="">
                    
                
                    <div class="form-group row">
                        <div class="col-md-2 text-right">App Name</div>
                        <div class="col-md-4">
                            <input id="name" type="text" placeholder="App Name" class="form-control" name="name" value=""  autofocus="">

                         </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2 pt-5 text-right">Upload favicon</div>
                        <div class="col-md-4">
                          <div class="set_thumb">

                            <div id='settings-favicon'>
                              <img id="preview-favicon" align='middle'src="{{ asset('backend/assets/images/icons/favicon.png') }}" alt="your image" title=''/>
                            </div>
                                <div class="fileUploadInput">
                                    <input type="file" id="file-input-favicon"/>
                                    <button class="input-file-btn"><i class="material-icons"> cloud_upload </i></button>
                                </div>
                          </div>
                         </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2 pt-5 text-right">Upload Website Logo</div>
                        <div class="col-md-4">
                          <div class="set_thumb">

                            <div id='settings-logo'>
                              <img id="preview-thumb" align='middle'src="{{ asset('backend/assets/images/icons/favicon.png') }}" alt="your image" title=''/>
                            </div>
                                <div class="fileUploadInput">
                                    <input type="file" id="file-input-logo"/>
                                    <button class="input-file-btn"><i class="material-icons"> cloud_upload </i></button>
                                </div>
                          </div>
                         </div>
                    </div>
                    <div class="form-group pt-2 row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <button class="theme-primary-btn btn btn-success" type="button">Update settings</button>
                         </div>
                    </div>



                </form>
              </div>


              <div class="tab-pane fade" id="authotication" role="tabpanel" aria-labelledby="profile-tab"> 
                <form action="">
                    
                    <div class="form-group row">
                        <div class="col-md-3 text-right">Allow Registration - E-Mail</div>
                        <div class="col-md-4">
                            <div id="switch-btn">
                                <label class="switch">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 text-right">Allow Registration - Facebook</div>
                        <div class="col-md-4">
                            <div id="switch-btn">
                                <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 text-right">Allow Registration - Twitter</div>
                        <div class="col-md-4">
                            <div id="switch-btn">
                                <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 text-right">Allow Registration - Google</div>
                        <div class="col-md-4">
                            <div id="switch-btn">
                                <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
                            </div>
                         </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 text-right">Allow Registration - Github</div>
                        <div class="col-md-4">
                            <div id="switch-btn">
                                <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
                            </div>
                         </div>
                    </div>

                    <div class="form-group pt-2 row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <button class="theme-primary-btn btn btn-success" type="button">Update settings</button>
                         </div>
                    </div>



                </form>
              </div>


   

            </div>
        </div>
    </div>
</div>

@endsection
