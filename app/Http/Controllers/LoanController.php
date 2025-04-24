<?php

namespace App\Http\Controllers;

use App\Services\LoanService;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index(){
        $loanDetails = $this->loanService->fetchAllLoans(10);
        return view('admin.loan_details', compact('loanDetails'));
    }
}
