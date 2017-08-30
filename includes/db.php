<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/7/2017
 * Time: 7:29 PM
 */

//Putting the Database setup into an array!!!!
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

//Defining constant variable
foreach($db as $key => $value){

	define(strtoupper($key), $value);

}

///Connecting to the database!!!
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection) {

	echo mysqli_error($connection);
}

///End of the database settings!!!!
?>