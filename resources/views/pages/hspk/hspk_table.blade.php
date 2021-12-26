@extends('layouts.dashboard')

@section('title')
    HSPK
@endsection

@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    
  <link rel="stylesheet" href="adminlte/plugins/dropzone/min/dropzone.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Profile User</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Pengajuan HSPK</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->

            {{-- <div class="col-md-16"> --}}
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#listhspk" data-toggle="tab">List HSPK</a></li>
                    <li class="nav-item"><a class="nav-link" href="#upload" data-toggle="tab">Upload HSPK</a></li>
                    <li class="nav-item"><a class="nav-link" href="#listhspksah" data-toggle="tab">HSPK Sah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#listhspklive" data-toggle="tab">HSPK Live SIPD</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="listhspk">
                      <!-- Post -->
                      <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-striped " id="crudTable" >
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Uraian</th>
                              <th>Spek</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="upload">

                        <form action="{{ route('importHspk') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                          @csrf
                          <div class="form-group row">
                              <div class="col-sm-10">
                              <input type="file" name="file" class="btn btn-success start" placeholder="Nama" required>
                             
                              <button type="submit" class="btn btn-primary start"><i class="fas fa-upload"></i>Upload</button>
                              <button type="reset" class="btn btn-warning cancel"><i class="fas fa-times-circle"></i> Reset</button>
                              </div>
                          </div>
                        </form>
                        
                    </div>
                    <!-- /.tab-pane -->
                    
                    
                    <div class="tab-pane" id="listhspksah">
                      <!-- Post -->
                      <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-striped " id="crudTable2" width="100%">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Uraian</th>
                              <th>Spek</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.post -->
                    </div>
                    
                    
                    <div class="tab-pane" id="listhspklive">
                      <!-- Post -->
                      <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-striped " id="crudTable3" width="100%">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Uraian</th>
                              <th>Spek</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.post -->
                    </div>
                    
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            {{-- </div> --}}


            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('addon-script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script> --}}

<script>
    
    var datatable = $('#crudTable').DataTable({
      processing : true,
      serverSide: true,
      ordering: true,
      // dom: 'Bfrtip',
      //   buttons: [
      //       'copy', 'csv', 'excel', 'pdf', 'print'
      //   ],
      ajax:{
        url: '{!! url()->current() !!}'
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'uraian',name: 'uraian'},
        {data: 'spek',name: 'spek'},
        {data: 'satuan',name: 'satuan'},
        {data: 'harga',name: 'harga', 
            render: function (data, type, row, meta) {
            return meta.settings.fnFormatNumber(row.harga);
        }
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searcable: false,
          width: '15%'
        },
      ],
    })

    var datatable = $('#crudTable2').DataTable({
      processing : true,
      serverSide: true,
      ordering: true,
      // dom: 'Bfrtip',
      //   buttons: [
      //       'copy', 'csv', 'excel', 'pdf', 'print'
      //   ],
      ajax:{
        url: '{{ route('data-hspk-sah-user') }}'
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'uraian',name: 'uraian'},
        {data: 'spek',name: 'spek'},
        {data: 'satuan',name: 'satuan'},
        {data: 'harga',name: 'harga', 
            render: function (data, type, row, meta) {
              return meta.settings.fnFormatNumber(row.harga);
            }
        },
      ],
    })

    var datatable = $('#crudTable3').DataTable({
      processing : true,
      serverSide: true,
      ordering: true,
      // dom: 'Bfrtip',
      //   buttons: [
      //       'copy', 'csv', 'excel', 'pdf', 'print'
      //   ],
      ajax:{
        url: '{{ route('data-hspk-sah-user') }}'
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'uraian',name: 'uraian'},
        {data: 'spek',name: 'spek'},
        {data: 'satuan',name: 'satuan'},
        {data: 'harga',name: 'harga', 
            render: function (data, type, row, meta) {
              return meta.settings.fnFormatNumber(row.harga);
            }
        },
      ],
    })

</script>

@endpush