<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'account' => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'data'              => 'Data',
            'data_helper'       => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'option' => [
        'title'          => 'Options',
        'title_singular' => 'Option',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'account'           => 'Account',
            'account_helper'    => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'data'              => 'Data',
            'data_helper'       => ' ',
            'response'          => 'Response',
            'response_helper'   => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'country' => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'iop' => [
        'title'          => 'Iops',
        'title_singular' => 'Iop',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'country'           => 'Country',
            'country_helper'    => ' ',
            'isp'               => 'Isp',
            'isp_helper'        => ' ',
            'port'              => 'Port',
            'port_helper'       => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'Subscription',
        'title_singular' => 'Subscription',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'plan_type'         => 'Plan Type',
            'plan_type_helper'  => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'start_date'        => 'Start Date',
            'start_date_helper' => ' ',
            'end_date'          => 'End Date',
            'end_date_helper'   => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
