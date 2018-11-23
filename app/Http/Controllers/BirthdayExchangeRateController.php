<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthdayExchangeRate;
use GuzzleHttp\Client;
use DateTime;   
use Jenssegers\Agent\Agent;

class BirthdayExchangeRateController extends Controller {

    public function index() {
        $agent = new Agent();
        $browser = $agent->browser();
        $current_date = new DateTime('now');

        return view('exchangerates.index', ['current_date' => $current_date->format('Y-m-d'), 'minus_a_year' => $current_date->modify('-1 year')->format('Y-m-d'), 'browser' => $browser]);

    }

    public function store() {

        $entered_date = $this->validate(request(), ['date' => 'required']);

        $date_to_format = new DateTime($entered_date['date']);

        $key = config('services.fixer.api_key');

        $url = "http://data.fixer.io/api/".$entered_date['date']."?access_key=".$key."&base=EUR&symbols=USD,GBP,JPY,CAD";

        $client = new Client();

        $response = $client->get($url);
        $status_code = $response->getStatusCode();
        
        $data = json_decode($response->getBody());
        
        if($status_code >= 500) {
            return view('error.500');
        }


        $number_of_occurrences = BirthdayExchangeRate::where('date', $entered_date['date'])->count();
        echo($number_of_occurrences);

        if($number_of_occurrences === 1) {

            $updated_entry = BirthdayExchangeRate::where('date', $entered_date['date'])->first();

            $updated_entry->update([
                'appears' => ++$updated_entry->appears
            ]);

        } else {

            $new_entry = BirthdayExchangeRate::create([
                'exchange_rates' => $data->rates,
                'date' => $entered_date['date'],
                'formatted_date' => $date_to_format->format('d F Y')
            ]);
        }

        session()->flash('message', 'Your entry has been successfully recorded!');

        return redirect()->route('results');

    }


    public function displayResults() {
        $agent = new Agent();
        $browser = $agent->browser();

        $results = BirthdayExchangeRate::orderBy('date', 'desc')->get();

        return view('exchangerates.results')->with(['results' => $results, 'browser' => $browser]);

    }

}
