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
    $num_scores[] = $n;
    $sql = "
    SELECT date
    FROM scores
    GROUP BY date
    HAVING count(score) >= :num
    ";

    if ($num_scores !== [null]) {
      $dates = $pdo->prepare($sql)->execute($num_scores);
    }

    return $dates;
}

function users_with_top_score_on_date($pdo, $date)
{
    $date = $date;
    $sql = "
        SELECT s1.user_id
        FROM (
          SELECT max(score) as max, user_id, date
          FROM scores
        ) AS s2
        INNER JOIN scores as s1
        ON s1.date = :date
        AND s1.score = s2.max
    ";

    if ($date !== [null]) {
        $dates = $pdo->prepare($sql)->execute($date);
    }

    return $date;
}

function dates_when_user_was_in_top_n($pdo, $user_id, $n)
{
    // YOUR CODE GOES HERE
}
