<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthdayExchangeRate;
use GuzzleHttp\Client;
use DateTime;

class BirthdayExchangeRateController extends Controller
{

    public function index() {

        $current_date = new DateTime('now');
        return view('exchangerates.index', ['current_date' => $current_date->format('Y-m-d'), 'minus_a_year' => $current_date->modify('-1 year')->format('Y-m-d')]);

    }

    public function store() {

        $entered_date = $this->validate(request(), ['date' => 'required']);
        $date_to_format = new DateTime($entered_date['date']);

        $key = config('services.fixer.api_key');

        $url = "http://data.fixer.io/api/".$entered_date['date']."?access_key=".$key."&base=EUR&symbols=USD,GBP,JPY,CAD";

        $client = new Client();

        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        
        $number_of_occurrences = BirthdayExchangeRate::where('date', $entered_date['date'])->count();
        echo($number_of_occurrences);

        if($number_of_occurrences >= 1) {
            $updated_entry = BirthdayExchangeRate::where('date', $entered_date['date'])->first();

            $updated_entry->update([
                'appears' => ++$updated_entry->appears
            ]);

        } else {
            $new_entry = BirthdayExchangeRate::create([
                'exchange_rates' => $data['rates'],
                'date' => $entered_date['date'],
                'formatted_date' => $date_to_format->format('d F Y')
            ]);
        }

        return redirect('results');

    }


    public function displayResults() {
        $results = BirthdayExchangeRate::orderBy('date', 'desc')->get();

        return view('exchangerates.results', compact('results'));
    }

}
