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
                'num_of_payment' => 11,
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
            [
                'clientid' => 1015,
                'num_of_payment' => 12,
                'first_payment_date' => '2022-05-01',
                'last_payment_date' => '2023-04-01',
                'loan_amount' => 3200.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1018,
                'num_of_payment' => 25,
                'first_payment_date' => '2021-09-10',
                'last_payment_date' => '2023-09-10',
                'loan_amount' => 8500.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1020,
                'num_of_payment' => 8,
                'first_payment_date' => '2023-03-15',
                'last_payment_date' => '2023-10-15',
                'loan_amount' => 1800.25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1022,
                'num_of_payment' => 18,
                'first_payment_date' => '2022-01-01',
                'last_payment_date' => '2023-06-01',
                'loan_amount' => 6000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1025,
                'num_of_payment' => 11,
                'first_payment_date' => '2021-11-20',
                'last_payment_date' => '2022-09-20',
                'loan_amount' => 2750.75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1027,
                'num_of_payment' => 5,
                'first_payment_date' => '2024-01-10',
                'last_payment_date' => '2024-05-10',
                'loan_amount' => 900.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1030,
                'num_of_payment' => 21,
                'first_payment_date' => '2020-08-15',
                'last_payment_date' => '2022-04-15',
                'loan_amount' => 7200.60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1033,
                'num_of_payment' => 9,
                'first_payment_date' => '2023-07-05',
                'last_payment_date' => '2024-03-05',
                'loan_amount' => 1500.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1035,
                'num_of_payment' => 17,
                'first_payment_date' => '2022-12-12',
                'last_payment_date' => '2024-04-12',
                'loan_amount' => 5000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clientid' => 1038,
                'num_of_payment' => 8,
                'first_payment_date' => '2021-04-20',
                'last_payment_date' => '2021-11-20',
                'loan_amount' => 2100.35,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);        
    }
}
