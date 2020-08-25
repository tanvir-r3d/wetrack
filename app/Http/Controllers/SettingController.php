<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Traits\FileUpload;
use Toastr;
use Illuminate\Http\Request;

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
        return view('admin.setting.index');
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

}
