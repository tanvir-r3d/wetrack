<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Branch;
use App\Search\Admin;
use App;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function search(Request $request)
    {
        $query=$request->searchKey;
        $companies = Admin::search($query)->raw();
        return response()->json($companies);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee=Employee::get();
        $company=Company::get();
        $branch=Branch::get();
        return view('admin.Dashboard.dashboard',compact('employee','company','branch'));
    }

  public function local($language)
   {
    App::setlocale($language);
    Session::put('locale',$language);
    return redirect()->back();
   }

}
