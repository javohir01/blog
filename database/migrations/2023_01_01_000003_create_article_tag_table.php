<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');
            $table->integer('tag_id');
        });
    }
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}