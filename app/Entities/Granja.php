<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Granja extends Model {

    protected $fillable = ['name', 'address', 'number_phone', 'owner_name', 'user_id'];

    /**
     * Galpones de la granja
     * @return array
     */
    public function galpons()
    {
        $this->hasMany('AviReport\Entities\Galpon');
    }

    /**
     * Usuario al que pertenece la granja
     * @return object
     */
    public function user()
    {
        $this->belongsTo('AviReport\Entities\User');
    }

}
