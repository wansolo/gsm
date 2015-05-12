<?php


class Accountdetail extends Eloquent {

	protected $table = 'accountdetails';
	protected $primaryKey = 'aid';
	protected $fillable = ['uid','type', 'amount', 'status'];
    
	

    public function users()
    {
    	return $this->belongsTo('User','uid','uid');
    }

}
