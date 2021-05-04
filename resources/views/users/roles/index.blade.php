@extends('layouts.AdminLTE.index')

@section('icon_page', 'unlock-alt')

@section('title', 'Permissões')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('role.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Adicionar
		</a>								
	</li>
	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Usuários
		</a>								
	</li>

@endsection

@section('content')    
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>			 
									<th>Nome</th>			 
									<th>Descrição</th>
									<th>Criação</th>			 
									<th class="text-center">Ações</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($roles as $role)
									@if($role->id != 1)
										<tr>
											<td>{{ $role->name }}</td>             
											<td>{{ $role->label }}</td>               
											<td>{{ $role->created_at->format('d/m/Y H:i') }}</td>             
											<td class="text-center"> 
												 <a class="btn btn-default  btn-xs" href="{{ route('role.show', $role->id) }}" title=Visualizar {{ $role->name }}"><i class="fa fa-eye">   </i></a>						 
												 <a class="btn btn-warning  btn-xs" href="{{ route('role.edit', $role->id) }}" title="Editar {{ $role->name }}"><i class="fa fa-pencil"></i></a>
												 <a class="btn btn-danger  btn-xs" href="#" title="Excluir {{ $role->name}}" data-toggle="modal" data-target="#modal-delete-{{ $role->id }}"><i class="fa fa-trash"></i></a>
											</td> 
										</tr>
										<div class="modal fade" id="modal-delete-{{ $role->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Atenção!</h4>
													</div>
													<div class="modal-body">
														<p>Deseja realmente exlcuir ({{ $role->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('role.destroy', $role->id) }}" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button></a>
													</div>
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</tbody>
							<tfoot>
								<tr>		 
									<th>Nome</th>			 
									<th>Descrição</th>			 		 
									<th>Criação</th>			 
									<th class="text-center">Ações</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>								
				<div class="col-md-12 text-center">
					{{ $roles->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')