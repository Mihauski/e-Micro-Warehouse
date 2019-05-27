<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class stock extends Model
{
    use Sortable;
    public $sortable = ['nazwa', 'typ', 'ilosc', 'jednostka', 'alarm'];
}
