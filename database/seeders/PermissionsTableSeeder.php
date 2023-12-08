<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'account_create',
            ],
            [
                'id'    => 19,
                'title' => 'account_edit',
            ],
            [
                'id'    => 20,
                'title' => 'account_show',
            ],
            [
                'id'    => 21,
                'title' => 'account_delete',
            ],
            [
                'id'    => 22,
                'title' => 'account_access',
            ],
            [
                'id'    => 23,
                'title' => 'option_create',
            ],
            [
                'id'    => 24,
                'title' => 'option_edit',
            ],
            [
                'id'    => 25,
                'title' => 'option_show',
            ],
            [
                'id'    => 26,
                'title' => 'option_delete',
            ],
            [
                'id'    => 27,
                'title' => 'option_access',
            ],
            [
                'id'    => 28,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 29,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 30,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 31,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 32,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 33,
                'title' => 'country_create',
            ],
            [
                'id'    => 34,
                'title' => 'country_edit',
            ],
            [
                'id'    => 35,
                'title' => 'country_show',
            ],
            [
                'id'    => 36,
                'title' => 'country_delete',
            ],
            [
                'id'    => 37,
                'title' => 'country_access',
            ],
            [
                'id'    => 38,
                'title' => 'iop_create',
            ],
            [
                'id'    => 39,
                'title' => 'iop_edit',
            ],
            [
                'id'    => 40,
                'title' => 'iop_show',
            ],
            [
                'id'    => 41,
                'title' => 'iop_delete',
            ],
            [
                'id'    => 42,
                'title' => 'iop_access',
            ],
            [
                'id'    => 43,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 44,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 45,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 46,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 47,
                'title' => 'subscription_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
