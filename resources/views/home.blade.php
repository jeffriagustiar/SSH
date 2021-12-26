@extends('layouts.app')
@section('title')
    Tes
@endsection

@push('addon-style')
<!-- Select2 -->
<link rel="stylesheet" href="adminlte/plugins/select2/css/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{ $user->profile->nama }}
                </div>

                <form action="{{ route('importSsh') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="">
                    <button type="submit">Unggah</button>
                </form>

                <br>

                {{-- @forelse ($ssh as $s)
                    <div class="card-header">{{ $s->standard->kode_standar ." -> ". $s->standard->nama_standar ." -> ". number_format($s->harga) ." -> ". $s->standard->kelompok }}</div>
                @empty
                    <div class="card-header">{{ __('Kosong') }}</div>
                @endforelse --}}

                <br>

                @forelse ($com as $c)
                <table class="table table-bordered table-striped " id="crudTable3" width="100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Uraian</th>
                        <th>Spek</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Harga</th>
                        <th>Harga</th>
                      </tr>
                      <td>{{ $c->sandard->kode_standar }}</td>
                      <td>{{ $c->ssh->uraian }}</td>
                      <td>{{ $c->ssh->spek }}</td>
                      <td>{{ $c->ssh->satuan }}</td>
                      <td>{{ $c->ssh->harga }}</td>
                      <td>{{ $c->ssh->acc1->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc2->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc3->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc4->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc5->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc6->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc7->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc8->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc9->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->acc10->kode_rekening ?? ''}}</td>
                      <td>{{ $c->ssh->kelompok }}</td>
                       
                    </thead>
                  </table>
                @empty
                    
                @endforelse

                {{-- <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2" style="width: 100%;">
                      
                      @forelse ($stand as $s)
                        <option value="{{ $s->id }}">{{ $s->kode_standar .' '.$s->nama_standar }}</option>
                      @empty
                        <option>Kosong</option>
                      @endforelse
                    </select>
                </div> --}}

                    {{-- @forelse ($ssh as $u)
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    AA {{ $u->kelompok }}{{ $u->ssh_id }}
                    </div>
                    @empty
                        <div class="card-header">{{ __('Kosong') }}</div>
                    @endforelse --}}

            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('addon-script')
<!-- Select2 -->
<script src="adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
@endpush --}}
