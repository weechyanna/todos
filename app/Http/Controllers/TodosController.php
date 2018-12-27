<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Services\TodosService;

class TodosController extends Controller{

  private $todoService;

   public function __construct(TodosService $todoService){
     $this->todoService = $todoService;
   }

   public function complete(Request $request, Todo $todo){
     return $this->todoService->complete($request,$todo);

   }

   public function store(Request $request){
    return $this->todoService->store($request);
   }

   public function update(Request $request, Todo $todo){
     return $this->todoService->update($request,$todo);
   }

   public function destroy(Todo $todo){
     return $this->todoService->destroy($todo);
   }


  public function index(Request $request){
    if ($request->wantsJson()){
    return $this->todoService->all();
   }
    return view('todos.index');
  }

  public function create(){
    return view('todos.create');
  }

  public function edit(Todo $todo){
  }



}
