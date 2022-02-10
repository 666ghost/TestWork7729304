<?php

namespace Database\Seeders;

use App\Modules\User\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::query()->insert([
                                  ['id' => 1, 'name' => 'admin'],
                                  ['id' => 2, 'name' => 'moderator'],
                                  ['id' => 3, 'name' => 'streamer']
                              ]);
    }
}
