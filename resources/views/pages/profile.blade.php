@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

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
              <li class="breadcrumb-item active">Profile User</li>
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
                <h3 class="card-title">Profile User</h3>

                <div class="card-tools">
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button> --}}
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> --}}
                </div>
              </div>
              <div class="card-body">
                <div class="tab-pane" id="settings">
                    <form action="{{ route('home-profile-edit',$user->profile->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $user->profile->nama }}" name='nama' placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Alamat">{!! $user->profile->alamat !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Nomor Telfon" value="{{ $user->profile->phone }}" name='phone' required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Register at    {{ $user->created_at->format('d M Y') }}
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