<?php


class Notification extends Eloquent {

	protected $table = 'notifications';
	protected $primaryKey = 'nid';
	protected $fillable = ['uid','detail','status'];
	
	

    public function users()
    {
    	return $this->belongsTo('User','uid','uid');
    }

}
