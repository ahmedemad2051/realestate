<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use App\User;
use Datatables;
use App\Bu;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index(User $user)
    {
        $users=$user->all();
        return view('admin.users.index',compact('users'));
    }
    
    public function create()
    {
        return view('admin.users.create');
    }
    
    public function store(RegisterRequest $data)
    {
        User::create($data->all());
        return redirect('/adminPanel/users')->withFlashMessage('تم اضافة العضو بنجاح');
    }
    
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $buEnabled=Bu::where(['bu_status'=>1,'user_id'=>$id])->paginate(10);
        $buDisabled=Bu::where(['bu_status'=>0,'user_id'=>$id])->paginate(10);
        return view('admin.users.edit',compact(['user','buEnabled','buDisabled']));
    }
    
    public function update(Requests\EditProfileRequest $data,$id)
    {
        $user=User::find($id);
        if($data->email!=$user->email)
        {
            $isFound=User::where('email',$data->email)->count();
            if($isFound>0)
            {
                return redirect()->back()->withFlashMessage('عذرا هذا البريد موجود مسبقا');
            }
        }
        $user->update($data->all());
        return redirect('/adminPanel/users')->withFlashMessage('تم تعديل العضو بنجاح');
    }
    
    public function changePassword(ChangePasswordRequest $request,$id)
    {
        $user=User::findOrFail($id);

        if(password_verify($request->OldPassword,$user->password))
        {
            $user->update(['password'=>bcrypt($request->NewPassword)]);
            return redirect()->back()->withFlashMessage('تم تغيير كلمة السر بنجاح');
        }
        return redirect()->back()->withFlashMessage('عفوا الرقم السرى غير صحيح');
    }
    
    public function getAllUsers()
    {
        $users=User::all();
        return Datatables::of($users)
                ->editColumn('name',function($model){
                    return "<a href='".url('/adminPanel/users/'.$model->id.'/edit')."'>$model->name</a>";
                })
                ->editColumn('userBu',function($model){
                    return "<a href='".url('/adminPanel/bu/'.$model->id)."'><span class='btn btn-danger'><i class='fa fa-link'></i></span></a>";
                })
                ->editColumn('admin',function($model){
                    return $model->admin==0? "<span class='badge badge-info'>".'عضو'."</span>" : "<span class='badge badge-warning'>".'مدير'."</span>";
                })
                ->editColumn('control',function($model){
                    $all="<a class='btn btn-info btn-circle' href='".url('/adminPanel/users/'.$model->id.'/edit')."'><i class='fa fa-edit'></i></a>";
                    if($model->id !=1)
                    {
                        $all .="<a class='btn btn-danger btn-circle' href='".url('/adminPanel/users/'.$model->id.'/delete')."'><i class='fa fa-trash-o'></i></a>";
                    }
                    return $all;
                })
                ->make(true);
    }
    
    public function destroy($id)
    {
        if($model->id !=1)
        {
            User::findOrFail($id)->delete();
            return redirect()->back()->withFlashMessage('تم حذف العضو بنجاح');
        }
        else
        {
            return redirect()->back()->withFlashMessage('عذرا لا يمكن حذف هذاالعضو');
        }
     
    }
    
    public function getBuCreate()
    {
        return view('/addBu');
    }
    public function postBuCreate(Requests\UserBuRequest $request)
    {
        array_add($request,'user_id',auth()->user()->id);
        array_add($request,'bu_status',0);
        array_add($request,'bu_small_dis',strip_tags(str_limit($request->bu_large_dis,160)));
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
        return redirect('/user/bu/create')->withFlashMessage('تم إضافة العقار بنجاح');
    }
    
    public function userBuStatus($status)
    {
        $allBu=Bu::where(['bu_status'=>$status,'user_id'=>auth()->user()->id])->paginate(9);
        return view('site.bu',compact(['allBu','status']));
    }
    
    public function editUserInfo()
    {
        $user=User::find(auth()->user()->id);
        return view('profile',compact('user'));
    }
    
    public function updateUserInfo(Requests\EditProfileRequest $request)
    {
        $user=User::find(auth()->user()->id);
        if($request->email!=$user->email)
        {
            $isFound=User::where('email',$request->email)->count();
            if($isFound>0)
            {
                return redirect()->back()->withFlashMessage('عذرا هذا البريد موجود مسبقا');
            }
        }
        $user->update($request->all());
        return redirect()->back()->withFlashMessage('تم تعديل المعلومات بنجاح');
    }
    
    public function updateUserPassword(ChangePasswordRequest $request)
    {
        $user=User::find(auth()->user()->id);
        if(password_verify($request->OldPassword,$user->password))
        {
            $user->fill(['password'=>$request->NewPassword])->save();
            return redirect()->back()->withFlashMessage('تم تغيير كلمة المرور بنجاح');
        }
        
        return redirect()->back()->withFlashMessage('عذرا كلمة المرور القديمة خاطئة');
    }
    
    public function buDisabled($id)
    {
        $bu=Bu::findOrFail($id);
        $bu->update(['bu_status'=>0]);
        return redirect()->back()->withFlashMessage('تم إلغاء تفعيل العقار');
    }
    
     public function buEnabled($id)
    {
        $bu=Bu::findOrFail($id);
        $bu->update(['bu_status'=>1]);
        return redirect()->back()->withFlashMessage('تم  تفعيل العقار');
    }
}
