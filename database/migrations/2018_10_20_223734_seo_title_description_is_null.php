<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeoTitleDescriptionIsNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->string('seo_title')->nullable()->change();
          $table->string('seo_keyword')->nullable()->change();
          $table->string('seo_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->string('seo_title')->nullable(false)->change();
          $table->string('seo_keyword')->nullable(false)->change();
          $table->string('seo_description')->nullable(false)->change();
        });
    }
}
