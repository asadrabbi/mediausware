<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;

use Bulkly\User;

use Bulkly\SocialAccounts;

use Bulkly\BufferPosting;

use GuzzleHttp\Exception\RequestException;

use GuzzleHttp\Exception\ClientException;

class HistoryController extends Controller
{
    public function index(Request $request){
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }
        $history = new BufferPosting;
        $history = $history->with('accountInfo')->with('groupInfo');
        $history = $history->paginate(15,['*'],'null',$request->page);
        //if($request->has(''))
        return view('group.history', ['history' => $history]);
    }
}
