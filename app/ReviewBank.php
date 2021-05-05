<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewBank extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus()
    {
        if($this->status == 0)
        {
            return $this->allow();
        }

        return $this->disAllow();
    }

    public function remove()
    {
        $this->delete();
    }

    public function getReviewBankTitle()
    {
        return ($this->bank != null) 
                ?   $this->bank->title
                :   'Нет банка';
    }
}
