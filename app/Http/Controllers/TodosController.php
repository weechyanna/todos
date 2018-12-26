<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Services\TodosService;

class TodosController extends Controller{

  private $todoService;

   public function __construct(TodosService $todoService){
     $this->todosService = $todoService;
   }



	/**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    if ($request->wantsJson()){
    return $this->todosService->all();
   }
    return view('todos.index');
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

		return response()->json('Stored');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function complete(Request $request, Todo $todo){

    $data = $request;

    $todo->completed = $data['completed'];
    $todo->save();

    return response()->json('Completed');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function edit(Todo $todo){
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

		return response()->json('Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Todo $todo){
    $todo->delete();

		return response()->json('deleted');
  }
}
