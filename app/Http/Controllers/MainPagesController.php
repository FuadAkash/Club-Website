<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function main(){

        $main = Main::first();
        return view('main', compact('main'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'icon_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for image files
            'ic_title' => 'required|string',
            'ic_sub_title' => 'required|string',
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'bc_img' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'bc_imga' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'bc_imgb' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $main = Main::first();
        $main->ic_title = $request->ic_title;
        $main->ic_sub_title = $request->ic_sub_title;
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('icon_img')){
            $iconimg_filea = $request->file('icon_img');
            $iconimg_filea->storeAs('public/img/','icon_img.' . $iconimg_filea->getclientOriginalExtension());
            $main->icon_img= 'storage/img/icon_img.' . $iconimg_filea->getclientOriginalExtension();
        }

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img.' . $img_file->getclientOriginalExtension());
            $main->bc_img= 'storage/img/bc_img.' . $img_file->getclientOriginalExtension();
        }

        if($request->file('bc_imga')){
            $img_filea = $request->file('bc_imga');
            $img_filea->storeAs('public/img/','bc_imga.' . $img_file->getclientOriginalExtension());
            $main->bc_imga= 'storage/img/bc_imga.' . $img_file->getclientOriginalExtension();
        }

        if($request->file('bc_imgb')){
            $img_fileb = $request->file('bc_imgb');
            $img_fileb->storeAs('public/img/','bc_imgb.' . $img_file->getclientOriginalExtension());
            $main->bc_imgb= 'storage/img/bc_imgb.' . $img_file->getclientOriginalExtension();
        }


        $main->save();

        return redirect()->route('main.update')->with('success', 'Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
