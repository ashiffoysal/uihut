<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('slug')->nullable();
            $table->foreignId('cate_id')->nullable();
            $table->foreignId('subcate_id')->nullable();
            $table->foreignId('resubcate_id')->nullable();
            $table->text('tag')->nullable();
            $table->text('description')->nullable();
            $table->integer('product_type')->nullable();
            $table->text('thumbnail_img')->nullable();
            $table->text('gallery_img')->nullable();
            $table->string('creator_by')->nullable();
            $table->string('publish_by')->nullable();
            $table->integer('draft')->default(0);
            $table->integer('status')->default(1);
            $table->integer('is_deleted')->default(0);
            $table->integer('download')->default(0);
            $table->integer('views')->default(0);
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('products');
    }
}
