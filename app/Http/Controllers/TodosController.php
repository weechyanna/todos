<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller{



	/**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    $todos = Todo::all();

		return view('todos.index', ['todos' => $todos]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    return view('todos.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
		$data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

		Todo::create($data);

		return redirect()->route('todos.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function show(Todo $todo)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function edit(Todo $todo){
    return view('todos.edit', ['todo' => $todo]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Todo $todo){
		$data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

		$todo->title = $data['title'];
		$todo->save();

		return redirect()->route('todos.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Todo $todo){
    $todo->delete();
		
		return redirect()->route('todos.index');
  }
}
