<?php

namespace Tests\Feature;

use App\Models\ToDoItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToDoDeleteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_todo_item()
    {
        $todo = new ToDoItem();
        $todo->title = 'test';
        $todo->save();

        $response = $this->delete('/api/todo-items/' . $todo->id);

        $response->assertStatus(204);
        $this->assertDeleted('todo_items', ['id' => $todo->id]);
    }
}
