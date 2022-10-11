<?php namespace Atom\Teamgrid\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('atom_teamgrid_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            //task details:
            $table->string('name');

            //relations:
            $table->integer('project_id')->nullable();
            $table->integer('user_id')->nullable();

            //dates:
            $table->date('planned_start')->nullable();
            $table->date('planned_end')->nullable();
            $table->date('due_date')->nullable();

            //time:
            $table->time('planned_time')->nullable();
            $table->time('tracked_time')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_teamgrid_tasks');
    }
}
