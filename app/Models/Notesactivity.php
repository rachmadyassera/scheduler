<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notesactivity extends Model
{
    use HasFactory;
    public $table = 'notes_activitys';

    protected $fillable = [
        'id',
        'activity_id',
        'user_id',
        'notes',
        'status'
    ];

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }
}
