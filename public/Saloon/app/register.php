<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    protected $fillable = ['email','provider_user_id'];
//     public function user()
//   {
//       return $this->belongsTo(register::class);
//   }
}
