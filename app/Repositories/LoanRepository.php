<?php

namespace App\Repositories;

use App\Models\LoanDetail;

class LoanRepository implements LoanRepositoryInterface
{
    public function getAllLoans($perPage = 10)
    {
        return LoanDetail::paginate($perPage);
    }
}