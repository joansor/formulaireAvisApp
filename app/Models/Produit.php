<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'produit_id';
    // /**
    //  * Get the AvisClient for the blog post.
    //  */
    // public function avisClient()
    // {
    //     return $this->hasMany(AvisClient::class);
    // }
}
