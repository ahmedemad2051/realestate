<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $fillable=[
        'bu_name', 'bu_price', 'bu_rent', 'bu_square', 'bu_type', 'bu_small_dis',
        'bu_meta', 'bu_longitude', 'bu_latitude', 'bu_large_dis', 'bu_status','bu_rooms',
        'user_id','bu_place','bu_image','bu_month'
    ];
}
