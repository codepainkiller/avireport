<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $fillable = ['description', 'user_id', 'plan_id'];

    /**
     * Pago del servicio
     * @return object
     */
    public function payment()
    {
        $this->hasOne('AviReport\Entities\Service');
    }

    /**
     * Plan del servicio
     * @return object
     */
    public function plan()
    {
        return $this->belongsTo('Avireport\Entities\Plan');
    }

    /**
     * Usuario que contrato el plan
     * @return object
     */
    public function user()
    {
        $this->belongsTo('AviReport\Entities\User');
    }

}
