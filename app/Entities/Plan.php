<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

	protected $fillable = ['name', 'description', 'duration', 'price'];

    /**
     * Servicios con el plan elegido
     * @return array
     */
    public function service()
    {
        $this->hasMany('AviReport\Entities\Service');
    }
}
