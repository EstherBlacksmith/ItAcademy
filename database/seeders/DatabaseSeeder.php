<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $player =  Role::create(['name' => 'player']);

        User::factory(10)->create();
        $users = User::all();
        foreach($users as $user){
            $user->assignRole($player);
        }
    }
}
