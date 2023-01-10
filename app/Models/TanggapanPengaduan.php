<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TanggapanPengaduan extends Model
{
    use HasFactory;
    use Userstamps;
    protected $guarded = ['id'];
    
}