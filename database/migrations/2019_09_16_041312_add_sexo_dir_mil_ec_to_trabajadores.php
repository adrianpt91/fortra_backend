<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexoDirMilEcToTrabajadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadores', function (Blueprint $table) {
            $table->string('adress')->after('provincia');
            $table->string('sexo')->after('adress');
            $table->string('militancia')->nullable()->after('sexo');
            $table->string('ec')->nullable()->after('militancia');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
