<?php

namespace App\Http\Controllers;

use App\Tipe;
use App\Merk;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipes = Tipe::all();
        return view('tipe.index', compact('tipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::all();
        return view('tipe.create', compact('merks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'merk_id'=>'required|',
        ]);

        $tipes = new Tipe;
        $tipes->name = $request->name;
        $tipes->merk_id = $request->merk_id;
        $tipes->save();
        
        return redirect()->route('tipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipes = Tipe::findOrFail($id);
        return view('tipe.show', compact('tipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipes = Tipe::findOrFail($id);
        return view('tipe.edit', compact('tipes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'merk_id'=>'required|',
        ]);

        $tipes = Tipe::findOrFail($id);
        $tipes->name = $request->name;
        $tipes->merk_id = $request->merk_id;
        
        $tipes->save();
        return redirect()->route('tipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipes = Tipe::findOrFail($id);
        $tipes->delete();
        return redirect()->route('tipe.index');
    }
}
