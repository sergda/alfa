<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\User;

class Pouffes extends Model
{
    use DatePresenter;

    protected $table = 'pouffes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
