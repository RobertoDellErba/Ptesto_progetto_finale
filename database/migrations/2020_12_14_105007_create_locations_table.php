<?php

use App\Models\Location;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->timestamps();
        });

        $locations = ['Italia','Abruzzo', 'Basilicata','Calabria','Campania','Emilia-Romagna','Friuli-Venezia Giulia','Lazio','Liguria','Lombardia','Marche','Molisnt','Piemonte','Puglia','Sardegna','Sicilia','Toscana','Trentino-Alto Adige','Umbria','Valle d\'Aosta','Veneto'];

        foreach($locations as $location){

            $l = new Location();
            $l->location = $location;
            $l->save();

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
