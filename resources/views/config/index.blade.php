@extends('layouts.AdminLTE.index')

@section('icon_page', 'gear')

@section('title', 'Application Settings')

@section('content')
	
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12"> 
                    <form action="{{ route('config.update',$config->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4><b><i class="fa fa-fw fa-arrow-right"></i> General information</b></h4>
                                <hr/>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('app_name') ? 'has-error' : '' }}">
                                    <label for="nome">Application Name</label>
                                    <input type="text" name="app_name" class="form-control"  maxlength="30" placeholder="Application Name" value="{{$config->app_name}}">
                                    @if($errors->has('app_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('app_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('app_name_abv') ? 'has-error' : '' }}">
                                    <label for="nome">Short Name</label>
                                    <input type="text" name="app_name_abv" class="form-control"  maxlength="5" value="{{$config->app_name_abv}}">
                                    @if($errors->has('app_name_abv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('app_name_abv') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group {{ $errors->has('app_slogan') ? 'has-error' : '' }}">
                                    <label for="nome">App Slogan</label>
                                    <input type="text" name="app_slogan" class="form-control"  maxlength="70" placeholder="App Slogan" value="{{$config->app_slogan}}">
                                    @if($errors->has('app_slogan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('app_slogan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                <h4><b><i class="fa fa-fw fa-arrow-right"></i> Captcha Login</b></h4>
                                <hr/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('captcha') ? 'has-error' : '' }}">
                                    <label for="nome">Captcha Login</label>
                                    <select class="form-control" name="captcha">
                                        @if($config->captcha == 'T')
                                        <option value="{{$config->captcha}}">Enable</option>
                                        <option value="F">Disable</option>
                                        @endif
                                        @if($config->captcha == 'F')
                                        <option value="{{$config->captcha}}">Disable</option>
                                        <option value="T">Enable</option>
                                        @endif
                                    </select>
                                    @if($errors->has('captcha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group {{ $errors->has('datasitekey') ? 'has-error' : '' }}">
                                    <label for="nome">Site Key</label>
                                    <input type="text" name="datasitekey" class="form-control" placeholder="Site Key"  maxlength="40" value="{{$config->datasitekey}}">
                                    @if($errors->has('datasitekey'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('datasitekey') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group {{ $errors->has('recaptcha_secret') ? 'has-error' : '' }}">
                                    <label for="nome">Key Secret</label>
                                    <input type="text" name="recaptcha_secret" class="form-control"  maxlength="40" placeholder="Key Secret" value="{{$config->recaptcha_secret}}">
                                    @if($errors->has('recaptcha_secret'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('recaptcha_secret') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-lg-12">
                                <br>
                                <h4><b><i class="fa fa-fw fa-arrow-right"></i> Login Options</b></h4>
                                <hr/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('img_login') ? 'has-error' : '' }}">
                                    <label for="nome">Image Login</label>
                                    <select class="form-control" name="img_login">
                                        @if($config->img_login == 'T')
                                        <option value="{{$config->img_login}}">Enable</option>
                                        <option value="F">Disable</option>
                                        @endif
                                        @if($config->img_login == 'F')
                                        <option value="{{$config->img_login}}">Disable</option>
                                        <option value="T">Enable</option>
                                        @endif
                                    </select>
                                    @if($errors->has('img_login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img_login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group {{ $errors->has('titulo_login') ? 'has-error' : '' }}">
                                    <label for="nome">Title Login</label>
                                    <input type="text" name="titulo_login" class="form-control"  maxlength="40" placeholder="Title Login" value="{{$config->titulo_login}}">
                                    @if($errors->has('titulo_login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('titulo_login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                            
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('tamanho_img_login') ? 'has-error' : '' }}">
                                    <label for="nome">Image size Login</label>
                                    <input type="number" name="tamanho_img_login" class="form-control" value="{{$config->tamanho_img_login}}">
                                    @if($errors->has('tamanho_img_login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tamanho_img_login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <label>Current Login Image</label>
                                <br>
                                <img src="{{ asset($config->caminho_img_login) }}" width="30px" class="img-thumbnail">
                                <br><br>
                            </div>                            
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('caminho_img_login') ? 'has-error' : '' }}">
                                    <label>Image Login</label>
                                    <input type="file" class="form-control-file"  name="caminho_img_login">
                                    @if($errors->has('caminho_img_login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caminho_img_login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                <h4><b><i class="fa fa-fw fa-arrow-right"></i> Layout options</b></h4>
                                <hr/>
                            </div> 
                            <div class="col-lg-4">
                                <div class="form-group {{ $errors->has('layout') ? 'has-error' : '' }}">
                                    <label for="nome">Layout</label>
                                    <select class="form-control" name="layout">
                                        <option value="{{$config->layout}}">{{$config->layout}}</option>
                                        <option value="layout-boxed">layout-boxed</option>                                        
                                        <option value="sidebar-collapse">sidebar-collapse</option>                                        
                                        <option value="fixed">fixed</option>                                        
                                    </select>
                                    @if($errors->has('layout'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('layout') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                            
                            <div class="col-lg-4">
                                <div class="form-group {{ $errors->has('skin') ? 'has-error' : '' }}">
                                    <label>Skin</label>
                                    <select class="form-control" name="skin">
                                        <option value="{{$config->skin}}">{{$config->skin}}</option>
                                        <option value="black">Black</option>                                        
                                        <option value="purple">Purple</option>                                        
                                        <option value="green">Green</option>                                        
                                        <option value="red">Red</option>                                        
                                        <option value="yellow">Yellow</option>                                        
                                        <option value="blue">Blue</option>                                        
                                    </select>
                                    @if($errors->has('skin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('skin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                            
                            <div class="col-lg-1">
                                <label>Current Favicon</label>
                                <br>
                                <img src="{{ asset($config->favicon) }}" width="30px" class="img-thumbnail">
                                <br><br>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                                    <label>Favicon</label>
                                    <input type="file"  class="form-control-file" name="favicon">
                                    @if($errors->has('favicon'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('favicon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                                 
                            <div class="col-lg-12"><hr/></div>
                            <div class="col-lg-12">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i> Save</button>
                            </div>                           
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection