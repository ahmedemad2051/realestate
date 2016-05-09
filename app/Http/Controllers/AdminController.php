<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Bu;
use DB;
class AdminController extends Controller
{
    public function index()
    {
        $usersNumber=User::count();
        $buEnabledNumber=Bu::where('bu_status',1)->count();
        $buDisabledNumber=Bu::where('bu_status',0)->count();
        
        $charts=Bu::select(DB::raw('count(*) as counting,bu_month'))->groupBy('bu_month')->get();
        $latest_members=User::select('id','name','created_at')->take(4)->orderBy('created_at','dsc')->get();
        $latest_bu=Bu::take(4)->orderBy('created_at','dsc')->get();
     
        return view('admin.home.index',compact(['usersNumber','buEnabledNumber','buDisabledNumber','charts','latest_members','latest_bu']));
    }
    

}
