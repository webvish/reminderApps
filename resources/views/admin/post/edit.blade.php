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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Post</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Post</h6>
            </div>
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
                @endforeach()
              </div>
            @endif

            <div class="card-body">
                <form id="add_com" action="{{ route('updatePost', $postData->id) }}" method="POST">
                  {{ csrf_field() }}
              <div class="row margin-0">
                <div class="col-md-6">

                <div class="form-group">
                  <label for="title">Name<span class="required">*</span></label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $postData->title }}">
                </div>

                <div class="form-group">
                  <label for="description">Description<span class="required">*</span></label>
                  <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  cols="90" rows="5">{{ $postData->description }}</textarea>
                </div>
              </div>

              </div>
                <div class="col-md-6">
                  <div class="row margin-0">
                      <div class="form-group">
                            <input type="submit" class="btn btn-success" value="UPDATE" />
                          <a type="button" class="btn btn-danger" href="{{url('admin/post')}}" ><i class="fa fa-close"></i> CANCEL</a>
                      </div>
                  </div>
                </div>
             </form>
            </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
    </div>
      <!-- End of Main Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script type="text/javascript">
CKEDITOR.replace( 'description',
{
  customConfig : 'config.js',
  toolbar : 'simple'
})
</script>
 @include('partials/footer')
