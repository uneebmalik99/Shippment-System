<?php

namespace Database\Seeders;
use App\Models\role;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::create([
            'name'=>'SuperAdmin',
        ]);
        role::create([
            'name'=>'SubAdmin',
        ]);
        role::create([
            'name'=>'Customer',
        ]);
    }
}
