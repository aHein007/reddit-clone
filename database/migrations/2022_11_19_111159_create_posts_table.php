<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("community_id")->constrained();//(foreignId,constrained) က dataBase relasitionship လုပ်တဲ့ နေရာမှာ သုံးပါတယ်။
            $table->foreignId("user_id")->constrained();
            $table->string("title")->unique();
            $table->string("url")->nullable();
            $table->string("slug");
            $table->longText("description")->nullable();
            $table->softDeletes();//delete လုပ် တဲ့ အခါ မှာ time ကို ပြပေးပါတယ်။
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
