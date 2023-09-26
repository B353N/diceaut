<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TeamRequest;
use App\Models\Photo;
use App\Models\Language;

class TeamController extends Controller
{
    //

    public function index(Request $request)
    {

        $langs = Language::all()->sortBy('id');
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['team'] = Team::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('team.team-index', $data, compact('langs'));
    }

    public function create()
    {
        $langs = Language::all()->sortBy('id');
        return view('team.team-create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        Team::create($input);

        return back()->with('team_success', 'Team created successfully!');
    }



    public function edit(Team $team)
    {
        return view('team.team-edit', compact('team'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $team->update($input);

        return back()->with('team_success', 'Team updated successfully!');
    }

    public function delete_team(Request $request, Team $team)
    {


        if (isset($request->delete_all) && !empty($request->checkbox_array)) {
            $team = Team::findOrFail($request->checkbox_array);
            foreach ($team as $teams) {
                $teams->delete();
            }
            return back()->with('team_success', 'Team/s deleted successfully!');
        } else {
            return back();
        }

        $team = Team::findOrFail($request->checkbox_array);
        foreach ($team as $teams) {
            $teams->delete();
        }

        return back();
        //return 'works';
    }
}
