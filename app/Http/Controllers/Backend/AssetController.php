<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $asset->created_by = Auth::user()->id;
        $asset->save();

        return redirect()->route('assets.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){

        $data_id = decrypt($id);

        $editData = Category::find($data_id);

        return view('backend.category.add-category', compact('editData'));
    }

    public function update(CategoryRequest $request, $id){

        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_by = Auth::user()->id;
        $category->save();

        return redirect()->route('assets.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();

        return redirect()->route('categories.view')->with('success', 'Data deleted successfully');
    }
}
