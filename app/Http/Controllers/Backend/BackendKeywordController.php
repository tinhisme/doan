<?php

namespace App\Http\Controllers\Backend;

use App\Models\Keyword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackendKeywordRequest;

class BackendKeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keywords = Keyword::paginate(10);
        return view('backend.keyword.index',compact('keywords'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.keyword.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackendKeywordRequest $request)
    {
        //
        $keyword = new Keyword;
        $keyword->fill($request->all());
        $keyword->slug = Str::of($request->name)->slug('-');
        $keyword->save();
        return redirect()->route('get_backend.keyword.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $keyword = Keyword::find($id);
        return view('backend.keyword.edit', compact('keyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackendKeywordRequest $request, $id)
    {
        //
        $keyword = Keyword::find($id);
        $keyword->fill($request->all());
        $keyword->slug = Str::of($request->name)->slug('-');
        $keyword->update();
        return redirect()->route('get_backend.keyword.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $keyword  = Keyword::find($id);
        $keyword->delete();
    }

    public function hot($id)
    {
        $keyword = Keyword::find($id);
        $keyword->hot = ! $keyword->hot;
        $keyword->save();
        return redirect()->route('get_backend.keyword.index');
    }
}
