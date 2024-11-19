<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Overflow extends Model
{

    use HasFactory;

    protected $fillable = [
        'excavation1',
        'leveling_compaction1',
        'compaction_test1',
        'polyethylene_sheet_1000_gauge1',
        'rubble_soling_230_th1',
        'msrc_pcc_150mm_thick1',
        'modular_panels1',
        'overflow_gutter1',
        'fiber_lining1',
        'paper_glass_tiling_1ft_x_1ft1',
        'granite_coping1',
        'clamps1',
    ];
}