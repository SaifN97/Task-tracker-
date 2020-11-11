<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }


    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        $userId = auth()->id();
        $request['user_id'] = $userId;
        $todo = Todo::create($request->all());

        if ($request->steps) {
            foreach ($request->steps as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        return redirect(route('todo.index'))->with('message', 'Todo created successfully');
    }


    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);


        if ($request->stepsName) {
            foreach ($request->stepsName as $key => $value) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }

        return redirect(route('todo.index'));
    }


    public function complete(Todo $todo, TodoCreateRequest $request)
    {
        $todo->update(['completed' => true]);
        return redirect()->back();
    }


    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);

        return redirect()->back();
    }



    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back();
    }
}
