<?php

namespace Database\Seeders;

use App\Models\Associate;
use App\Models\Credential;
use App\Models\Repertory;
use App\Models\Tag;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        Repertory::factory(8)->create();
        Tag::factory(5)->create();
        Credential::factory(10)->create();
        Associate::factory(15)->create();


        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

    }
}
