<?php

namespace App\Entity;

class OptAdAPI
{
    const KEY = 'HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV';
    const API_URL = 'https://api.optad360.com/';

    const CURRENCIES = [
        'PLN' => 'PLN',
        'USD' => 'USD',
        'EUR' => 'EUR'
    ];

    public static function callAPI($method, $url, $data, $headers = false)
    {
        $curl = curl_init();
        switch ($method) {
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data) {
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              }
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data) {
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              }
              break;
           default:
              if ($data) {
                  $url = sprintf("%s?%s", $url, http_build_query($data));
              }
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        if (!$headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                $headers
            ));
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }
}
