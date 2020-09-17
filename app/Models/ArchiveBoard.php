<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveBoard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function fields()
    {
        return $this->hasMany('App\Models\Field');
    }
    public function folders()
    {
        return $this->hasManyThrough(
            'App\Models\Folder',
            'App\Models\Field',
            'archive_board_id',
            'field_id',
            'id',
            'id'
            );
    }


}
