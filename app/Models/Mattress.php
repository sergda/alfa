<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\User;

class Mattress extends Model
{
    use DatePresenter;

    protected $table = 'mattress';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
