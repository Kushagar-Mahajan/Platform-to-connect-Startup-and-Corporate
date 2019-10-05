<?php

use Illuminate\Database\Seeder;

class default_user_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert users
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Crazy Developers',
                'password' => Hash::make('password'),
                'email' => 'admin@admin.com'
            ],
            [
                'id' => '2',
                'name' => 'Corporate',
                'password' => Hash::make('password'),
                'email' => 'corporate@corporate.com'
            ],
            [
                'id' => '3',
                'name' => 'Startup',
                'password' => Hash::make('password'),
                'email' => 'startup@startup.com'
            ]
        ]);

        // insert roles
        DB::table('roles')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'id' => '2',
                'name' => 'corporate',
                'guard_name' => 'web'
            ],
            [
                'id' => '3',
                'name' => 'startup',
                'guard_name' => 'web'
            ]
        ]);

        // insert model_has_roles
        DB::table('model_has_roles')->insert([
        [
            'role_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '1'
        ],
        [
            'role_id' => '2',
            'model_type' => 'App\User',
            'model_id' => '2'
        ],
        [
            'role_id' => '3',
            'model_type' => 'App\User',
            'model_id' => '3'
        ]
    ]);
    }
}
