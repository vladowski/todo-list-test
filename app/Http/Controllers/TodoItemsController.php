<?php

namespace App\Http\Controllers;

use App\Models\ToDoItem;
use Illuminate\Http\Request;

class TodoItemsController extends Controller
{
    /**
     * Display a listing of the resources
     */
    public function index()
    {
        return response()->json(ToDoItem::incomplete()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $item = TodoItem::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'message' => 'To-do item created successfully',
            'item' => $item,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = ToDoItem::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'max:255',
            'completed' => 'required|boolean',
        ]);

        $item->update($validatedData);

        return response()->json([
            'message' => 'To-do item updated successfully',
            'item' => $item,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = ToDoItem::findOrFail($id);
        $item->delete();

        return response()->json([
            'message' => 'To-do item updated successfully',
        ], 204);
    }
}
