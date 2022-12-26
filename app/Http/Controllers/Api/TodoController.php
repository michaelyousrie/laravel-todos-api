<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Helpers\UnifiedResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = $request->user()->todos()->get();

        return UnifiedResponse::success([
            'todos' => TodoResource::collection($todos)
        ]);
    }

    public function store(CreateTodoRequest $request)
    {
        $todo = new Todo([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        $request->user()->todos()->save($todo);

        return UnifiedResponse::success([
            'todo' => new TodoResource($todo)
        ]);
    }

    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);

        return UnifiedResponse::success([
            'todo' => new TodoResource($todo)
        ]);
    }

    public function update(Todo $todo, UpdateTodoRequest $request)
    {
        $this->authorize('update', $todo);

        $todo->update([
            'title' => $request->get('title', $todo->title),
            'body' => $request->get('body', $todo->body)
        ]);

        return UnifiedResponse::success([
            'todo' => new TodoResource($todo)
        ]);
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return UnifiedResponse::deleted();
    }
}
