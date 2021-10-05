<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartient extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'appartient_id';

    public function Produits()
    {
        return $this->hasMany(Produit::class);
    }
    public function AvisClients()
    {
        return $this->hasMany(AvisClient::class);
    }
}
