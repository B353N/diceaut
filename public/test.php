<?php
$cid = 12465010659316562110; //CID of a place can be genrated from https://pleper.com/index.php?do=tools&sdo=cid_converter
$key = 'AIzaSyAcAKnE8zw85kOWZkM6DhLLtiyOdFwtwUo';
$locId = 'ChIJhx27VK9VpEARvngF9iad_Kw';
$accId = '2013346280472395467';
//execute curl
$url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJhx27VK9VpEARvngF9iad_Kw&fields=reviews&reviews_sort=newest&language=bg&key='.$key;
//$url = 'https://mybusiness.googleapis.com/v4/accounts/'.$accId.'/locations/'.$locId.'/reviews&key='.$key;
//$url = 'https://maps.googleapis.com/maps/api/place/details/json?cid='.$cid.'&key=AIzaSyAcAKnE8zw85kOWZkM6DhLLtiyOdFwtwUo';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$data = curl_exec($ch);
curl_close($ch);

$arrayData = json_decode($data, true); // json object to array conversion
//var_dump($data);
$result = $arrayData['result'];

//$total_users    = $result['user_ratings_total']; // display total number of users who rated
//$overall_rating = $result['rating']; // display total average rating
$reviews        = $result['reviews'];   //holds information like author_name, author_url, language, profile_photo_url, rating, relative_time_description, text, time

//display on view
//var_dump($total_users);
//var_dump($overall_ratings);
var_dump($reviews);