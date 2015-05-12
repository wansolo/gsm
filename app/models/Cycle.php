<?php


class Cycle extends Eloquent {

	protected $table = 'cycles';
	protected $primaryKey = 'cid';
	protected $fillable = ['uid','date_completed', 'created_at', 'updated_at'];
	
	public function cycledetails()
    {
        return $this->hasMany('Cycledetail', 'cid','cid');//changed the relationship from hasOne to hasMany
    }

    public function users()
    {
    	return $this->belongsTo('User','uid','uid');
    }

     public function under()
    {
        return $this->hasMany('Under','unid','unid');
    }

}
