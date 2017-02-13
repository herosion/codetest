<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tab = ["published", "unpublished", "draft"];
  		$rand = array_rand($tab, 1); 

  		$carbon = new Carbon();

        DB::table('questions')->insert([
                [
                	'category_id' => 1,
                	'user_id' => 2,
                	'title' => 'PHP Dump',
                 	'abstract'  => 'Que donne',
                 	'content' => 'Que donne var_dump($a, $b); ?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 1,
                	'user_id' => 2,
                	'title' => 'PHP Return()',
                 	'abstract'  => 'Quel est l\'effet de',
                 	'content' => 'Quel est l\'effet de l\'utilisation de la structure return(); dans un fichier inclus (sans être dans une fonction) ?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 1,
                	'user_id' => 1,
                	'title' => 'PHP 1970',
                 	'abstract'  => 'Quelle fonction retourne le nombre',
                 	'content' => 'Quelle fonction retourne le nombre de secondes écoulées depuis le 1er janvier 1970 ?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 1,
                	'user_id' => 1,
                	'title' => 'PHP retirer',
                 	'abstract'  => 'Quelle fonction retire',
                 	'content' => 'Quelle fonction retire un élément de la fin d\'un tableau ?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 1,
                	'user_id' => 2,
                	'title' => 'PHP Cookies',
                 	'abstract'  => 'Dans quel tableau',
                 	'content' => 'Dans quel tableau de données retrouve-t-on les cookies du visiteur ?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],

                [
                	'category_id' => 2,
                	'user_id' => 2,
                	'title' => 'MySQL test',
                 	'abstract'  => 'how fo i find ',
                 	'content' => 'How do I find out all databases starting with ‘test‘?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 2,
                	'user_id' => 2,
                	'title' => 'MySQL sql',
                 	'abstract'  => 'What does SQL stand for?',
                 	'content' => 'What does SQL stand for?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 2,
                	'user_id' => 1,
                	'title' => 'MySQL statement',
                 	'abstract'  => 'Wich SQL statement',
                 	'content' => 'Which SQL statement is used to extract data from a database?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 2,
                	'user_id' => 1,
                	'title' => 'MySQL statement2',
                 	'abstract'  => 'Which SQL statement',
                 	'content' => 'Which SQL statement is used to update data in a database?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ],
                [
                	'category_id' => 2,
                	'user_id' => 1,
                	'title' => 'MySQL statement3',
                 	'abstract'  => 'Which SQL statement',
                 	'content' => 'Which SQL statement is used to delete data from a database?',
                 	'date' => $carbon,
                 	'status' => $tab[$rand]
                ]

        ]);
    }
}
