<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');

            $table->string('company_jp');
            $table->string('company_cn')->nullable();

            $table->string('address_jp');
            $table->string('address_en')->nullable();
            $table->string('post_code');

            $table->string('homepage')->nullable();
            $table->string('company_thambnail');

            $table->string('business_jp');
            $table->string('business_cn')->nullable();
            $table->string('product_jp');
            $table->string('product_cn')->nullable();

            $table->string('tags_jp');
            $table->string('tags_cn')->nullable();

            $table->string('short_descp_jp');
            $table->string('short_descp_cn')->nullable();
            $table->text('long_descp_jp');
            $table->text('long_descp_cn')->nullable();

            $table->string('manager');
            $table->string('tel');
            $table->string('phone');
            $table->string('email')->unique();

            $table->integer('status')->default(0);
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
        Schema::dropIfExists('companies');
    }
};
