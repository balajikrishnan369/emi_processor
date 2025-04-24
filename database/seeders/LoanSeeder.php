<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loan_details')->insert([
            [
                'clientid' => 1007,
                'num_of_payment' => 10,
                'first_payment_date' => '2020-03-15',
                'last_payment_date' => '2021-01-15',
                'loan_amount' => 2500.75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1010,
                'num_of_payment' => 15,
                'first_payment_date' => '2021-07-01',
                'last_payment_date' => '2022-09-01',
                'loan_amount' => 4600.40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1013,
                'num_of_payment' => 6,
                'first_payment_date' => '2023-01-10',
                'last_payment_date' => '2023-06-10',
                'loan_amount' => 1299.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
