@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
         <h1>Nova senha</h1>
        <div class="login-box-body">
            <p class="type-font font-color">Insira seu Email</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ url(config('adminlte.password_email_url', 'password/email')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback ">
                    <input type="email" name="email" class="font-color type-font" autocomplete="off" >
                    <span class="fa fa-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"class="btn btn-ajust"
                >{{ trans('adminlte::adminlte.send_password_reset_link') }}</button>
            </form>
        </div>
    </div>
@stop

@section('adminlte_js')
    @yield('js')
@stop
