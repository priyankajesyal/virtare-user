<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeLog extends Model
{
	protected $table = 'change_logs';
    use HasFactory;
	protected $guarded = [];
}
