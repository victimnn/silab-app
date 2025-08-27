<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    protected $table = 'places';

    public function schedulings() : HasMany {
        return $this->hasMany(Place::class);
    }
}
