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
        // DB::statement('DROP VIEW IF EXISTS amountView');
        DB::statement('CREATE VIEW amountView AS SELECT members.id, (SUM(members.amount)-SUM(contributors.amount)) AS balance from members JOIN contributors on members.id = contributors.member_id GROUP BY members.id');
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
