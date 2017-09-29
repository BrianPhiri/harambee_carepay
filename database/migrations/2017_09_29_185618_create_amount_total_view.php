<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountTotalView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW amountView AS SELECT patients.id, patients.amount As initialAmount, SUM(contributors.amount) AS totalAmounts from patients JOIN contributors on patients.id = contributors.patient_id GROUP BY patients.id GROUP BY patients.amount');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS amountView');
    }
}
