<?php

function _retriever($url, $data = null, $headers = null, $method = "GET")
{
    $cookie_file_temp = dirname(__FILE__) . '/cookie/farmrpg.txt';
    $datas['http_code'] = 0;

    // Check if URL is empty
    if ($url == "") {
        return $datas;
    }

    // Prepare data for POST or GET
    $data_string = "";
    if ($data != null) {
        foreach ($data as $key => $value) {
            $data_string .= $key . '=' . urlencode($value) . '&';
        }
        $data_string = rtrim($data_string, '&');
    }

    // Initialize cURL
    $ch = curl_init();

    // Set request method
    if (strtoupper($method) == "POST") {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    } else if (strtoupper($method) == "GET" && $data != null) {
        $url = $url . '?' . $data_string;
    }

    // Set headers if provided
    if ($headers != null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Set other cURL options
    curl_setopt($ch, CURLOPT_HEADER, false); // Exclude the header in the output
    curl_setopt($ch, CURLOPT_NOBODY, false); // Include the body in the output
    curl_setopt($ch, CURLOPT_URL, $url); // Set the URL to fetch
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Ignore host SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore peer SSL verification
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return output as string
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow any "Location: " header
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_temp); // Save cookies
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_temp); // Send cookies

    // Execute cURL request
    $response = curl_exec($ch);
    $datas['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP response code
    $datas['result'] = $response; // Get response content

    // Check for cURL errors
    if (curl_errno($ch)) {
        $datas['error'] = curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    return $datas;
}

$html = _retriever('https://online.pwntilldawn.com/Account/Login');

// TOKEN
$startToken = strpos($html['result'], '<input name="__RequestVerificationToken"') + 62;
$endToken = strpos($html['result'], '/> <script type="text/javascript" style="display:none">');
$lenToken = $endToken - $startToken;
$token = substr($html['result'], $startToken, $lenToken);
print_r($token);

$data = array(
    '__RequestVerificationToken' => $token,
    'Email' => 'pastrysoup02@gmail.com',
    'password' =>  'Mixue.1029384756',
);

$header = array(
    'origin:https://online.pwntilldawn.com', 
    'referer:https://online.pwntilldawn.com/Account/Login?ReturnUrl=%2f',
);

$html = _retriever('https://online.pwntilldawn.com/Account/Login?ReturnUrl=%2F', $data, $header, 'POST');
$html = _retriever('https://online.pwntilldawn.com');
print_r($html);

