<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmiRepository implements EmiRepositoryInterface
{
    public function getPaginatedEmiDetails($perPage = 10)
    {
        return DB::table('emi_details')->paginate($perPage);
    }

    public function tableExists($tableName)
    {
        return Schema::hasTable($tableName);
    }
}
