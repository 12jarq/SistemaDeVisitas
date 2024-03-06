<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        $permissionArray[$i]['name']       = 'dashboard';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'profile';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'designations';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'designations_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'designations_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'designations_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'designations_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'departments';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'departments_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'departments_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'departments_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'departments_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'employees';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'employees_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'employees_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'employees_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'employees_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'visitors';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'visitors_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'visitors_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'visitors_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'visitors_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'pre-registers';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'pre-registers_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'pre-registers_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'pre-registers_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'pre-registers_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'adminusers';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'adminusers_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'adminusers_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'adminusers_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'adminusers_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'setting';
        $permissionArray[$i]['guard_name'] = 'web';

        Permission::insert($permissionArray);
    }
}
