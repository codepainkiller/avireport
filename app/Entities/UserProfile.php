<?php namespace AviReport\Entities;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $fillable = ['job', 'address', 'home_number', 'mobile_number', 'website', 'user_id'];

}
