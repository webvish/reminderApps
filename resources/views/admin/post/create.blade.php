<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
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
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
            </div>

            <div class="card-body">
                <form id="add_com" action="{{ route('insertPost') }}" method="POST">
                  {{ csrf_field() }}
              <div class="row margin-0">
                <div class="col-md-6">

                <div class="form-group">
                  <label for="name">Name<span class="required">*</span></label>
                  <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Title" value="{{ old('title') }}" autofocus>
                  @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="description">Description<span class="required">*</span></label>
                  <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" cols="90" rows="5"></textarea>
                  @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>

              </div>

              </div>
                <div class="col-md-6">
                  <div class="row margin-0">
                      <div class="form-group">
                            <input type="submit" class="btn btn-success" value="ADD" />
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
