@extends('layouts.master')

@section('master')
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto">
					<h1 class="todos-title">Todos</h1>
					<a href="{{ route('todos.create') }}" class="btn btn-primary mb-3 ml-auto">Create new todos</a>
					<div class="todos-wrapper">
						<ul class="list-group todos-list">
							@foreach ($todos as $todo)
								<li class="list-group-item todos-list-item">
									<a href="{{ route('todos.edit', $todo->id) }}" class="todos-list-item-link">{{ $todo->title }}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
