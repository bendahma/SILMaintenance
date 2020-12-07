<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\Mark;
use Alert;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        return view('Mark.index')->with('marks',$marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Mark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark = Mark::create($request->all());

        Alert::success('Success','Une nouvelle marque à été ajout avec success');

        return redirect(route('marque.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $mark = Mark::find($id);

        return view('Mark.create')->with('mark',$mark);
    }

    
    public function update(Request $request, $id)
    {
        $mark = Mark::find($id)->update($request->only(['mark','updated_at']));

        Alert::success('Success','La marque à été mettre à jours avec success');

        return redirect(route('marque.index'));   
    }
}
