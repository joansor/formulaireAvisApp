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
