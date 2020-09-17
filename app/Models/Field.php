<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function archive()
    {
        return $this->belongsTo('App\Models\ArchiveBoard','archive_board_id');
    }
    public function folders()
    {
        return $this->hasMany('App\Models\Folder');
    }
}
