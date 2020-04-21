<?php

use App\Group;
use App\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating permissions
        Collection::macro('toPermission', function ($guard) {
            return $this->map(function ($value) use ($guard) {
                if(!Permission::where('name', $value)->exists())
                {
                    $permission = Permission::create(['name' => $value]);
                    if(Group::where('name', 'admin')->exists())
                    {
                        $group = Group::where('name', 'admin')->first();
                        $group->permissions()->save($permission);
                    }
                }
            });
        });

        $webpermissioncollection = collect(['viewAny.student','view.student','change.password', 'use.api']);
        $webpermissioncollection->toPermission('web');
    }
}
