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
        DB::statement('CREATE VIEW amountView AS SELECT members.id, (members.amount-SUM(contributors.amount)) AS balance from members JOIN contributors on contributors.member_id = members.id GROUP BY members.id, members.amount');
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
