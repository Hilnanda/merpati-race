@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
@endsection

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Training Pigeon</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->
<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        {{-- <h4>Detail Club Saya</h4> --}}
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    <div id="accordion" class="mt-3">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5>Keterangan Burung</h5>
                              </button>
                            </h5>
                          </div>
              
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <table id="" class="table table-bordered table-striped table-sm">
                                  <thead>
                                      <th>UID Burung</th>
                                      <th>Ukuran Cincin</th>
                                      <th>Nama Burung</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Warna</th>
                                      <th>Status</th>
                                      {{-- <th>Club</th>
                                      <th>Team</th> --}}
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{$data->uid_pigeon}}</td>
                                          <td>{{$data->ring_size_pigeon}}</td>
                                          <td>{{$data->name_pigeon}}</td>
                                          <td>{{$data->sex_pigeon}}</td>
                                          <td>{{$data->color_pigeon}}</td>
                                          <td>@if($data->is_active==0) Belum Aktif @else Aktif @endif</td>
                                          {{-- <td>{{!empty($bird->club_member->first()) ? $bird->club_member->first()->club->first()->name_club:"-"}}</td> --}}
                                          {{-- <td>{{!empty($bird->team_member->first()) ? $bird->team_member->first()->team->first()->name_team:"-"}}</td> --}}
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- @if (Auth::user()->id==$clubs->manager_club||$exist == 1) --}}
                    {{-- <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#tambah_burung">Daftarkan </button>
                    <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#edit_name_loft">Edit Nama Loft</button> --}}
                        {{-- @endif --}}
                                     
                    <div class="row">


                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- bagian statistik --}}
                    {{-- {!! $statisticsChart->container() !!} --}}
                    {{-- <div class="card-body">
                        <div class="chart">
                          <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                      </div> --}}
                     
                        <canvas id="myChart"></canvas>
                    
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>List Lomba</h2>
                    <table id="table_one" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Event</th>
                                <th>Cabang Event</th>
                                <th>Kategori</th>
                                <th>Juara</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($bird->pigeons_participants as $participants)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$participants->name_event}}</td>
                                    <td>{{$participants->branch_event}}</td>
                                    <td>{{$participants->category_event}}</td>
                                    <td>{{$participants->event_results->orderBy('speed_event_result','desc')->first()->event_participants->pigeons->name_pigeon}}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection

@push('bottom-script')
    <script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                'scrollX': true,
            })
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'scrollX': true,
            })
        })

    </script>

    <script>
        function setMaxDueDateAdd() {
            var release_time = document.getElementById("release_time_event_add").value;
            document.getElementById("due_join_date_event_add").max = release_time;
        }
    </script>
{{-- @endpush --}}

{{-- @push('bottom-script') --}}

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
 
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($event_results as $result)
                    <?php echo "'$result->name_event'".','?>
                    @endforeach
            ],
            // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [
                {
                label: 'Speed',
                fill: false,
                data: 
                // [12, 19, 3, 23, 2, 3],                
                [
                    @foreach($event_results as $result)
                   {{$result->speed_event_result}},
                    @endforeach
                    
                ],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
@endpush