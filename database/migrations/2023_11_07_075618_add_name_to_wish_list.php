<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToWishList extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->string('wish_list_name')->after('id');
        });
    }
    
    /**
    * Reverse the migrations.
    */
   public function down()
   {
       Schema::table('wish_lists', function (Blueprint $table) {
           $table->dropColumn('wish_list_name');
       });
   }
}