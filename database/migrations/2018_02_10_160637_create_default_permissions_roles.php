<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Role;
use App\Permission;

class CreateDefaultPermissionsRoles extends Migration
{
    protected $permissions = [
        ['name' => 'show-project', 'label' => 'Can show project'],
        ['name' => 'create-project', 'label' => 'Can create project'],
        ['name' => 'create-issue', 'label' => 'Can create issue'],
        ['name' => 'create-comment', 'label' => 'Can create comment'],
        ['name' => 'show-space', 'label' => 'Can show space'],
        ['name' => 'assign-permission', 'label' => 'Can assign permission to role'],
        ['name' => 'do:admin:actions', 'label' => "can do all admin actions"]
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::create(['name' => 'administrator', 'label' => 'server-administrator']);

        foreach ($this->permissions as $permission) {
            $permission = Permission::create($permission);
            $role->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
