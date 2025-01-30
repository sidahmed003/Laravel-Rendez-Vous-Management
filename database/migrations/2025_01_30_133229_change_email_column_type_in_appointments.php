<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEmailColumnTypeInAppointments extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('email')->change();  // Modifie l'attribut email en string si ce n'est pas déjà fait
        });
    }

    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('email', 255)->change(); // Si tu veux revenir à une taille spécifique de la chaîne
        });
    }
}
