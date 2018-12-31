@extends('layouts.master')

@section('master')
  <todos-component></todos-component>
  <a class="btn btn-danger" href="{{route("logout")}}" role="button" value="Logout">Logout</a>
@endsection
