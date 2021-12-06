@extends('layouts.dashboard')

@section('title')
    List SSH
@endsection

@push('addon-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    
  {{-- <link rel="stylesheet" href="adminlte/plugins/dropzone/min/dropzone.min.css"> --}}
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
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
              <li class="breadcrumb-item active">List SSH</li>
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
                    <li class="nav-item"><a class="nav-link active" href="#listssh" data-toggle="tab">List SSH</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#upload" data-toggle="tab">Upload SSH</a></li> --}}
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="listssh">
                      <!-- Post -->
                      <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-striped " id="dataSsh" >
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Uraian</th>
                              <th>Spek</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                              <th>Aksi</th>
                            </tr>
                            <tbody>
                              @php
                                $i=0;
                              @endphp
                              @foreach ($ssh as $ss)
                              <tr>
                                <td>{{ $i += 1 }}</td>
                                <td>{{ $ss->uraian }}</td>
                                <td>{{ $ss->spek }}</td>
                                <td>{{ $ss->satuan }}</td>
                                <td>{{ number_format($ss->harga) }}</td>
                                <td>
                                  <form action="{{ route('data-ssh-add',$ss->ssh_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <select class="form-control select2" style="width: 100%;" name="standard">
                                      @forelse ($stand as $s)
                                        <option value="{{ $s->id }}">{{ $s->kode_standar .' '.$s->nama_standar }}</option>
                                      @empty
                                        <option>Kosong</option>
                                      @endforelse
                                    </select>
                                    
                                    <button type="submit" class="btn btn-block btn-success"><i class="fas fa-plus"></i> Save</button>
                                    
                                    {{-- <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default"
                                    data-id="{{ $ss->ssh_id }}">
                                      <i class="fas fa-paper-plane"></i>
                                      Kirim Pesan
                                    </button> --}}
                                  </form>
                                  

                                  {{-- <form action="{{ route('data-ssh-add',$s->ssh_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                    <select class="form-control select2" style="width: 100%;" name="standard">
                                      @forelse ($stand as $s)
                                        <option value="{{ $s->id }}">{{ $s->kode_standar .' '.$s->nama_standar }}</option>
                                      @empty
                                        <option>Kosong</option>
                                      @endforelse
                                    </select>
                                  </form> --}}

                                </td> 
                              </tr> 
                              
                              @endforeach
                            </tbody>
                          </thead>
                        </table>
                      </div>
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    {{-- <div class="tab-pane" id="upload">

                        <form action="{{ route('importSsh') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                          @csrf
                          <div class="form-group row">
                              <div class="col-sm-10">
                              <input type="file" name="file" class="btn btn-success start" placeholder="Nama" required>
                             
                              <button type="submit" class="btn btn-primary start"><i class="fas fa-upload"></i>Upload</button>
                              <button type="reset" class="btn btn-warning cancel"><i class="fas fa-times-circle"></i> Reset</button>
                              </div>
                          </div>
                        </form>
                        
                    </div> --}}
                    <!-- /.tab-pane -->
  
                    
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

  {{-- <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Kirim Pesan Ke User{{ $ss->ssh_id }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('data-ssh-pesan') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card-body">
              <input type="text" id="ssh_id" name="ssh_id" value="">
              <textarea id="summernote" name="pesan">
                
              </textarea>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> --}}

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

<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>



<script>


$(function () {
    $("#dataSsh").DataTable({
      processing : true,
      ordering: true,
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })  

  $(function () {
    // Summernote
    $('#summernote').summernote()

  })




</script>

@endpush