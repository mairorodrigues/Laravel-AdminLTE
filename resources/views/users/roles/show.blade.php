@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View Permission')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('role') }}" class="link_menu_page">
			<i class="fa fa-unlock-alt"></i> Permissions
		</a>								
	</li>

@endsection

@section('content')    
    @if($role->id != 1)    
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
                        <h4><b>Name:</b> {{ $role->name }}</h4>
    					<h4><b>Description:</b> {{ $role->label }}</h4>
                        <h4><b>Permissions:</b></h4>
                        @foreach($permission_groups as $permission_group)               
                            <div class="panel box box-default">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#{{ $permission_group->id }}" aria-expanded="false" class="collapsed">
                                        {{ $permission_group->name }}
                                    </a>
                                    </h4>
                                </div>
                                <div id="{{ $permission_group->id }}" class="panel-collapse collapse">
                                    <div class="box-body">                              
                                        @foreach($permission_group->permissions as $permission)
                                            <div class="col-lg-3">
                                                <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="icheck minimal"
                                                    @if(in_array($permission->id, $permissions_ids))
                                                        checked
                                                    @endif
                                                    disabled> {{ $permission->label }}</label>
                                            </div>
                                        @endforeach                                     
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$role->created_at->format('d/m/Y H:i') }}</p>
                        <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$role->updated_at->format('d/m/Y H:i') }}</p>
                        <div class="pull-right">               
                            <a href="{{ route('role.edit', $role->id) }}" title="Editar {{ $role->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    @endif    

@endsection

@section('layout_js')    

    <script> 
        $(function(){            
            $('.icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });
        }); 

    </script>

@endsection