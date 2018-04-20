<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
  protected $fillable = [
      'image_src', 'user_id',
  ];
  
  public function user(){
    return $this->belongsTo(User::class);
  }
}
