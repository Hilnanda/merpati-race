@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Module Footer
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
              <h3 class="box-title">Module Footer</h3><br><br>
              {{-- <button class="btn btn-success"></button> --}}
              @if (count($data_footer)!=1)
              <a id="modal-515165" href="#modal-container-515165" role="button" class="btn btn-success" data-toggle="modal">+ Footer</a>
                @else

              @endif
			
              <div class="modal fade" id="modal-container-515165" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">
                        Add Footer
                      </h5> 
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="{{ route('cms-footer-create') }}" method="POST">
                      {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                          
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <label for="name" class="control-label">Copyright</label>
                              <input type="text" name="name_copyright" class="form-control"  placeholder="Ex: Copyright@footer 2020"><br>
                            </div>
                            
                          </div>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                       <input type="submit" class="btn btn-primary" value="Simpan">
                      
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </form>
                  </div>
                  
                </div>
                
              </div>

			
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  @foreach ($data_footer as $item)
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <label for="name" class="control-label">Footer Copyright</label> 
                          <a style="margin-left: 5px;color: blue" id="footer{{$item->id}}" href="#footer-container{{$item->id}}" role="button" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a> |
                          <a style=";color: red" class="delete-club" href="footer-delete/{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                          <input type="text" name="username_footer" class="form-control" value="{{ $item->name_copyright }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="footer-container{{$item->id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">
                              Edit Footer
                            </h5> 
                            <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <form action="{{ route('footer-edit') }}" method="POST">
                            {{csrf_field()}}
                          <div class="modal-body">
                              <div class="form-group">
                                
                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="name" class="control-label">Name Social Media</label>
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="text" name="name_copyright" class="form-control" value="{{ $item->name_copyright }}"><br>
                                  </div>
                                  
                                </div>
                              </div>
                            
                          </div>
                          <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" value="Simpan">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                              Close
                            </button>
                          </div>
                        </form>
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
                  
                  @endforeach

                  
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