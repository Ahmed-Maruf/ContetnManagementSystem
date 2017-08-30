<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/18/2017
 * Time: 2:24 AM
 */
class logger {

	public function Write($strFileName, $strdata){

		if(!is_writable($strFileName)){
			die("Change your permission" . $strFileName);
		}
		$handle = fopen($strFileName, 'a+');
		fwrite($handle, $strdata);
	}

	public function Read($strFileName){

	}

}