<?php

use App\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating groups
        Collection::macro('toGroups', function () {
            return $this->map(function ($value) {
                if(!Group::where('name', $value)->exists())
                {
                    Group::create(['name' => $value]);
                }
            });
        });

        //groups collections
        $groups = collect(['admin', 'student', 'teacher', 'external']);
        $groups->toGroups();
    }
}
