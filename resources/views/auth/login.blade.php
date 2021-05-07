@section('title', 'Login')
@section('layout_css')
    <style>
        #box-login-personalize{
            width: 360px;
            margin: 3% auto;
        }
    </style>
@stop

<!DOCTYPE html>
<html lang="en">
    <head>

        @include('layouts.AdminLTE._includes._head')

    </head>
    <body class="hold-transition login-page">
        <div id="box-login-personalize">
            <div class="login-logo">
                
                @if(\App\Models\Config::find(1)->img_login == 'T')
                    <img src="{{ asset(\App\Models\Config::find(1)->caminho_img_login) }}" width="{{ \App\Models\Config::find(1)->tamanho_img_login }}%"/>
                    <br/>
                @endif
               
                {!! \App\Models\Config::find(1)->titulo_login !!}             
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <input id="email" type="text" class="form-control" placeholder="Usuário" name="email" value="{{ old('email') }}" autofocus required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" placeholder="Senha" name="password" required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <br/>
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('email') }}</p></strong>
                            </span>
                        @endif
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">  
                        <!--<div class="col-xs-8">
                          <div class="checkbox icheck">
                            <label>
                              <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember me
                            </label>
                          </div>
                        </div>-->
                        <div class="col-xs-12">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>  
                        <br/><br/><br/>
                        <!--<div class="col-xs-12">
                            <center>
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                                <br/>
                                <a href="{{ route('register') }}">Sign up</a>
                            </center> -->                     
                        </div>
                    </div>                  
                </form> 
            </div>
        </div>

        @include('layouts.AdminLTE._includes._script_footer')
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });
          });
        </script>
    </body>
</html>