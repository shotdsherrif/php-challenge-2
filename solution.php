<?php
// Maurice Stephens: maurice.stephens@gmail.com

function parse_request($request, $secret)
{
    // reverse the strtr()
    $request = strtr($request, '-_', '+/');
    // get payload from concatenated request
    $payloadArray  = explode('.', $request);
    $payload = base64_decode($payloadArray[1]);

    return $payload;
}

function dates_with_at_least_n_scores($pdo, $n)
{
    // YOUR CODE GOES HERE
}

function users_with_top_score_on_date($pdo, $date)
{
    // YOUR CODE GOES HERE
}

function dates_when_user_was_in_top_n($pdo, $user_id, $n)
{
    // YOUR CODE GOES HERE
}
