<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	protected $fillable = ['date', 'code', 'service_id'];

}
