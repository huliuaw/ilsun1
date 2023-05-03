<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class AdminTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        
        return view('Team.admin.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Team.admin.create'); 
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

            'name' => 'required',

            'country' => 'required',

            'flag'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        Team::create($request->all());
        $team = Team::where('name', 'like', $request->name)->select('teams.*')->first(); 
        //사용자 입력 name 값으로 재검색 후 여기에 파일명 등록
        $flagName = $team->id.'_flag'.time().'.'.request()->flag->getClientOriginalExtension();
        $logoName = $team->id.'_logo'.time().'.'.request()->logo->getClientOriginalExtension();
        
        $request->flag->move(public_path().'/flags',$flagName);
        $request->logo->move(public_path().'/logos',$logoName);

        $team->flag = $flagName;

        $team->logo = $logoName;

        $team->save();

        return redirect()->route('adminteams.index')

                        ->with('success','Team created successfully');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = Team::find($id); //'players.team_id', '=', 'teams.id'
        $players = DB::table('players')
        ->join('teams', 'players.team_id', '=', 'teams.id')
        ->get();
        return view('Team.admin.show',compact('teams','players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::find($id);
    
        return view('Team.admin.edit',compact('teams'));
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
        request()->validate([
            'name' => 'required|min:4',
            'country' => 'required|min:4',
        ]);
        Team::find($id)->update(request(['name', 'country']));
        //Team::find($id)->update($request->all());
            return redirect()->route('adminteams.index')
    
                            ->with('success','Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();
    
        return redirect()->route('adminteams.index')

                        ->with('success','Team deleted successfully');
    }
}
