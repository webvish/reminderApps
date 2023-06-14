<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<style>
  svg {
    overflow: hidden;
    vertical-align: middle;
    display: none;
}
</style>
@include('partials/header')

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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Posts</h1>
            <a href="{{ route('addPostData') }}" class="mb-4 btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Post</a>
          </div>

            @if(Session::has('success'))
              <div id="alert" class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

          <div class="panel-body">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage Posts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="managePost" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                      @if (Auth::user() && Auth::user()->role == 1 || Auth::user()->role == 0)
                        <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<!-- Script -->
<script type="text/javascript">

$(document).ready(function(){

  $('#managePost').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('post-listing')}}",
    columns: [
      // { data: 'id' },
      { data: 'title' },
      { data: 'description' },
      { data: 'user_id' },
      { data: 'action' },
    ]
  });

  setTimeout(function(){
    $("div#alert").remove();
  }, 5000 ); // 5 secs

});
</script>

@include('partials/footer')

