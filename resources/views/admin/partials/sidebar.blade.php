
<!--====== Start Left Sidebar Section======-->
<section id="left-sidebar-area">
  <!--   Left Sidebar  -->
        <div id="left-sidebar-section">

          
            <aside>
              <div class="left-sidebar" id="wrapper-sidebar">
                <ul>
                  <li><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="material-icons">home</i>Dashboard</a></li>
                  <li><a  class="{{ request()->routeIs('adminEmployers') || request()->routeIs('adminEditEmp') ? 'active' : '' }}" href="{{ url('/dashboard/employers') }}"><i class="material-icons">supervisor_account</i>Employers</a></li>
                  <li><a  class="{{request()->routeIs('adminCanTrash') || request()->routeIs('adminEditCan') || request()->routeIs('adminCandidates') ? 'active' : '' }}" href="{{ url('/dashboard/candidates') }}"><i class="material-icons">person</i>Candidates</a></li>
                  <li><a class="{{  request()->routeIs('adminTestiEdit') || request()->routeIs('adminTestimonial') || request()->routeIs('adminTestimonials') ? 'active' : '' }}" href="{{ route('adminTestimonials') }}"><i class="material-icons">comment</i>Testimonial</a></li>
                  <li><a class="{{ request()->routeIs('adminEditCat') || request()->routeIs('adminCategory')? 'active' : '' }}" href="{{ route('adminCategory') }}"><i class="material-icons">format_align_center</i>Category</a></li>
                  <li><a class="{{ request()->routeIs('adminPostCreate') || request()->routeIs('adminPosts') || request()->routeIs('adminPostEdit') || request()->routeIs('adminPostShow') || request()->routeIs('adminPostTrash') ? 'active' : '' }}" href="{{ url('/dashboard/posts') }}"><i class="material-icons">collections</i>Posts</a></li>
                  <li><a class="{{  request()->routeIs('adminShow') || request()->routeIs('adminEdit') || request()->routeIs('adminJobTrash') || request()->routeIs('adminJobs') || request()->routeIs('adminEdit') || request()->routeIs('adminShow') || request()->routeIs('adminCreate')   ? 'active' : '' }}" href="{{ url('/dashboard/jobs') }}"><i class="material-icons">business_center</i>Jobs</a></li>
         
                  <li><a class="{{  request()->routeIs('dashboard.settings')   ? 'active' : '' }}" href="{{ route('dashboard.settings') }}"><i class="material-icons">settings</i>General Settings</a></li>
                  </ul>
              </div>  
            </aside>
        </div>
  <!--   Left Sidebar  -->
  </section>
<!--====== End Left Sidebar Section======-->
