@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        
            <h1>MEMO</h1>
            <h2>O seu gerenciador de memorando</h2>
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <p class="font-color type-font">Usuário</p>
                    <input type="email" name="email" class=" font-color type-font"  autocomplete="off" value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="font-color">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <p class="font-color type-font">Senha</p>
                    <input type="password" name="password" class=" font-color type-font"  >
                    <span class="fa fa-lock "></span>
                    @if ($errors->has('password'))
                        <span class="font-color ">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="auth-links">
                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                   class="text-right font-color"
                >{{ trans('adminlte::adminlte.i_forgot_my_password') }}</a>
                
                @if (config('adminlte.register_url', 'register'))
                    <a href="{{ url(config('adminlte.register_url', 'register')) }}"
                       class="text-left font-color"
                    >{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>
                @endif
            </div>
            <br>
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn">{{ trans('adminlte::adminlte.sign_in') }}</button>
                    </div>

                </div>
            </form>
            
        
        
    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
