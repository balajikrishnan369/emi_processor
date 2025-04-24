<?php

namespace App\Repositories;

interface EmiRepositoryInterface
{
    public function getPaginatedEmiDetails($perPage);
    public function tableExists($tableName);
}
