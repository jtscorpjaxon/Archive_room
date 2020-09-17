<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * @package App\Models
 */

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','text','folder_id'
    ];
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder','folder_id');
    }

}
