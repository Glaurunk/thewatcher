<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class Book extends Model
{
  protected $guarded = [];

     public function author()
               {
                   return $this->belongsToMany(Author::class);
               }

     public function discountPrice()
               {
                  return money_format('€%i',$this->price - ($this->price * ($this->discount / 100)));
               }

     public function numericPrice()
               {
                  return number_format($this->price - ($this->price * ($this->discount / 100)), 2);
               }

}
