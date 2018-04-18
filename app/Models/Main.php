<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\User;

class Main extends Model
{
    use DatePresenter;

    protected $table = 'main';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
