<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface RenterStatisticServiceContract
{
    public function getRenterAddedPropertyStatistic(): Collection;
}
