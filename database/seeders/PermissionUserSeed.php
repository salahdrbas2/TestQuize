<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [ 'title' => 'roleCreate',],
            [ 'title' => 'roleEdit',],
            [ 'title' => 'roleView',],
            [ 'title' => 'roleDelete',],


            [ 'title' => 'userCreate',],
            [ 'title' => 'userEdit',],
            [ 'title' => 'userView',],
            [ 'title' => 'userDelete',],

            [ 'title' => 'categoryCreate',],
            [ 'title' => 'categoryEdit',],
            [ 'title' => 'categoryView',],
            [ 'title' => 'categoryDelete',],

            [ 'title' => 'questionCreate',],
            [ 'title' => 'questionEdit',],
            [ 'title' => 'questionView',],
            [ 'title' => 'questionDelete',],


            [ 'title' => 'optionCreate',],
            [ 'title' => 'optionEdit',],
            [ 'title' => 'optionView',],
            [ 'title' => 'optionDelete',],

            

            [ 'title' => 'resultView',],
            [ 'title' => 'resultDelete',],
            [ 'title' => 'resultShow',],

        ];

            Permission::insert($permissions);

    }
}
