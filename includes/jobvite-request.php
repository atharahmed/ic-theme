<?php

add_action( 'wp_ajax_nopriv_ic_jobvite_request', 'ic_jobvite_request' );
add_action( 'wp_ajax_ic_jobvite_request', 'ic_jobvite_request' );

function ic_jobvite_request() 
{

    $jobtype = $_POST['job'];

    // TO DO: use wp_get_post
    $data_lookup = file_get_contents( 'https://api.jobvite.com/v1/jobFeed?companyId=qjv9VfwC&api=invisiblechildren_api_key&sc=7cc0ad22541029ee89f36af688cffb97&type=' . $jobtype, 10 );

     $generalError = "Oops, we had trouble finding the information you requested. Please try again.";
     $noJobsError = "Sorry, we don't have any open positions in this category right now. <a id='job-alerts' href='javascript:void(0)'>Sign up for job alerts</a>";

    if (isset($data_lookup)) { 
        $decoded = json_decode($data_lookup);
        if ( empty($decoded->jobs) ) {
            respondWithError($noJobsError);
        }
    } else {
        respondWithError($noJobsError);
    } 

    if ($decoded == false) {
        respondWithError($generalError);
    }

    $generatedHTML = null;

    foreach ($decoded->jobs as $key => $value) {
        $generatedHTML .= generateHTML($value);
    } 

    $response = (object)array(
        "success" => true,
        "data" => $generatedHTML,
        "errorMessage" => null
    );

    print json_encode($response);
    exit;
}

function generateHTML($value) 
{
    $jobsTemplate = '<a class="jobmeta" href="%1$s" target="_blank"><p class="title">%2$s</p><p class="location">%3$s</p></a>';

    $location = $value->location;
    $title = $value->title;
    $detailUrl = $value->detailUrl;
    if ($location == 'San Diego, CA, United States' ) {
        $location = 'San Diego';
    } 
    else if ($location == 'Dungu, Congo, Democratic Republic of the') {
        $location = 'Dungu, DR Congo';
    }

    $jobsMarkup = sprintf($jobsTemplate,
        esc_attr($detailUrl),
        esc_html($title),
        esc_html($location) 
    );

    return $jobsMarkup;
}

function respondWithError($errorMessage)
{
    $response = (object)array(
        "success" => false,
        "data" => null,
        "errorMessage" => $errorMessage
    );

    print json_encode($response);
    exit;
}

?>
