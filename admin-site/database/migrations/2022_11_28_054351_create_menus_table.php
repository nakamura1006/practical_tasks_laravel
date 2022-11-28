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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable(false);
            $table->text('description')->nullable(true);
            $table->text('remarks')->nullable(true);
            $table->unsignedBigInteger('turn')->nullable(true);
            $table->unsignedBigInteger('create_user')->nullable(false);
            $table->unsignedBigInteger('update_user')->nullable(true);
            $table->timestamp('created_at')->useCurrent()->nullable(true);
            $table->timestamp('updated_at')->nullable(true);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
