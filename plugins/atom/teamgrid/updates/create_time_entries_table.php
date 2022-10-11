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

            $table->date('start_time');
            $table->date('end_time');

            $table->integer('user_id');
            $table->integer('task_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_teamgrid_time_entries');
    }
}
