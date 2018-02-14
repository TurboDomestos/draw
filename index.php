<?php

$temp = 0;

for($i=0;$i<1000;$i++){
	$reuslt = json_decode(file_get_contents('https://api.coindesk.com/v1/bpi/currentprice.json'));
	$today = $reuslt->bpi->USD->rate;

	if(empty($today) || is_null($today)){
		$today = $temp;
	}
	
	if($temp > $today){
		$today = "down-> ".$today;
		//$bot->sendMessage();
	} elseif($temp < $today){
		$today = "up-> ".$today;
		//$bot->sendMessage();
	}

	echo date("[Y-m-d H:i:s]").PHP_EOL;
	print_r("=====> ".$today." usd. <====");
	echo PHP_EOL."----------------------------------".PHP_EOL;

	$temp = $reuslt->bpi->USD->rate;
	
	sleep(1);
}
