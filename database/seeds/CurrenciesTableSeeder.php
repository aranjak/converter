<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => "United States Dollar",
            'code' => "USD",
            'symbol' => "$",
        ]);
        DB::table('currencies')->insert([
            'name' => "Euro",
            'code' => "EUR",
            'symbol' => "€",
        ]);
        DB::table('currencies')->insert([
            'name' => "Canadian Dollar",
            'code' => "CAD",
            'symbol' => "$",
        ]);
        DB::table('currencies')->insert([
            'name' => "Japanese Yen",
            'code' => "JPY",
            'symbol' => "¥",
        ]);
        DB::table('currencies')->insert([
            'name' => "Polish Zloty",
            'code' => "PLN",
            'symbol' => "zł",
        ]);  
        DB::table('currencies')->insert([
            'name' => "Czech koruna",
            'code' => "CZK",
            'symbol' => "Kč",
        ]);  
        DB::table('currencies')->insert([
            'name' => "Pound sterling",
            'code' => "GBP",
            'symbol' => "£",
        ]); 
        DB::table('currencies')->insert([
            'name' => "Bulgarian lev",
            'code' => "BGN",
            'symbol' => "лв",
        ]); 
        DB::table('currencies')->insert([
            'name' => "New Zealand dollar",
            'code' => "NZD",
            'symbol' => "$",
        ]); 
        DB::table('currencies')->insert([
            'name' => "Israeli Shekel",
            'code' => "ILS",
            'symbol' => "₪",
        ]); 
        DB::table('currencies')->insert([
            'name' => "Philippine Peso",
            'code' => "PHP",
            'symbol' => "₱",
        ]); 
        DB::table('currencies')->insert([
            'name' => "Swiss franc",
            'code' => "CHF",
            'symbol' => "SFr",
        ]); 
        DB::table('currencies')->insert([
            'name' => "South African Rand",
            'code' => "ZAR",
            'symbol' => "R",
        ]);
        DB::table('currencies')->insert([
            'name' => "Australian Dollar",
            'code' => "AUD",
            'symbol' => "$",
        ]);
        DB::table('currencies')->insert([
            'name' => "Turkish lira",
            'code' => "TRY",
            'symbol' => "₺",
        ]);
        DB::table('currencies')->insert([
            'name' => "Hong Kong dollar",
            'code' => "HKD",
            'symbol' => "HK$",
        ]);
        DB::table('currencies')->insert([
            'name' => "Malaysian dollar",
            'code' => "MYR",
            'symbol' => "RM",
        ]);
        DB::table('currencies')->insert([
            'name' => "Thai baht",
            'code' => "THB",
            'symbol' => "฿",
        ]);
        DB::table('currencies')->insert([
            'name' => "Croatian Kuna",
            'code' => "HRK",
            'symbol' => "kn",
        ]);
        DB::table('currencies')->insert([
            'name' => "Russian Ruble",
            'code' => "RUB",
            'symbol' => "руб",
        ]);
        
    }
}
