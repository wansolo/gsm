<?php

class Under extends Eloquent {

	protected $table = 'unders';
	protected $primaryKey = 'unid';
	protected $fillable = ['uid','cid','created_at', 'updated_at'];
	public function users()
	{
		return $this->belongsTo('User','uid','uid');
	}
	public function cycles()
	{
		return $this->belongsTo('Cycle','cid','cid');
	}

}
