<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('url');
            $table->string('name')->default('Untitled');
            $table->text('description')->nullable();
            //$table->enum('shot_type', ['daily', 'interval'])->default('interval');
            $table->enum('shot_interval', ['minutes', 'hours', 'days'])->default('minutes');
            $table->unsignedInteger('shot_interval_value')->default(30);

            $table->unsignedInteger('shot_interval_seconds')->default(300);
            $table->dateTime('last_shot_at')->nullable();
            $table->unsignedInteger('shot_counter')->default(0);
            $table->unsignedInteger('video_counter')->default(0);

            $table->unsignedSmallInteger('offset_top')->default(0);

            $table->string('video_dimensions')->default('1280x720');;
            // $table->unsignedSmallInteger('size_x')->default( 1280 );
            // $table->unsignedSmallInteger('size_y')->default( 720 );

            $table->unsignedInteger('video_framerate')->default(18);
            $table->string('time_zone')->default('UTC');
            $table->char('status', 1)->default('Q'); // A- active, P - Paused, D - Deleted, B - Banned, Q - queued
            $table->unsignedTinyInteger('deleted')->default('0');

            $table->softDeletes();
            
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
        Schema::dropIfExists('projects');
    }
}
