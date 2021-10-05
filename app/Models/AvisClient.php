<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AvisClient extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'avisClient_id';

    // /**
    //  * Get the AvisClient for the blog post.
    //  */
    // public function produit()
    // {
    //     return $this->hasOne(AvisClient::class);
    // }
}
