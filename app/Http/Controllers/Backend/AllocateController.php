<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Allocate;
use App\Model\Asset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllocateController extends Controller
{
    public function view(){

        $data['allData'] = Allocate::all();

        return view('backend.allocate.view-allocate', $data);
    }

    public function add(){

        // $data['asset_id'] = Allocate::all();
        $data['users'] = User::where('user_type', 'Employee')->get();
        $data['assets'] = Asset::all();

        return view('backend.allocate.add-allocate', $data);
    }

    public function store(Request $request){
        // dd($request->all());

        $validateData = $request->validate([
            'employee_id' => 'required',
            'asset_id' => 'required'
        ]);

        $allocate = new Allocate();
        $allocate->employee_id = $request->employee_id;
        $allocate->asset_id = $request->asset_id;
        $allocate->created_by = Auth::user()->id;
        $allocate->save();

        return redirect()->route('allocates.view')->with('success', 'Data inserted successfully');
    }
}
