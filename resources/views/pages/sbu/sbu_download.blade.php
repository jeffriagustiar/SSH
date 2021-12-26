@extends('layouts.dashboard')

@section('title')
   List SBU
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
              <li class="breadcrumb-item active">List SBU</li>
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
                    <li class="nav-item"><a class="nav-link active" href="#listsbu" data-toggle="tab">Download SBU</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="listsbu">
                      
                      <!-- Post -->
                      <div class="card-body pad table-responsive">
                        <form action="{{ route('sbu-download-templete') }}" method="post" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                            <label for="kelamin" class="col-md-1 col-form-label text-md-right">{{ __('Dari') }}</label>

                            <div class="col-md-4">
                                <input type="date" class="form-control " name="date1"
                                required autocomplete="date1" autofocus>
                            </div>

                            
                            <label for="kelamin" class="col-md-1 col-form-label text-md-right">{{ __('Sampai') }}</label>

                            <div class="col-md-4">
                                <input type="date" class="form-control " name="date2"
                                required autocomplete="date1" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="kelamin" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                          <div class="col-md-4">
                            <input type="submit" class="btn btn-success" value="Download">
                            
                            <input type="reset" class="btn btn-warning" value="Reset">
                          </div>
                        </div>
                          

                         
                          
                        </form>
                        {{-- <button onclick="window.print()">Print this page</button> --}}
                        {{-- <a href="{{ route('ssh-download-templete') }}" class="btn btn-success" >Download</a> --}}
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

