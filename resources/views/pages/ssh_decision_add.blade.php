@extends('layouts.dashboard')

@section('title')
   List SSH
@endsection

@push('addon-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.css') }}">
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
                      <div class="card-body">
                <div class="tab-pane" id="settings">
                    <form action="{{ route('data-ssh-add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="{{ $ssh->ssh_id }}" name='ssh_id' required>
                            <select class="form-control select2" style="width: 100%;" name="kode">
                      
                              @forelse ($stand as $s)
                                <option value="{{ $s->id }}">{{ $s->kode_standar .' '.$s->nama_standar }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        @php
                          for ($i=1; $i <= 2 ; $i++) { 
                        @endphp
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening {{ $i }}</label>
                            <div class="col-sm-10">
                              <select class="form-control R{{ $i }}" style="width: 100%;" name="R{{ $i }}">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>
                        @php
                          }
                        @endphp

                        {{-- <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 2</label>
                            <div class="col-sm-10">
                              <select class="form-control R2" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 3</label>
                            <div class="col-sm-10">
                              <select class="form-control R3" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 4</label>
                            <div class="col-sm-10">
                              <select class="form-control R4" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 5</label>
                            <div class="col-sm-10">
                              <select class="form-control R5" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 6</label>
                            <div class="col-sm-10">
                              <select class="form-control R6" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 7</label>
                            <div class="col-sm-10">
                              <select class="form-control R7" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 8</label>
                            <div class="col-sm-10">
                              <select class="form-control R8" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 9</label>
                            <div class="col-sm-10">
                              <select class="form-control R9" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rekening 10</label>
                            <div class="col-sm-10">
                              <select class="form-control R10" style="width: 100%;">
                      
                              @forelse ($acc as $a)
                                <option value="{{ $a->id }}">{{ $a->kode_rekening .' '.$a->nama_rekening }}</option>
                              @empty
                                <option>Kosong</option>
                              @endforelse
                            </select>
                            </div>
                        </div> --}}
                        
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
                      <!-- /.post -->
                    </div>
                    
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

<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    
  $(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
  $('.R1').select2()
  $('.R2').select2()
  $('.R3').select2()
  $('.R4').select2()
  $('.R5').select2()
  $('.R6').select2()
  $('.R7').select2()
  $('.R8').select2()
  $('.R9').select2()
  $('.R10').select2()

  })  

  $(function () {
    // Summernote
    $('#summernote').summernote()

  })

 

</script>

@endpush