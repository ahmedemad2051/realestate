<?php

function getSetting($settingName='site_name')
{
   $data=App\Setting::where('settingName',$settingName)->first();
   if(empty($data))
   {
       return '';
   }
   return $data->value;
}

function getTypes()
{
    $types=['شقة','عمارة','فيلا'];
    return $types;
}

function getRooms()
{
    $arr=[];
    for($i=1;$i<40;$i++)
    {
        $arr[]=$i;
    }
    return $arr;
}

function getPlace()
{
    return [
        'القاهرة','اسوان','الجيزه','الدقهلية'
    ];
}

function getRent()
{
    return [
        'تمليك','ايجار'
    ];
}

function transSearch()
{
    return [
        'bu_place'=>'المنطقة',
        'bu_price'=>'سعر العقار',
        'bu_price_from'=>'سعر العقار من',
        'bu_price_to'=>'سعر العقار الى',
        'bu_type'=>'نوع العقار',
        'bu_rooms'=>'عدد الغرف',
        'bu_rent'=>'نوع العملية',
        'bu_square'=>'المساحة'
    ];
}

function getSubject()
{
    return [
        'اعجاب','اقتراح','مشكلة','استفسار'
    ];
}

function setActive($array,$class='active')
{
    if(!empty($array))
    {
        $seg_array=[];
        foreach($array as $key=>$value)
        {
            if(Request::segment(++$key)==$value)
            {
                $seg_array[]=$key;
            }
        }
        if(!empty($seg_array) && count($seg_array)==count(Request::segments()))
        {
            return $class;
        }
    }
}