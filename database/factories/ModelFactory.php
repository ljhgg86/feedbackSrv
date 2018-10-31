<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'role_id' => $faker->numberBetween($min = 2, $max = 3),
        'nickname' => $faker->name,
        'avatar' => $faker->imageUrl($width = 200, $height = 200),
    ];
});

$factory->define(App\Models\Fbcontent::class, function (Faker\Generator $faker) {
    
    return [
    	// 'user_id' => function(){
    	// 	return factory(App\Models\User::class)->create()->id;
    	// },
    	// 'fblist_id' => function(){
    	// 	return factory(App\Models\Fblist::class)->create()->id;
    	// },
        'user_id'=>$faker->numberBetween($min = 1, $max = 20),
        'fblist_id'=>$faker->numberBetween($min = 1,$max = 20),
        'content' => $faker->text($maxNbChars = 100),
    ];
});

$factory->define(App\Models\Fblist::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'title' => $faker->text($maxNbChars = 20),
    ];
});
