<?php

class Cycledetail extends Eloquent {

	protected $table = 'cycledetails';
	protected $primaryKey = 'cdid';
	protected $fillable = ['uid','cid','brought_by', 'created_at', 'updated_at'];
	public function users()
	{
		return $this->belongsTo('User','uid','uid');
	}
	public function cycles()
	{
		return $this->belongsTo('Cycle','cid','cid');
	}

}
