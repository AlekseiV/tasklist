<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Use Illuminate\Http\Request;
Use App\Task;

Route::get('/', function () {
    $tasks = Task::orderBy("created_at", "ast")->get();

    return view("tasks.index", [
      "tasks" => $tasks,
    ]);
});

Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    "name" => "required|max:255",
  ]);
  if ($validator->fails()) {
    return redirect("/")
      ->withInput()
      ->withErrors($validator);
  }

  Task::create([
    "name" => $request->name,
  ]);

  return redirect("/");

});

Route::delete('/task/{task}', function (Task $task) {
  $task->delete();
  return redirect("/");
});
