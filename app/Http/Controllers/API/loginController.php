<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentianls=array('email'=>$request->email,'password'=>$request->password);
        if (Auth::attempt($credentianls))
        {
            $user=Auth::user();
            $status=202;
            $success['message']="Successfully Logged In";
            $success['token'] =  $user->createToken('weTrack')->accessToken;
            return response()->json(['success' => $success], $status);
        }
        else
        {
            return response()->json(['success' => 'Unauthorized Access'],401);
        }
    }
}
