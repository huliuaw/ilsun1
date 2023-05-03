<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class AdminPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = DB::table('players')
        ->join('teams','players.team_id', '=', 'teams.id')
        ->select('players.Pname', 'teams.name','players.id', 'players.photo')
        ->get();
        //ddd($players);
      
      return view('Player.admin.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all(); {
        $select=[];
            foreach($teams as $team){
                $select[$team->id]= $team->name;
            }
        }
        return view('Player.admin.create',compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'Pname' => 'required',
            'team_id' => 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Player::create($request->all());
        $player = Player::where('Pname', 'like', $request->Pname)->select('players.*')->first();
        //select * from `players`where Pname like `$Pname`
        $photoName = $player->id.'_photo'.time().'.'.request()->photo->getClientOriginalExtension();
        //dd($photoName);
        $request->photo->move(public_path().'/photos',$photoName);
        $player->photo = $photoName;
        $player->save();
        return redirect()->route('adminplayers.index')

                        ->with('success','Player created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { //team_id 로 검색해야함
        $players = DB::table('players')
        ->join('teams','players.team_id', '=', 'teams.id')
        ->select('players.Pname', 'teams.name','players.id', 'players.photo')
        ->where('players.team_id', '=', $id)
        ->first();
        
        return view('Player.admin.show',compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {

        Player::find($id)->delete();

        return redirect()->route('adminplayers.index')

                        ->with('success','Player deleted successfully');

    }
}
