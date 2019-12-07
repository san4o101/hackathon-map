<?php


class UserSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        factory(\App\Entity\User::class)->create([
            'login' => 'admin',
            'role' => \App\Entity\User::ADMIN,
        ]);
    }
}
