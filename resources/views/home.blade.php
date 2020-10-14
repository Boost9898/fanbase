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
                        {{ __('Je bent ingelogd') }}

                        {{--Dit is een placeholders waar errors komen--}}
                        @if($errors->any())
                            <div>
                                <br>
                                <p class="alert alert-danger">{{$errors->first()}}</p>
                            </div>
                        @endif

                        <img src="https://cutewallpaper.org/21/toto-band-logo/Toto-Logo-LogoDix.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
