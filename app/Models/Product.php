<?php

namespace App\Models;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Commentable;
     /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'id';
}
