<?php

namespace App\Services;

use App\Models\LoanDetail;
use DB;
use App\Repositories\EmiRepositoryInterface;

class EmiService
{
    protected $emiRepository;

    public function __construct(EmiRepositoryInterface $emiRepository)
    {
        $this->emiRepository = $emiRepository;
    }


    public function processEmiData()
    {
        // Get the min first_payment_date and max last_payment_date
        $minDate = LoanDetail::min('first_payment_date');
        $maxDate = LoanDetail::max('last_payment_date');

        // Generate month columns between minDate and maxDate
        $columns = $this->generateMonthlyColumns($minDate, $maxDate);

        // Create EMI details table dynamically
        $this->createEmiDetailsTable($columns);

        // Insert data into emi_details
        $this->insertEmiData($columns);
    }

    public function getEmiDetailsPaginated($perPage = 10)
    {
        if ($this->emiRepository->tableExists('emi_details')) {
            return $this->emiRepository->getPaginatedEmiDetails($perPage);
        }

        return collect();
    }

    private function generateMonthlyColumns($start, $end)
    {
        $startDate = \Carbon\Carbon::parse($start);
        $endDate = \Carbon\Carbon::parse($end);

        $columns = [];
        while ($startDate <= $endDate) {
            $columns[] = $startDate->format('Y_M');
            $startDate->addMonth();
        }

        return $columns;
    }

    private function createEmiDetailsTable($columns)
    {
        $query = 'DROP TABLE IF EXISTS emi_details;';
        DB::statement($query);

        $createQuery = 'CREATE TABLE emi_details (clientid INT';
        foreach ($columns as $column) {
            $createQuery .= ", `$column` DECIMAL(10, 2) DEFAULT 0.00";
        }
        $createQuery .= ')';
        DB::statement($createQuery);
    }

    private function insertEmiData($columns)
    {
        $loanDetails = LoanDetail::all();
        
        foreach ($loanDetails as $loan) {

            $startDate = \Carbon\Carbon::parse($loan->first_payment_date);
            $endDate = \Carbon\Carbon::parse($loan->last_payment_date);

            $numMonths = $startDate->diffInMonths($endDate) + 1;

            $activeMonths = [];
            for ($i = 0; $i < $numMonths; $i++) {
                $activeMonths[] = $startDate->copy()->addMonthsNoOverflow($i)->format('Y_M');
            }
           
            $totalLoan = $loan->loan_amount;
            $numMonths = count($activeMonths);

            // Calculate base EMI
            $baseEmi = round($totalLoan / $numMonths, 2);

            //Create an array of base EMI values
            $emis = array_fill(0, $numMonths, $baseEmi);

            //Calculate total of base EMI array
            $totalEmi = array_sum($emis);

            //Adjust the rounding difference to last month
            $diff = round($totalLoan - $totalEmi, 2);

            $emis[$numMonths - 1] = round($emis[$numMonths - 1] + $diff, 2);
    
            // preparing datas to insert
            $row = ['clientid' => $loan->clientid];
            
            foreach ($columns as $column) {
                if (in_array($column, $activeMonths)) {
                    $monthIndex = array_search($column, $activeMonths);
                    $row[$column] = $emis[$monthIndex];
                } else {
                    $row[$column] = 0.00;
                }
            }

            DB::table('emi_details')->insert($row);
        }
    }
}
