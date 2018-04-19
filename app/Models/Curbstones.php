<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\User;

class Curbstones extends Model
{
    use DatePresenter;

    protected $table = 'curbstones';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
