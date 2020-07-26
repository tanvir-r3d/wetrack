<?php

namespace App\Traits;


trait Datatableable
{
    public function datatable ($data,$view=false,$edit=true,$delete=true)
    {
        return datatables()->of($data)
            ->addColumn('action' , function ($data) use($view,$edit,$delete) {
                $primaryKey = $data->getKeyName();
                $button="";
                if($edit===true)
                {
                $button .= '<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id="' . $data->$primaryKey . '" class="edit btn btn-primary"><i class="fas fa-edit"></i></button>';    
                $button .= '&nbsp;&nbsp;';
                
                }
                if($view===true)
                {
                    $button.='<button type="button" name="view" id="view" data-toggle="modal" data-target="#viewModal" data-id="'.$data->$primaryKey.'" class="view btn btn-info"><i class="far fa-eye"></i></button>';
                $button .= '&nbsp;&nbsp;';

                }
                if ($delete===true) 
                {
                $button .= '<button type="button" name="delete" id="delete" data-id="' .$data->$primaryKey . '" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';    
                }
                
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
