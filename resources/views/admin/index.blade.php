@extends('../admin/layouts.app')

@section('content')
        <!-- Dashboard Box -->
        <div class="row animated fadeInUp">
          @if (count($users) > 0)
            
        
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body pt-5 pb-5 d-flex align-items-center">
                  <div class="card-body-icon">
                    <i class="material-icons text-white md-5em">group</i>
                  </div>
                  <div class="ml-5">
                    <h3>( {{ count($users) }} ) </h3>
                    <p>Total Candidates</p>
                  </div>
                </div>
        
              </div>
            </div>
            @endif

            @if (count($activeJobs) > 0)
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body pt-5 pb-5 d-flex align-items-center">
                  <div class="card-body-icon">
    <i class="material-icons text-white md-5em">business_center</i>
                  </div>
                  <div class="ml-5">
                    <h3>( {{ count($activeJobs) }} )</h3>
                    <p>Total Active Jobs</p>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if (count($companies) > 0)
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body pt-5 pb-5 d-flex align-items-center">
                  <div class="card-body-icon">
    <i class="material-icons text-white md-5em">business</i>
    
                  </div>
                  <div class="ml-5">
                    <h3>( {{ count($companies) }} )</h3>
                    <p> Total Employes Jobs</p>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if (count($featuredJobs) > 0)
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body pt-5 pb-5 d-flex align-items-center">
                  <div class="card-body-icon">
    <i class="material-icons text-white md-5em">favorite</i>
                  </div>
                  <div class="ml-5">
                    <h3>( {{ count($featuredJobs) }} )</h3>
                    <p> Total Featured Jobs</p>
                  </div>
                </div>
              </div>
            </div>
            @endif

        </div>
         <!-- Dashboard Box --> 

         <div class="row mt-3">

          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="chart-container">
                          <canvas id="totalCount"></canvas>

                      </div>
                  </div>
              </div>
          </div>

          @if (count($weeklyUsers) > 0)
          <div class="col-md-4">
            <div class="card">
                <div class="card-header">Recent Candidates</div>
                <div class="card-body pt-0 border-0">
                   <table class="table table-striped mb-0">
                      <thead>
                        <tr class="">
                            <th>Name</th>
                            <th >Created Date</th>
                            <th >Is Verified</th>
                        </tr>
                      </thead>

                        <tbody>
                            
                          @foreach ($weeklyUsers as $user )
                          <tr>
                               <td>{{ $user->name }}</td>
                               <td >{{ $user->created_at->diffForHumans() }}</td>
                               <td>
                                            
                                  @if ($user->email_verified_at)
                                  <i class="material-icons  alert-success">check_circle</i>
                                  @else
                                  <i class="material-icons  alert-danger">close</i>
                                  @endif

                              </td>
                           </tr>
                            
                          @endforeach
                      
                        

                        </tbody>
                   </table>
                </div>
            </div>
        </div>
        @endif


        @if (count($weeklyEmployee) > 0)
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">Recent Employers</div>
              <div class="card-body pt-0 ">
                  <table class="table table-striped mb-0">
                    <thead>
                      <tr class="">
                          <th>Name</th>
                          <th >Created Date</th>
                          <th >Is Verified</th>
                      </tr>
                    </thead>

                      <tbody>
                          
                        @foreach ($weeklyEmployee as $user )
                        <tr>
                              <td>{{ $user->company->cname }}</td>
                              <td >{{ $user->created_at->diffForHumans() }}</td>
                              <td>
                                          
                                @if ($user->email_verified_at)
                                <i class="material-icons  alert-success">check_circle</i>
                                @else
                                <i class="material-icons  alert-danger">close</i>
                                @endif

                            </td>
                          </tr>
                          
                        @endforeach
                    
                      

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      @endif





      </div>

      <div class="row mt-3">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="weekly-visitor"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!--====== Chart.min js ======-->
    <script src="{{ asset('backend/assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chartfunction.js') }}"></script>


    <script>
      // Fetch your data from the server
      const data = {
          employes: {{ $companies ? count($companies) : 0 }},
          users: {{ $users ? count($users) : 0 }},
          jobs: {{ $activeJobs ? count($activeJobs) : 0 }}
      };


      // Create the pie chart
      const ctx = document.getElementById('totalCount').getContext('2d');
      new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['Employes', 'Users', 'Jobs'],
          datasets: [{
          data: [data.employes, data.users, data.jobs],
          backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
          }]
      }
      });


      const weeklyVisitor = document.getElementById('weekly-visitor');

      new Chart(weeklyVisitor, {
      type: 'line',
      data: {
          labels: ['Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
          datasets: [{
          label: 'Weekly Visitor',
          data: [3, 0, 3, 2, 4, 3, 2],
          borderWidth: 1,
           backgroundColor: ['#17a2b8', '#ffc107', '#28a745', '#dc3545', '#007bff', '#6c757d', '#343a40']
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
      });
  </script>



    

@endsection
