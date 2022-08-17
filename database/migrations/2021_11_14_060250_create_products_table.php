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
            $table->string('name');
            $table->string('title')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('child_category_id')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->float('previous_price',11,3)->default(0);
            $table->float('current_price',11,3)->default(0);
            $table->float('discount',11,2)->default(0);
            $table->string('thumbnail')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->integer('view')->default(0);
            $table->string('model')->nullable();
            $table->integer('total_order')->default(0);
            $table->integer('stock')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->timestamp('last_ordered_at')->nullable();
            $table->enum('sale_type',['retail','whole'])->default('retail');
            $table->integer('whole_sale_quantity')->nullable();
            $table->string('tag')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('return_policy')->nullable();
            $table->tinyInteger('flash_deal')->default('1')->comment('0=flash deal,1=Not Flash deal');
            $table->string('end_date')->nullable();
            $table->float('price',11,2)->nullable();
            $table->tinyInteger('featured')->default('0')->comment('0=featured,1=Not Featured');
            $table->tinyInteger('best_sale')->default('0')->comment('0=best sale,1=Not Best sale');
            $table->tinyInteger('hot')->default('0')->comment('0=hot,1=Not Hot');
            $table->tinyInteger('top_sale')->default('0')->comment('0=top sale,1=Not top sale');
            $table->tinyInteger('big_save')->default('0')->comment('0=big save,1=Not Big save');
            $table->tinyInteger('new_arrival')->default('0')->comment('0=new arrival,1=Not New arrival');
            $table->tinyInteger('trending')->default('0')->comment('0=trending,1=Not Trending');
            $table->tinyInteger('publish')->default('1')->comment('0=Publish,1=Not Publish');
            $table->tinyInteger('check_attributes')->default('0')->comment('0=yes,1=no');
            $table->timestamps();

            // propagration contrains
            $table->foreign('author_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('child_category_id')->references('id')->on('child_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            
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
