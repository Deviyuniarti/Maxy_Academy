<?php

function _retriever($url, $data = null, $headers = null, $method = "GET")
{
    $cookie_file_temp = dirname(__FILE__) . '/cookie/name.txt';
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

$data = array();
$counter = 0;
// $html  = file_get_contents('https://www.kapanlagi.com/showbiz/index.html ');
$html = _retriever('https://www.kapanlagi.com/showbiz/index.html');

// print_r($html['result']);

$t_start = strpos($html['result'],'<li class="tagli">');
$t_html = substr($html['result'],$t_start);
//  print_r($t_html);


//link
$t_link_start = strpos($t_html, '<a target="_blank" href="');
$t_link_end = strpos($t_html, 'html" >') - 21;
$t_link = substr($t_html, $t_link_start + 25, $t_link_end - $t_link_start);
 print($t_link . "<br>");

// image
$t_image_start = strpos($t_html, '<img src="') + strlen('<img src="');
$t_image_end = strpos($t_html, '"', $t_image_start);
$t_image = substr($t_html, $t_image_start, $t_image_end - $t_image_start);
// print($t_image. "<br>");

// Title
$t_title_start = strpos($t_html, '<h2 class="title-tag">') + strlen('<h2 class="title-tag">');
$t_title_link_start = strpos($t_html, '">', $t_title_start) + 2;
$t_title_end = strpos($t_html, '</a>', $t_title_link_start);
$t_title = substr($t_html, $t_title_link_start, $t_title_end - $t_title_link_start);
// print($t_title . "<br>");

$data[$counter]['image'] = $t_image;
$data[$counter]['title'] = $t_title;


// Detail
$htmlDetail = _retriever($t_link);
$decode = gzdecode($htmlDetail['result']);
// print_r($decode);

$script_start = strpos($decode, '<script type="application/ld+json">');
$temp_html = substr($decode, $script_start);
$script_end = strpos($temp_html, '</script>');
$json = substr($temp_html, 35, $script_end-35);
$arr_data = json_decode($json);
// print_r($arr_data);

$data[$counter ]['publish_date'] = $arr_data[2]->datePublished;
$data[$counter ]['article_body'] = $arr_data[2]->articleBody;

$keyword = '';
foreach ($arr_data[2]->keywords as $k => $v) {
    # code...
    $keyword .= $v . ';;';
}
$data[$counter ]['keywords'] = $keyword;
 print_r($data);

 


?>