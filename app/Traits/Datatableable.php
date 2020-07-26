<?php

namespace App\Traits;


trait Datatableable
{
    public function datatable ($data)
    {
        return datatables()->of($data)
            ->addColumn('action' , function ($data) {
                $primaryKey = $data->getKeyName();
                $button = '<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id="' . $data->$primaryKey . '" class="edit btn btn-primary"><i class="fas fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="delete" data-id="' .$data->$primaryKey . '" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
