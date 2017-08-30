<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/18/2017
 * Time: 2:51 AM
 */
class Character {


	public $power;
	public $Age;


	public function __construct($power, $Age) {

		$this->power = $power;
		$this->Age = $Age;
	}

	public function sentence(){

		return $this->power." is the ". $this->Age;
	}
}