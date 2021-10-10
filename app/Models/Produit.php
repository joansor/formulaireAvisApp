<?php

namespace App\Models;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produit extends Model
{
    use HasFactory;
    use Commentable;
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'produit_id';
    /**
     * Get the appartient that owns the phone.
     */
    public function appartient()
    {
        return $this->belongsTo(Appartient::class);
    }
    public function allInfos()
    {
        
    }
}
