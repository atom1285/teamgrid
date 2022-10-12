<?php namespace Atom\Teamgrid\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('atom_teamgrid_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            //project details:
            $table->string('name');
            $table->text('description');
            $table->integer('customer_id')->nullable();
            $table->integer('project_manager_id')->nullable();
            //scheduling:
            $table->date('due_date')->nullable();
            //accounting:
            $table->enum('accounting_type', ['disabled', 'service_hourly', 'person_hourly', 'hourly']);
            $table->integer('service_id')->nullable();
            //$table->json('person_ids')->nullable(); // ? either do it this way, or change the column to text and make it $jsonable['this_column]...
            $table->integer('user_id')->nullable();
            $table->integer('accounting_rate')->nullable();
            //budget:
            $table->enum('budget_type', ['disabled', 'hours', 'fees', 'hours_per_month', 'fees_per_month']);
            $table->integer('budget_amount')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_teamgrid_projects');
    }
}
