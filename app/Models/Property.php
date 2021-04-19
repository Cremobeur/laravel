<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // On autorise n'importe quelle propriété à être remplie dans l'objet.
    // Attention à ne pas faire $request->all() !
    protected $guarded = [];
}
