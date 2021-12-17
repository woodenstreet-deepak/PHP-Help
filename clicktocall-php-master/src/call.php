<?php
ini_set("display_errors",1);
require_once 'src/Twilio/autoload.php'; 
// Your Account SID and Auth Token from twilio.com/console
$sid = '';
$token = '';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with Voice capabilities
$twilio_number = "+447862127770";

// Where to make a voice call (your cell phone?)
$to_number = "+919509439267";
// $to_number = "+919602098822";
// $to_number = "+918947025147";
// $to_number = "+447862127770";
$to_number = "+919982989979";
// strong,moderate

$client = new Twilio\Rest\Client($sid, $token);

if (!empty($_POST) ){
    // Get form input
    $userPhone = $_POST['userPhone'];
    $encodedSalesPhone = urlencode($_POST['salesPhone']);
    // Set URL for outbound call - this should be your public server URL
    $host = $_SERVER['HTTP_HOST'];

    // Create authenticated REST client using account credentials in
    // <project root dir>/.env.php
    // $client = new Client(
    //     getenv('TWILIO_ACCOUNT_SID'),
    //     getenv('TWILIO_AUTH_TOKEN')
    // );

    $outboundUri = "http://e0ee-103-99-186-103.ngrok.io/twilio/clicktocall-php-master/src/outbound.php?sales_phone=$encodedSalesPhone";

    try {
        $client->calls->create(
            $userPhone, // The visitor's phone number
            $twilio_number, // A Twilio number in your account
            array(
                "url" => $outboundUri
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        echo $e;
    }

    print_r('Call Incoming !');
}
