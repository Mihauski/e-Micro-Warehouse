<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class alarm extends Model
{
    use Sortable;
    public $sortable = ['id', 'updated_at', 'prod_id', 'prog', 'deadline'];
}
