<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Type;

use Alert;

class CategoryController extends Controller
{
    
    public function index(){
        //
    }

    public function listCatgories($id)
    {
        $categories = Category::where('type_id',$id)->get();
        $type=Type::find($id);
        return view('categories.index')->with('categories',$categories)->with('type',$type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $type = Type::find($id);
        return view('categories.create')->with('type',$type);
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        Alert::success('Success','Nouvelle categorie à été ajouté avec success');
        return redirect(route('category.listCatgories',$request->type_id));
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
