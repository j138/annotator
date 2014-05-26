<?php

class Annotation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'annotations';

	// 入力を禁止するカラム
	protected $guarded = array('id');

}
