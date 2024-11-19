<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Skimmer extends Model
{

    use HasFactory;

    protected $fillable = [
        'excavation',
        'leveling_compaction',
        'compaction_test',
        'polyethylene_sheet_1000_gauge',
        'rubble_soling_230_th',
        'msrc_pcc_150mm_thick',
        'modular_panels',
        'overflow_gutter',
        'fiber_lining',
        'paper_glass_tiling_1ft_x_1ft',
        'granite_coping',
        'clamps',
    ];
}