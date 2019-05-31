<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use App\History;
use App\Rate;

class ConverterController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('converter',['currencies' => Currency::all()]);
    }

    public function convert(Request $request)
    {
        $data_in = $request->all();

        $rate = $this->getRate($data_in);

        $amount_out = $data_in['amount_in']*$rate;

        $data_in['amount_out'] = $amount_out;

        $data['amount_out'] = $amount_out;
        $data['history'] = $this->get_History();

        History::create($data_in);

        return json_encode($data);
    }

    public function getHistory() {
        $histories = $this->get_History();
        return  json_encode($histories);
    }

    public function get_History() {
        $histories = History::join('currencies as c1', 'c1.id', '=', 'histories.currency_in_id')
            ->join('currencies as c2', 'c2.id', '=', 'histories.currency_out_id')
            ->select(['histories.id','c1.code as code_in', 'histories.amount_in', 'c2.code as code_out', 
            'histories.amount_out'])
            ->orderBy('id','desc')
            ->take(5)
            ->get();

        return $histories;    
    }

    public function getRate($data) {
        $base = Currency::find($data['currency_in_id']);
        $currency = Currency::find($data['currency_out_id']);
        $rate = Rate::where([
            ['base', '=', $base->code],
            ['currency', '=', $currency->code],
            ])->first();
        return $rate->rate;    
    }
}
