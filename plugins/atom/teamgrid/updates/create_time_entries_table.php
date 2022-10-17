<?php namespace Atom\Teamgrid\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('atom_teamgrid_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('user_id')->index();
            $table->integer('task_id')->nullable();
            
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            
            $table->boolean('finished')->default(false);
            $table->integer('total_time')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_teamgrid_time_entries');
    }
}
