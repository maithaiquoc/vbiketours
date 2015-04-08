<?php
error_reporting(0);
$tx=$_REQUEST['tx'];
if($tx != ''){
    $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-synch&tx='.$tx.'&at=eASEcel7Iwm7xQiqugxPof9P6MGjSDg_fTNXBX4V9vUzYySpvLHmfDO4AQ4';
    $curl = curl_init($paypal_url);
    $data = array(
        "cmd" => "_notify-synch",
        "tx" => $tx,
        "at" => "eASEcel7Iwm7xQiqugxPof9P6MGjSDg_fTNXBX4V9vUzYySpvLHmfDO4AQ4"
    );
    $data_string = json_encode($data);
    curl_setopt ($curl, CURLOPT_HEADER, 0);
    curl_setopt ($curl, CURLOPT_POST, 1);
    curl_setopt ($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 1);
    $headers = array (
        'Content-Type: application/x-www-form-urlencoded',
        'Host: www.sandbox.paypal.com',
        'Connection: close'
    );
    curl_setopt ($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    $lines = explode("\n", $response);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
            list($key,$val) = explode("=", $lines[$i]);
            $keyarray[urldecode($key)] = urldecode($val);
        }
        $payment_status=$keyarray['payment_status'];
        $payment_gross=$keyarray['payment_gross'];
        $payment_checking = 1;
    }
    else{
        $payment_checking = 0;
    }
}
?>