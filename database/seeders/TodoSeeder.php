<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'sahashi@gmail.com')->firstOrFail();

        $todo = new Todo();
        $todo->title = "Test Todo";
        $todo->description = "Test Todo description";
        $todo->user_id = $user->id;
        $todo->save();
    }
}
