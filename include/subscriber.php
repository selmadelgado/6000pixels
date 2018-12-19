<?php

require_once('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if($_POST['widget-subscribe-form-email'] != '') {

        $email = $_POST['widget-subscribe-form-email'];
// $email = isset($email) ? "Email: $email<br><br>" : '';

        $subject = isset($subject) ? $subject : 'New Subscriber From 6000pixels';

        $botcheck = $_POST['template-contactform-botcheck'];

        $toemail = 'info@6000pixels.com'; // Your Email Address
        $toname = 'Aries'; // Your Name

        if( $botcheck == '' ) {

            $mail->SetFrom( 'no-reply@6000pixels.com' );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $message = "New Subscriber: $email<br><br>";

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$message";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                echo 'Your <strong>successfully</strong> subscribed. Thanks! ';
            else:
                echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
            endif;
        } else {
            echo 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
        }
    } else {
        echo 'Please <strong>Fill up</strong> all the Fields and Try Again.';
    }
} else {
    echo 'An <strong>unexpected error</strong> occured. Please Try Again later.';
}

?>