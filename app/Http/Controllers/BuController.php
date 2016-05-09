<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BuRequest;
use App\Bu;
use Datatables;
use DB;
class BuController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->id!==null?$request->id:null;
        return view('admin.bu.index',compact('id'));
    }
    
    public function getAllBus(Request $request)
    {
        if($request->id)
        {
            $data=Bu::where('user_id',$request->id)->get();
        }
        else
        {
            $data=Bu::all();
        }
        
        return Datatables::of($data)
                ->editColumn('bu_name',function($model){
                    return "<a href='".url('/adminPanel/bu/'.$model->id.'/edit')."'>$model->bu_name</a>";
                })
                ->editColumn('bu_type',function($model){
                    $type=getTypes();
                    return "<span class='badge badge-info'>".$type[$model->bu_type]."</span>";
                })
                ->editColumn('bu_status',function($model){
                    return $model->bu_status==0? "<span class='badge badge-info'>".'غير مفعل'."</span>" : "<span class='badge badge-warning'>".'مفعل'."</span>";
                })
                ->editColumn('control',function($model){
                    $all="<a class='btn btn-info btn-circle' href='".url('/adminPanel/bu/'.$model->id.'/edit')."'><i class='fa fa-edit'></i></a>";
                    $all .="<a class='btn btn-danger btn-circle' href='".url('/adminPanel/bu/'.$model->id.'/delete')."'><i class='fa fa-trash-o'></i></a>";
                    return $all;
                })
                ->make(true);
    }
    
    public function create()
    {
        return view('admin.bu.create');
    }
    
    public function store(BuRequest $request)
    {
        array_add($request,'user_id',auth()->user()->id);
        array_add($request,'bu_month',date('m'));
        if($request->hasFile('file'))
        {
            $file=$request->file('file');
            $fileName=$file->getClientOriginalName();
            $file->move('uploads',$fileName);
            array_add($request,'bu_image',$fileName);
            \Intervention\Image\Facades\Image::make(url('uploads',$fileName))->resize(500,362)->save('uploads/'.$fileName);
        }
        else
        {
            array_add($request,'bu_image','no_image.png');
        }
        Bu::create($request->all());
        return redirect('/adminPanel/bu')->withFlashMessage('تم إضافة العقار بنجاح');
    }
    
    public function edit($id)
    {
        $bu=Bu::findOrFail($id);
        return view('admin.bu.edit',compact('bu'));
    }
    
    public function update(BuRequest $data,$id)
    {
        $bu=Bu::find($id);
        if($data->hasFile('file'))
        {
            $file=$data->file('file');
            $fileName=$file->getClientOriginalName();
            $file->move('uploads',$fileName);
            array_add($data,'bu_image',$fileName);
            \Intervention\Image\Facades\Image::make(url('uploads',$fileName))->resize(500,362)->save('uploads/'.$fileName);
        }
        $bu->update($data->all());
        return redirect('/adminPanel/bu')->withFlashMessage('تم تعديل العقار بنجاح');
    }
    
     public function destroy($id)
    {
        Bu::findOrFail($id)->delete();
        return redirect()->back()->withFlashMessage('تم حذف العقار بنجاح');
    }
    
    public function showAllBuildings()
    {
        $allBu=Bu::where('bu_status',1)->paginate(9);
        return view('site.bu',compact('allBu'));
    }
    
     public function forRent()
    {
        $allBu=Bu::where(['bu_status'=>1,'bu_rent'=>1])->paginate(9);
        return view('site.bu',compact('allBu'));
    }
    
     public function forBuy()
    {
        $allBu=Bu::where(['bu_status'=>1,'bu_rent'=>0])->paginate(9);
        return view('site.bu',compact('allBu'));
    }
    
     public function type($type)
    {   if(in_array($type,[0,1,2]))
        {
            $allBu=Bu::where(['bu_status'=>1,'bu_type'=>$type])->paginate(9);
            return view('site.bu',compact('allBu'));
        }
        return redirect()->back();
   
    }
    
    public function search(Request $request)
    {
       
       $query=DB::table('bus')->select('*');
        $map=[];
       foreach(array_except($request->all(),['_token','submit','page']) as $key=>$value)
       {
          
           if($value!='')
           {
               if($key=='bu_price_from' && $request->bu_price_to=='')
               {
                   $query->where('bu_price','>=',$value);
               }
               else if($key=='bu_price_to' && $request->bu_price_from=='')
               {
                   $query->where('bu_price','<=',$value);
               }
               else
               {
                   if($key!='bu_price_to' && $key!='bu_price_from')
                   {
                       $query->where($key,$value);
                   }
                   
               }
               
               $map[$key]=$value;
           }
       }
       
       if($request->bu_price_to!='' && $request->bu_price_from!='')
        {
            $query->whereBetween('bu_price',[$request->bu_price_from,$request->bu_price_to]);
            $map['bu_price_to']=$request->bu_price_to;
            $map['bu_price_from']=$request->bu_price_from;
        }
      
       $allBu=$query->paginate(9);
       
       return view('site.bu',compact(['allBu','map']));
    }
    
    public function singleBuilding($id)
    {
        $bu=Bu::findOrFail($id);
        $sameBu=Bu::where(['bu_rent'=>$bu->bu_rent,'bu_type'=>$bu->bu_type])->orderBy(DB::raw('rand()'))->take(6)->get();
        return view('site.singleBuilding',compact(['bu','sameBu']));
    }
    
    public function getBuInfo(Request $request)
    {
        return Bu::findOrFail($request->id)->toJson();
    }
}
