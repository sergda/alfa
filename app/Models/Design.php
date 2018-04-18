<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\User;

class Design extends Model
{
    use DatePresenter;

    protected $table = 'design';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
