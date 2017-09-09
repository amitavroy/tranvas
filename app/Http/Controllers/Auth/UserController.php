<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function stockData(Request $request)
    {
        $symbols = $request->all();
        $query = implode(',', $symbols);

        $url = 'http://finance.google.com/finance/info?client=ig&q=NSE:' . $query;
        $client = new Client(['base_uri' => $url, 'timeout' => 2.0]);
        $response = $client->request('GET');
        $string = substr($response->getBody()->getContents(), 3);
        $stocks = json_decode($string, 1);

        $stockDataFinal = [];

        foreach ($stocks as $stock) {
            $stockDataFinal[$stock['t']] = [
                'name' => $stock['t'],
                'price' => $stock['l'],
                'change' => $stock['c'],
                'change_percentage' => $stock['cp'],
            ];
        }

        return $stockDataFinal;
    }
}
