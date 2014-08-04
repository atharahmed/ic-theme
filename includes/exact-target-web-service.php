<?php

require_once( dirname(__FILE__). '/lib/FuelSDK/ET_Client.php' );

add_action( 'wp_ajax_ic_add_email_to_list', 'icAddEmailToList' );
add_action( 'wp_ajax_nopriv_ic_add_email_to_list', 'icAddEmailToList' );
function icAddEmailToList()
{
    try {
        header('Content-type: application/json; charset=utf-8');

        $email = $_POST['email'];
        $listID = $_POST['listId'];

        $myclient = new ET_Client(true);
        $result = $myclient->AddSubscriberToList($email, array($listID));

        $errorMessage = null;
        $errorCode = null;
        if (!$result->status) {
            $errorCode = $result->results[0]->ErrorCode;
            switch($result->results[0]->ErrorCode) {
                case "12000":
                case "12002":
                    $success = false;
                    $errorMessage = 'Enter a valid email address';
                    break;
                    break;
                default:
                    $success = false;
                    $errorMessage = 'Sorry, but an error has occured. Please try again later.';
            }
        }

        generateResponse($result->status, $errorCode, $errorMessage);
    }
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";

        $success = false;
        $errorMessage = 'Subscription failed';
        generateResponse($success, $postResult->code, $errorMessage);
    }
}

function generateResponse($success, $errorCode = null, $errorMessage = null)
{
    $response = (object)array(
        'success' => $success,
        'errorCode' => $errorCode,
        'errorMessage' => $errorMessage
    );

    print json_encode($response);

    exit();
};

?>