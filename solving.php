<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/13/2017
 * Time: 8:48 PM
 */


$val = explode(' ', fgets(STDIN));
$arr = explode(' ', fgets(STDIN));
$sum = 0;
$status = 0;
$hold = -1;
$temp = 0;
for($i=0;$i<$val[0];$i++){

	if($arr[$i]>8){
		$sum+=8;
		$arr[$i+1]+=($arr[$i] - 8);
	}
	else{
		$sum+=$arr[$i];
	}
	//print $sum . ' ';
	if($sum>=$val[1]){
		$hold = $i+1;
		break;
	}

}
print $hold;
?>