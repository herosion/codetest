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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*$factory->define(App\Questions::class, function (Faker\Generator $faker) {
  
  $tab = ["published", "unpublished", "draft"];
  $rand = array_rand($tab, 1); 
  
  $php = 
  [
  	'Que donne var_dump($a, $b); ?',
  	'Quel est l\'effet de l\'utilisation de la structure return(); dans un fichier inclus (sans être dans une fonction) ?',
  	'Quelle fonction retourne le nombre de secondes écoulées depuis le 1er janvier 1970 ?',
  	'Quelle fonction retire un élément de la fin d\'un tableau ?',
  	'Dans quel tableau de données retrouve-t-on les cookies du visiteur ?'
  ]

  $mysql = 
  [
  	'How do I find out all databases starting with ‘test‘?',
  	'What does SQL stand for?',
  	'Which SQL statement is used to extract data from a database?',
  	'Which SQL statement is used to update data in a database?',
  	'Which SQL statement is used to delete data from a database?'
  ]




  $nom_r = ['benj', 'r2d2', 'Anthony-R', 'Cyp-R', 'Pric-R', 'Xav-R'];
  $r = array_rand($nom_r, 1);

  //$faker->text(rand(5,20))
    
   return [
			
      'category_id' => rand(1,2),
      'user_id' => '',
      'title' => $nom_r[$r],
      'abstract' => 
      'content' => ,
      'status' => $tab[$rand],
	  'date' => $faker->dateTime()

     ];
  
});*/
