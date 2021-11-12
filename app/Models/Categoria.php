<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $id
 * @property $descripcion
 * @property $monto_correspondiente
 * @property $created_at
 * @property $updated_at
 *
 * @property Propiedade[] $propiedades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'monto_correspondiente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','monto_correspondiente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propiedades()
    {
        return $this->hasMany('App\Models\Propiedade', 'categoria_id', 'id');
    }
    

}
