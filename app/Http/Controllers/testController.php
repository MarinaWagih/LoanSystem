<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class testController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function about()
    {
    	return view('test.about')->with(['x'=>'mrmr']);
    }
    public function home()
    {
        $user=auth::user();
        if($user->type==="admin")
        {
            $Loans=Loan::all();
            return view('test.home')->with(['x'=>$Loans]);
        }
        return redirect('/user/'.$user->id);
    }
}
