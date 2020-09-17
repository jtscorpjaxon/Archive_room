<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','field_id'
    ];
    public function field()
    {
        return $this->belongsTo('App\Models\Field','field_id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
