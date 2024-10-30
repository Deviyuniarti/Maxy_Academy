<?php

function _retriever($url, $data = null, $headers = null, $method = "GET")
{
    // Menggunakan __FILE__ untuk mendapatkan path file saat ini
    $cookie_file_temp = dirname(__FILE__) . '/cookie/name.txt';
    $datas = [
        'http_code' => 0,
        'content' => '',
        'error' => null
    ];

    // Memeriksa apakah URL kosong
    if (empty($url)) {
        $datas['error'] = 'URL tidak boleh kosong.';
        return $datas;
    }

    // Menyiapkan data untuk POST atau GET
    $data_string = "";
    if ($data !== null) {
        foreach ($data as $key => $value) {
            $data_string .= $key . '=' . urlencode($value) . '&';
        }
        $data_string = rtrim($data_string, '&');
    }

    // Menginisialisasi cURL
    $ch = curl_init();

    // Menetapkan metode permintaan
    if (strtoupper($method) == "POST") {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    } else if (strtoupper($method) == "GET" && $data !== null) {
        $url .= '?' . $data_string;
    }

    // Menetapkan header jika diberikan
    if ($headers !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Menetapkan opsi cURL lainnya
    curl_setopt($ch, CURLOPT_HEADER, false); // Mengecualikan header dari output
    curl_setopt($ch, CURLOPT_NOBODY, false); // Termasuk body dalam output
    curl_setopt($ch, CURLOPT_URL, $url); // Menetapkan URL untuk diambil
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Mengabaikan verifikasi SSL host
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Mengabaikan verifikasi SSL peer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Mengembalikan output sebagai string
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Mengikuti header "Location: "
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_temp); // Menyimpan cookies
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_temp); // Mengirim cookies

    // Menjalankan permintaan cURL
    $response = curl_exec($ch);
    $datas['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Mendapatkan kode respon HTTP
    $datas['content'] = $response; // Mendapatkan konten respon

    // Memeriksa kesalahan cURL
    if (curl_errno($ch)) {
        $datas['error'] = curl_error($ch);
    }

    // Menutup sesi cURL
    curl_close($ch);

    return $datas;
}

$data = array();
$counter = 0;
// Mengambil konten dari URL menggunakan _retriever
$html = _retriever('https://www.kapanlagi.com/showbiz/selebriti');

// Menampilkan output
// if ($html['error']) {
//     echo "Terjadi kesalahan: " . $html['error'];
// } else {
//     print_r($html['content']);
// }


$t_start = strpos($html['content'],' <li class="artikel-detail-listitem">');

// print_r($t_html);

// Looping untuk semua artikel
while ($t_start !== false) {
    $t_html = substr($html['content'], $t_start);

    // Link
    $t_link_start = strpos($t_html, '<a href="') + 9; 
    $t_link_end = strpos($t_html, '"', $t_link_start); 
    $t_link_lenght = $t_link_end - $t_link_start;
    $link = substr($t_html, $t_link_start, $t_link_lenght);
    print_r($link . '<br>');


    // IMG  
    $t_img_start = strpos($t_html, '<img class=" '); 
    $t_img_end= strpos($t_html, '" data-src=" ') + 5; 
    $t_img_len = $t_img_end - $t_img_start; 
    $img = substr($t_html, $t_img_start, $t_img_len);
    // print_r($img . '<br>');


    // Title
    $t_title_start = strpos($t_html, '<h1> ') + 4; 
    $t_title_end = strpos($t_html, '</h1>', $t_title_start); 
    $t_title_len = $t_title_end - $t_title_start;
    $title = substr($t_html, $t_title_start, $t_title_len); 
    // print_r($title . '<br>');

    // Menyimpan data sementara ke array
    $data[$counter]['img'] = $img;
    $data[$counter]['title'] = $title;

    // Detail
    $htmlDetail = _retriever($link);
    $decode = gzdecode($htmlDetail['content']);
    // print_r($decode);

    // Parsing script JSON untuk detail artikel
    $script_start = strpos($decode, '<script type="application/ld+json">');
    $temp_html = substr($decode, $script_start);
    $script_end = strpos($temp_html, '</script>');
    $json = substr($temp_html, 35, $script_end-35);
    $arr_data = json_decode($json);
    // print_r($arr_data);

    // Menyimpan data artikel
    if (isset($arr_data[2])) {
        $data[$counter]['publish_date'] = $arr_data[2]->datePublished;
        $data[$counter]['article_body'] = $arr_data[2]->articleBody;

        // Menyimpan keywords
        $keyword = '';
        foreach($arr_data[2]->keywords as $k => $v){
            $keyword .= $v . ';;';
        }
        $data[$counter]['keywords'] = rtrim($keyword, ';;');
    }

    // Mencari artikel berikutnya
    $t_start = strpos($html['content'], '<li class="artikel-detail-listitem">', $t_start + 1);
    $counter++;

};

// Menampilkan hasil akhir
print_r($data);