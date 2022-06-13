<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertCurrency')) {
    function convertCurrency($to, $amount)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=" . $to . "&from=USD&amount=" . $amount . "",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: oIQbLL9TSVz0GBRKQWMcMOXhxihLdKwD"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        return $result->result;
    }
}
