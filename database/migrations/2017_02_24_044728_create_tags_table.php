<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->unique();
            $table->text('slug');
            $table->timestamps();
        });
        DB::table('tags')->insert([
            ['name' => 'news', 'slug' => '新闻公告'],
            ['name' => 'push', 'slug' => '精品推送'],
            ['name' => 'about', 'slug' => '组织介绍'],
            ['name' => 'activity', 'slug' => '品牌活动'],
            ['name' => 'doc', 'slug' => '审批资料'],
            ['name' => 'viewpoint', 'slug' => '微视角'],
            ['name' => 'freshman', 'slug' => '新生手册'],
        ]);
        Schema::create('post_tag', function (Blueprint $table) {
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->primary(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
    }
}
