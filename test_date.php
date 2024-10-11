<?php

    $date=date('y-m-d');
    $date1 = explode('-', $date);
 	$year  = $date1[0];
	$month = $date1[1];
	$day = $date1[2] + ($year-1);
	
  for ($x = 0; $x < $month; $x++) {
  	if ($x==1 OR $x==3 OR $x==5 OR $x==7 OR $x==8 OR $x==10 OR $x==12) {
  		$day=$day+31;
  	}

  	if ($x==4 OR $x==6 OR $x==9 OR $x==11) {
  		$day=$day+30;
 	 }

 	 if ($x==2) {
  		$day=$day+28;
 	 }
  }
  	$fraction=0;
 	$day=$day + ($year/4);

    $day1 = explode('.', $day);
 	$day_whole  = $day1[0];
	$fraction = $day1[1];

	$day=round(($day_whole / 7),1);

	$day1 = explode('.', $day);
 	$day_whole  = $day1[0];
 	$fraction = $day1[1] * 7/10;
	
 	$day1 = explode('.', $fraction);
 	$fraction  = $day1[0];
 	

	if ($fraction==0 OR $fraction==6) {
		$day_name="Week End";
	}
	
?>
