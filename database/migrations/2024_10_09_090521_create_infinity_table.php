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
        Schema::create('infinities', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('excavation')->nullable()->change();
            $table->decimal('leveling_compaction', 8, 2);
            $table->decimal('compaction_test', 8, 2);
            $table->decimal('polyethylene_sheet_1000_gauge', 8, 2);
            $table->decimal('rubble_soling_230_th', 8, 2);
            $table->decimal('msrc_pcc_150mm_thick', 8, 2);
            $table->decimal('modular_panels', 8, 2);
            $table->decimal('overflow_gutter', 8, 2);
            $table->decimal('fiber_lining', 8, 2);
            $table->decimal('paper_glass_tiling_1ft_x_1ft', 8, 2);
            $table->decimal('granite_coping', 8, 2);
            $table->decimal('clamps', 8, 2);
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
        Schema::dropIfExists('infinities');
    }
};