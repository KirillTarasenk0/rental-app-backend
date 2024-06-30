<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AddPropertyServiceContract
{
    public function addProperty(Request $request): void;
}
