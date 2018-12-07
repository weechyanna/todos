@extends('layouts.master')

@section('master')
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-7 mx-auto">
					<h1 class="todos-title">Todos</h1>

					{!! Form::model($todo, ['route' => ['todos.update', $todo->id], 'method' => 'put', 'class' => 'form']) !!}
						{!! Form::text('title', $todo->title, ['class' => 'form-control']); !!}
						{!! Form::submit('Update', ['class' => 'btn btn-primary ml-auto mt-3']); !!}
					{!! Form::close() !!}

					{!! Form::open(['route' => ['todos.delete', $todo->id], 'method' => 'delete', 'class' => 'form']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger mt-3']); !!}
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
