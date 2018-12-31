@extends('layouts.master')

@section('master')

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      {{ $errors->first() }}
    </div>
  @endif

  {!! Form::open(['route' => 'signup.store']) !!}
    <div class="form-group">
      <label for="exampleInputName1">Name</label>
      <input type="name" name="name" class="form-control" id="exampleInputName1"  placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
  {!! Form::close() !!}

@endsection
