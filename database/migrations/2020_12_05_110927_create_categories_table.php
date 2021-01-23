<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->timestamps();
            
        });

        $categories = ['Casalinghi', 'Tech', 'Sport', 'Cucina', 'Vintage', 'Immobili', 'Giochi', 'Motori', 'Hobbistica', 'Arredamento',];

        // $categories = [
        //     [
        //         'name' => 'casalinghi',
        //         'icon' => '<i class="fas fa-home"></i>'
        //     ]
        //     ];
            // // nella funzione
            // $c->title-> $category['title'];
            // $c->title-> $category['icon']

        foreach($categories as  $category){

            $c = new Category();
            $c->title = $category;
            $c->save();

        }
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
