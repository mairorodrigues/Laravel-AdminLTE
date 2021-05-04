@extends('layouts.AdminLTE.index')

@section('icon_page', 'user')

@section('title', 'Usuários')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('user.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Adicionar
		</a>								
	</li>
	<li role="presentation">
		<a href="{{ route('role') }}" class="link_menu_page">
			<i class="fa fa-unlock-alt"></i> Permissões
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
									<th>E-mail</th>
									<th class="text-center">Status</th>
									<th>Criação</th>			 
									<th class="text-center">Ações</th>			 
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									@if ($user->id != 1)
										<tr>
											<td>
												@if($user->isOnline())
						                            <a herf="#" title="OnLine"><span class="text-green"><i class="fa fa-fw fa-circle"></i></span></a> 
												@else
													<a herf="#" title="OffLine"><span class="text-red"><i class="fa fa-fw fa-circle"></i></span></a> 
						                        @endif
												{{ $user->name }}
											</td>             
											<td>{{ $user->email }}</td>             
											<td class="text-center">
												@if($user->active == true)
													<span class="label label-success">Ativo</span>
												@else
													<span class="label label-danger">Inativo</span>
												@endif
											</td>             
											<td>{{ $user->created_at->format('d/m/Y H:i') }}</td>             
											<td class="text-center"> 
												 <a class="btn btn-default  btn-xs" href="{{ route('user.show', $user->id) }}" title="Visualizar {{ $user->name }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-primary  btn-xs" href="{{ route('user.edit.password', $user->id) }}" title="Mudar Senha {{ $user->name }}"><i class="fa fa-key"></i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('user.edit', $user->id) }}" title="Editar {{ $user->name }}"><i class="fa fa-pencil"></i></a> 
												 <a class="btn btn-danger  btn-xs" href="#" title="Excluir {{ $user->name}}" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}"><i class="fa fa-trash"></i></a> 
											</td> 
										</tr>
										<div class="modal fade" id="modal-delete-{{ $user->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Atenção!</h4>
													</div>
													<div class="modal-body">
														<p>Deseja realmente exlcuir ({{ $user->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
														<a href="{{ route('user.destroy', $user->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button></a>
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
									<th>E-mail</th>			 
									<th class="text-center">Status</th>			 
									<th>Criação</th>			 
									<th class="text-center">Ações</th>			 
								</tr>
							</tfoot>
						</table>
					</div>
				</div>				
				<div class="col-md-12 text-center">
					{{ $users->links() }}
				</div>
			</div>
		</div>
	</div>    

@endsection

@include('layouts.AdminLTE._includes._data_tables')