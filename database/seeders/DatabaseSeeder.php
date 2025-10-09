<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users =  User::factory(10)->create();
        
        foreach($users as $user){
            TeamMember::create([
                'team_id' => 1,
                'user_id' =>  $user->id,
            ]);
        }

       
    }
}
