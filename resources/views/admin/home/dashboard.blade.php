
@include('partials/header')
<style type="text/css">
  #chartdiv {
    width: 100%;
    height: 350px;
  }
  .amcharts-export-menu-top-right {
    top: 10px;
    right: 0;
  }

  #DountJS {
    width   : 100%;
    height  :250px;
    font-size : 11px;
  }
</style>
  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('partials/sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('partials/navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
             <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Start Users -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Users -->

            <!-- Start Post -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Post</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $post ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Post -->

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>

@include('partials/footer')
