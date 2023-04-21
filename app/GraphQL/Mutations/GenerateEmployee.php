<?php

namespace App\GraphQL\Mutations;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

final class GenerateEmployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        ini_set('max_execution_time', 1800);

        $default_password = Hash::make('user1234');
        $user = Employee::factory()->count(10000)->create([
            'created_user_id' => $args['user_id'],
            'password' => $default_password,
        ]);

        return 'Employees are generated.';
    }
}
