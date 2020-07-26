<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Validator;
use Toastr;
use JsValidator;
class CompanyController extends Controller
{

    public function index()
    {
        $company=new Company;
        if(request()->ajax())
        {
            return $company->datatable(Company::latest()->get());
//            return datatables()->of(Company::latest()->get())
//            ->addColumn('action',function($data){
//                $button='<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id="'.$data->com_id.'" class="edit btn btn-primary"><i class="fas fa-edit"></i></button>';
//                $button.='&nbsp;&nbsp;';
//                $button.='<button type="button" name="delete" id="delete" data-id="'.$data->com_id.'" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
//                return $button;
//            })
//            ->rawColumns(['action'])
//            ->make(true);
        }
        $validator=JsValidator::make($company->validation());
        return view('admin.company.index',['validator'=>$validator]);
    }


    public function store(Request $request)
    {
        $company = new Company;
        $validation=Validator::make($request->all(),$company->validation());
          if ($validation->fails()) {
        return back()->withInput()->withErrors($validation);
      }
            $company->com_name=$request->name;
            $company->com_details=$request->details;
            if($request->hasFile('logo'))
            {
                $ext = $request->file('logo')->getClientOriginalExtension();
                $path = public_path('images/company/');
                $name = 'logo' . time() . '.' . $ext;
                $request->file('logo')->move($path, $name);
                $company->com_logo = $name;
            }
            else
            {
                $company->com_logo = '';
            }
            $company->save();
        Toastr::success('Congratulation! New Company Information Saved Successfully', 'Company',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function edit(Request $request)
    {
        $id=$request->id;
        $company=Company::find($id);
        return response()->json($company);
    }

    public function update(Request $request, $id)
    {
        $company=New Company;
        $validation=Validator::make($request->all(),$company->validation());
          if ($validation->fails()) {
        return back()->withInput()->withErrors($validation);
      }
        $company=Company::find($id);
            $company->com_name=$request->name;
            $company->com_details=$request->details;
            if($request->hasFile('logo'))
            {
                if($company->com_logo!='')
                {
                    unlink(public_path('images/company/').$company->com_logo);
                }
                    $ext = $request->file('logo')->getClientOriginalExtension();
                    $path = public_path('images/company/');
                    $name = 'logo' . time() . '.' . $ext;
                    $request->file('logo')->move($path, $name);
                    $company->com_logo = $name;
            }
        $company->save();
        Toastr::success('Congratulation! New Company Information Updated Successfully', 'Company',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $company=Company::find($id);
        if($company->com_logo!='')
        {
            unlink(public_path('images/company/').$company->com_logo);
        }
        Company::where('com_id',$id)->delete();
        $status=200;
        $response=[
            'status'=>$status,
            'message'=>'Successfully Deleted',
        ];
        return response()->json($response,$status);
    }
}
