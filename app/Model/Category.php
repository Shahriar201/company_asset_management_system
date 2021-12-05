<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use SoftDeletes;

    public function data_store($request){
        $data_list = [
            'name' => $request->name,
            'created_by' => Auth::user()->id
        ];

        $data = DB::table('categories')->insert($data_list);

        return $data;
    }

    public function update_category($request = NULL, $id = NULL){
        // dd($request->all());
        $update_list = [
            'name' => $request->name,
            'created_by' => Auth::user()->id
        ];

        $data = DB::table('categories')->where('id', $id)->update($update_list);

        return $data;
    }
}
