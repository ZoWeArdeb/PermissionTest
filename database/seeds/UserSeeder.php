<?php

use App\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 50)->create()->each(function ($user) {
            $class = App\IClass::inRandomOrder()->first();
            $user->classes()->save($class)->make();
        });

        $user = new App\User();
        $user->password = Hash::make('roottoor');
        $user->email = 'arne.debou@zowe.be';
        $user->name = 'Arne Debou';
        $user->save();
        $group = Group::where('name', 'admin')->first();
        $user->groups()->save($group);
    }
}
