<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;

class LoanService
{
    protected $loanRepo;

    public function __construct(LoanRepositoryInterface $loanRepo)
    {
        $this->loanRepo = $loanRepo;
    }

    public function fetchAllLoans($perPage = 10)
    {
        return $this->loanRepo->getAllLoans($perPage);
    }
}
