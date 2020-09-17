<?php
namespace App\Http\Controllers;

use App\Models\ArchiveBoard;
use App\Models\Field;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Folder::all();

        return view('folders.index', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cupboards=ArchiveBoard::all();
        $fields=Field::where('archive_board_id',$cupboards->first()->id)->get();
        return view('folders.create',compact('cupboards','fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'field'=>'required',

        ]);

        $folder = new Folder([
            'name' => $request->get('name'),
            'field_id' => $request->get('field'),
        ]);
        $folder->save();
        return redirect('/folder')->with('success', 'folder saved!');
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
    public function search(Request $request)
    {
        $search = $request->input('q');

        $folders = Folder::where('id',$search)->OrWhere('name', 'LIKE', "%$search%")->get();

        return view('folders.index', compact('folders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $folder = Folder::find($id);
        $cupboards=ArchiveBoard::all();

        $fields=Field::where('archive_board_id',$cupboards->first()->id)->get();

        return view('folders.edit', compact('folder','cupboards','fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'field'=>'required',

        ]);

        $folder =Folder::find($id);
        $folder->name=$request->get('name');
        $folder->field_id=$request->get('field');
        $folder->save();
        return redirect('/folder')->with('success', 'folder updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $folder = Folder::find($id);
        $folder->delete();
        return redirect('/folder')->with('success', 'Folder deleted!');
    }
}
