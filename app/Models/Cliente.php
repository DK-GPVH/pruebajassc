<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellidop
 * @property $apellidom
 * @property $fechanac
 * @property $tipo_documento_id
 * @property $nrodocumento
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Propiedade[] $propiedades
 * @property TipoDocumento $tipoDocumento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidop' => 'required',
		'apellidom' => 'required',
		'fechanac' => 'required',
		'tipo_documento_id' => 'required',
		'nrodocumento' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidop','apellidom','fechanac','tipo_documento_id','nrodocumento','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propiedades()
    {
        return $this->hasMany('App\Models\Propiedade', 'cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne('App\Models\TipoDocumento', 'id', 'tipo_documento_id');
    }
    

}
