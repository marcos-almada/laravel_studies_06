<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class client extends Model
{
    //
    public function phone(): HasOne
    {
        // relação um para um
        return $this->hasOne(Phone::class);

        // se a chave estrangeira na tabela phones for diferente do padrão
        // return $this->hasOne(Phone::class, 'client_id', 'id');

    }

    public function phones(): HasMany
    {
        // relação um para muitos
        return $this->hasMany(Phone::class);
    }
}
