@extends('layouts.app')

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

                @forelse ($ssh as $u)
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   AA {{ $u->harga }}
                </div>
                @empty
                    <div class="card-header">{{ __('Kosong') }}</div>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
