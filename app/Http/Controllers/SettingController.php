<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Config;
use Toastr;
use Illuminate\Http\Request;
use Auth;
class SettingController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if ($user->can('view_settings')) {
        return view('admin.setting.index');
       }
       else{
        abort('403');
       }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $requestedData=array_filter($request->all(), function($value) {
            return !is_null($value);
        });
        if($request->hasFile('site_logo'))
        {
            $requestedData['site_logo']=$this->VerifyStore($request,'site_logo','/setting','customLogo');
        }
        if($request->hasFile('site_favicon'))
        {
            $requestedData['site_favicon']=$this->VerifyStore($request,'site_favicon','/setting','customFav');
        }
        $setting=Setting::find(1);
        $setting->fill($requestedData)->save();
        Toastr::success('Congratulation! Settings Updated' , 'App Setting' , ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function mail(Request $request)
    {
        $setting =Setting::find(1);
        $setting->site_mail = $request->mail_username;
        $setting->mail_pass=encrypt($request->mail_password);
        $setting->save();
        Toastr::success('Congratulation! Settings Updated' , 'App Setting' , ["positionClass" => "toast-top-right"]);
        return redirect()->back();
//        Config::set('mail.username',$request->mail_username);
//        Config::set('mail.password',$request->mail_password);
//        echo(Config::get('mail.username'));
//        echo "<br>";
//        echo(Config::get('mail.password'));
    }

}
