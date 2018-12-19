<?php

require_once 'campaign-monitor/csrest_subscribers.php';

$email = $_POST['widget-subscribe-form-email'];

if( isset( $email ) AND $email != '' ) {

	$auth = array('api_key' => 'd726035b47595d1aa6c6d252611ac97a-us12');

	$wrap = new CS_REST_Subscribers('638da7bee1', $auth);

	$result = $wrap->add(array(
		'EmailAddress' => $email,
		'Resubscribe' => true
	));

	if($result->was_successful()) {
		echo 'You have been <strong>successfully</strong> subscribed to our Email List.';
	} else {
		echo 'Failed with code '.$result->http_status_code."\n<br /><pre>";
		var_dump($result->response);
		echo '</pre>';
	}

}