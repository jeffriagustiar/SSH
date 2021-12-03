@extends('layouts.dashboard')

@section('title')
    SSH
@endsection

@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Pengajuan SSH</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengajuan SSH</h3>

                <div class="card-tools">
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button> --}}
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> --}}
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="crudTable">
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
              <!-- /.card-body -->
              <div class="card-footer">
                Register at    
              </div>
              <!-- /.card-footer-->
            </div>
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

<script>
    
    var datatable = $('#crudTable').DataTable({
      processing : true,
      serverSide:true,
      ordering: true,
      ajax:{
        url: '{!! url()->current() !!}'
      },
      columns:[
        {data: 'id',name: 'id'},
        {data: 'uraian',name: 'uraian'},
        {data: 'spek',name: 'spek'},
        {data: 'satuan',name: 'satuan'},
        {data: 'harga',name: 'harga'},
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searcable: false,
          width: '15%'
        },
      ]
    })
</script>

@endpush