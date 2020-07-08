<?php

namespace Discussion;

class Reply extends Model
{
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
