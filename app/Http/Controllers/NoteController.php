<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cocktail_name = $request->input('cocktail_name');
        return view('notes.create',compact('cocktail_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note;
        $user_id = auth()->id();

        $note->user_id = $user_id;
        $note->cocktail_name = $request->input('cocktail_name');
        $note->place = $request->input('place');
        $note->memo = $request->input('memo');
        $note->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        $user_id = auth()->id();
        if($user_id == $note->user_id){
            return view('notes.show',compact('note'));
        }else{
            // 本人以外のカクテルログに行けなくする
            $notes = DB::table('notes')
                ->where('user_id',$user_id)
                ->orderBy('created_at','desc')
                ->paginate(10);
        
            return view('home',compact('notes'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.edit',compact('note'));
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
        $note = Note::find($id);
        $user_id = auth()->id();

        $note->user_id = $user_id;
        $note->cocktail_name = $request->input('cocktail_name');
        $note->place = $request->input('place');
        $note->memo = $request->input('memo');
        $note->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();

        return redirect('/home');
    }
}
