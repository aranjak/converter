<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Currency;
use App\Rate;

class RatesController extends Controller
{
    public function updateRates() {
        Rate::truncate();
        $client = new Client(); 
        $currencies = Currency::all();
        foreach($currencies as $key=>$currency) {
            $body = $client->get('https://api.exchangeratesapi.io/latest?base='.$currency->code)->getBody(); 
            $obj = json_decode($body);
            $data['base'] = $currency->code;
            foreach($obj->rates as $currency => $rate) {
                $data['currency'] = $currency;
                $data['rate'] = $rate;
                Rate::create($data);
            }
        }
    }
}
