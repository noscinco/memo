@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="login-box">
        <h1>Cadastrar</h1>
        <h2>Insira seus dados</h2>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="font-color type-font" autocomplete="off" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="fa fa-user"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="font-color type-font"  autocomplete="off" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- ACRESCENTEI os campos a partir daqui
                DEIXEI A MESMA ESTRUTURA 
                !!! OS CAMPOS "DEPARTAMENTO" E "CARGO" DEVEM VIR DO BD 
                 -->
                <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <input type="number" name="cpf" class="font-color type-font"  autocomplete="off" value="{{ old('pf') }}"
                           placeholder="CPF">
                    <span class="fa fa-user form-control-feedback"></span>
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('matricula') ? 'has-error' : '' }}">
                    <input type="number" name="matricula" class="font-color type-font"  autocomplete="off" 
                           placeholder="Matrícula">
                    <span class="fa fa-user form-control-feedback"></span>
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('matricula') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback ">
                    <label type="text"   autocomplete="off" > </label>       
                    <span class="fa fa-user form-control-feedback"></span>
                    
       
          <select class="custom-select font-color type-font" name="depatamento">
            <option selected>Departamento</option>      
            <option value= "">deve ser puxado do banco</option>
          </select>
     
                    
                </div>
                <div class="form-group has-feedback ">
                <label type="text" autocomplete="off" > </label>
                <span class="fa fa-user form-control-feedback"></span> 
                    <select class="custom-select font-color type-font" name="cargo" >
                         <option selected> Cargo</option>
            
                         <option value= "">deve ser puxado do banco</option>
        
                    </select>
                    
                    @if ($errors->has('CARGO'))
                        <span class="help-block">
                            <strong>{{ $errors->first('matricula') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class=" font-color type-font" 
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="fa fa-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- FIM DA INCREMENTAÇÃO -->
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class=" font-color type-font" 
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="fa fa-lock form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-right font-color">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
                <button type="submit"class="btn">{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            
    </div>
        
        
    
@stop

@section('adminlte_js')
    @yield('js')
@stop
