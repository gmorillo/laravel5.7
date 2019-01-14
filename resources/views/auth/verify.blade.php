@extends('layouts.app')

@section('content')
<div class="container-fluid bg-danger py-3">
    <h3 class="text-center text-white">Revisa la bandeja ó spam de entrada de tu correo electrónico...!</h3>
</div>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Verificación de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, compruebe su correo electrónico para ver un enlace de verificación.') }}
                    {{ __('Si no ha recibido el correo electrónico.') }}, <a href="{{ route('verification.resend') }}">{{ __('haga clic aquí para solicitar otro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
