<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // id PK auto_increment  (PK: Primary Key)

            $table->string('name'); // ici on définit un champ title VARCHAR(100)
            
            $table->string('slug'); //nom dans l'url
                                                              
            $table->timestamps(); // deux champs qui sont ajoutés nécessaire pour le modèle de Laravel (created_at et updated_at) | correspond à la date de création du fichier
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
