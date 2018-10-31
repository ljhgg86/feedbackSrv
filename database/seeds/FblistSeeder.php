<?php

use Illuminate\Database\Seeder;

class FblistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Fblist::class, 20)->create();
    }
}
