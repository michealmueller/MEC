<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //

    protected $fillable = [
      'user_id', 'event_id', 'status', 'created_at', 'updated_at',
    ];

    protected $table = 'attendance';

    public function events(){
        return $this->hasone(Event::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}
