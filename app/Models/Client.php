<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class client extends Model
{
    // one to one
    public function phone(): HasOne
    {
        // relação um para um
        return $this->hasOne(Phone::class);

        // se a chave estrangeira na tabela phones for diferente do padrão
        // return $this->hasOne(Phone::class, 'client_id', 'id');

    }

    // one to many
    public function phones(): HasMany
    {
        // relação um para muitos
        return $this->hasMany(Phone::class);
    }

    // many to many
    public function products(): BelongsToMany
    {
        // relação muitos para muitos
        return $this->belongsToMany(Product::class, 'orders', 'client_id', 'product_id');
    }

}
