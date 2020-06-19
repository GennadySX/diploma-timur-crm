<?php

namespace App\Http\Controllers;

use App\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function active()
    {
        return $this->pager('tariff', 'Активные тарифы', false);
    }
}
