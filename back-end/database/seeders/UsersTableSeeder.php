<?php

namespace Database\Seeders;

use App\Modules\User\Entities\RoleEntity;
use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /** @var RoleEntity */
    private RoleEntity $roleEntity;

    public function __construct(RoleEntity $roleEntity)
    {
        $this->roleEntity = $roleEntity;
    }

    /** @var \string[][] */
    private array $users = [
        'admin@app.com' => ['admin'],
        'moderator1@app.com' => ['moderator', 'streamer'],
        'moderator2@app.com' => ['moderator'],
        'streamer@app.com' => ['streamer'],
        'user@app.com' => []
    ];

    public function run()
    {
        foreach ($this->users as $email => $roles) {
            User::factory()
                ->hasAttached($this->roleEntity->in('name', $roles))
                ->create([
                             'email' => $email
                         ]);
        }
    }
}
