@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@push('admin-top-style')
    <style>
      input[type="text"],
select.form-control {
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="text"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Module Header
        {{-- <small>advanced tables</small> --}}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Module Social Media</h3><br><br>
              {{-- <button class="btn btn-success"></button> --}}
              <a id="modal-515165" href="#modal-container-515165" role="button" class="btn btn-success" data-toggle="modal">+ Social Media</a>
			
              <div class="modal fade" id="modal-container-515165" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">
                        Modal title
                      </h5> 
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                       
                      <button type="button" class="btn btn-primary">
                        Save changes
                      </button> 
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Instagram</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="control-label">Twitter</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="twitter" class="form-control"  value="https://twitter.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username Twitter">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Facebook</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Module Website Name & Carousel</h3><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Instagram</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="control-label">Twitter</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="twitter" class="form-control"  value="https://twitter.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username Twitter">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Facebook</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection