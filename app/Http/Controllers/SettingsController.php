<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Setting;
class SettingsController extends Controller
{
    public function index()
    {
        $settings=Setting::all();
        return view('admin.settings.index',compact('settings'));
    }
    
    public function store(Request $allData)
    {
        if($allData->hasFile('file'))
        {
            $file=$allData->file('file');
            $fileName=$file->getClientOriginalName();
            $file->move('uploads',$fileName);
            array_add($allData,'main_image',$fileName);
          
        }
        foreach(array_except($allData->toArray(),['_token','file']) as $key=>$data)
        {
            $item=Setting::where('settingName',$key)->first();
            $item->update(['value'=>$data]);
        }
        
        return redirect()->back()->withFlashMessage('تم التعديل على الاعدادات بنجاح');
    }
}
