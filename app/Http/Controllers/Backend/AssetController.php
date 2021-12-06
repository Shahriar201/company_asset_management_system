<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use Illuminate\Http\Request;
use App\Model\Asset;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function view(){
        $allData = Asset::all();
        return view('backend.asset.view-asset', compact('allData'));
    }

    public function add(){
        return view('backend.asset.add-asset');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:assets'
        ]);

        $asset = new Asset();
        $asset->name = $request->name;
        $asset->category = $request->category;
        $asset->created_by = Auth::user()->id;
        $asset->save();

        return redirect()->route('assets.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){

        $editData = Asset::find($id);

        return view('backend.asset.add-asset', compact('editData'));
    }

    public function update(AssetRequest $request, $id){

        $asset = Asset::find($id);
        $asset->name = $request->name;
        $asset->category = $request->category;
        $asset->updated_by = Auth::user()->id;
        $asset->save();

        return redirect()->route('assets.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $asset = Asset::find($request->id);
        $asset->delete();

        return redirect()->route('assets.view')->with('success', 'Data deleted successfully');
    }
}
