<?php

namespace App\Http\Controllers;

use App\Services\EmiService;

class ProcessEmiController extends Controller
{
    protected $emiService;

    public function __construct(EmiService $emiService)
    {
        $this->emiService = $emiService;
    }

    public function index(){
        return view('admin.process_emis');
    }

    public function processEmi()
    {
        $this->emiService->processEmiData();

    }

    public function showEmiDetails()
    {
        $emiDetails = $this->emiService->getEmiDetailsPaginated(2);

        return view('admin.process_emis', compact('emiDetails'));
    }
}
