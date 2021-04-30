@extends('layouts.AdminLTE.index') 

@section('icon_page', 'user') 

@section('title', 'Perfil de Usuário') 

@section('content') 

<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				@if(file_exists(Auth::user()->avatar))
	              <img src="{{ asset(Auth::user()->avatar) }}" class="profile-user-img img-responsive img-circle">
	            @else
	              <img src="{{ asset('img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
	            @endif							
				<h3 class="profile-username text-center">
					@if(Auth::user('name'))
		              {{ Auth::user()->name }}
		            @endif
				</h3>	
				@foreach($roles as $role)
                    @if(in_array($role->id, $roles_ids))
                        <div class="text-center"><span class="label label-primary">{{ $role->name }}</span></div> 
                    @endif                                             
                @endforeach	
			</div>
		</div>		
	</div>
	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-user"></i> Perfil</a></li>
				<li><a href="#settings" data-toggle="tab"><i class="fa fa-fw fa-key"></i> Senha</a></li>
				<li><a href="#avatar" data-toggle="tab"><i class="fa fa-fw fa-file-photo-o"></i> Avatar</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="profile">
					<form action="{{ route('profile.update.profile',$user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Nome" required="" value="{{$user->name}}">
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="nome">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{$user->email}}">
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>	
                        <div class="form-group text-right">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Salvar Perfil</button>
                        </div>
					</form>						
				</div>
				<div class="tab-pane" id="settings">
					<form action="{{ route('profile.update.password',$user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="nome">Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Senha" minlength="6" required="">
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
						<div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                            <label for="nome">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha" minlength="6" required="">
                            @if($errors->has('password-confirm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                </span>
                            @endif
                        </div>	
                        <div class="form-group text-right">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Salvar Senha</button>
                        </div>
					</form>						
				</div>
				<div class="tab-pane" id="avatar">
					<form action="{{ route('profile.update.avatar',$user->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
							<label>Avatar</label>
                        	<input type="file"  class="form-control-file" name="avatar">
                        	@if($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>	
                        <div class="form-group text-right">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Salvar Avatar</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection