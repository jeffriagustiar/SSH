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

                @forelse ($ssh as $s)
                    <div class="card-header">{{ $s->account->kode_rekening." ".$s->harga }}</div>
                @empty
                    <div class="card-header">{{ __('Kosong') }}</div>
                @endforelse

                <br><br><br><br><br>

                @forelse ($users as $u)
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Nama->{{ $u->nama }} email->{{ $u->users->email }}
                </div>
                @empty
                    <div class="card-header">{{ __('Kosong') }}</div>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
