<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait FileUpload
{
    public function VerifyStore(Request $request,$fieldname,$directory='unknown',$FileName='unknown')
    {
        $file=$request->file($fieldname);
        if($file)
        {
            if (!$file->isValid()) {

                $notification = array(
                    'title' =>'Oops',
                    'message' => 'Careful! Only Upload Image',
                    'alert-type' => 'warning',
                );
                return redirect()->back()->with($notification);

            }
            $ext=$file->getClientOriginalExtension();
            $path=public_path($directory);
            $name=$FileName.'.'.$ext;
            $file->move($path, $name);
            return $request->$fieldname=$name;
        }
        else{
            return $request->$fieldname=null;
        }

    }
}
