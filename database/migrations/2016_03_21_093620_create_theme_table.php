<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThemeTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('theme', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('category');
			$table->string('short_description');
			$table->text('description');
			$table->string('seo_title');
			$table->string('seo_keyword');
			$table->string('metadata');
			$table->string('theme_name');
			$table->string('image_name');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('theme');
	}
}
