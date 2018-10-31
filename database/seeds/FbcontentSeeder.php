<?php

use Illuminate\Database\Seeder;

class FbcontentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Fbcontent::class, 100)->create();
    }
}
