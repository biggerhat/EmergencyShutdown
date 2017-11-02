<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KosTeam;
use App\KosPlayer;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class KosController extends Controller
{
    public function __construct()
    {
        $this->middleware('hofadmin', ['only' => ['getRegistrationToggle',
            'setRegistrationToggle',
            'getPasswordReset',
            'storePasswordReset'
            ]]);
    }

    public function getIndex()
    {
        return view('kos.index');
    }

    public function getTeams()
    {
        $teams['teams'] = KosTeam::with('players')->get();
        $teams['count'] = KosTeam::count();
        return view('kos.teamlist',compact('teams'));
    }

    public function getRegHome()
    {
        $team_count = KosTeam::count();
        $status = DB::table('statuses')->where('service', '=', 'kos_registration')->first();
        if($status->status == '0')
        {
            return 'Registration is Currently Closed, Please Check Back Monday, September 11th at 11AM CST';
        }
        if($team_count >= 40)
        {
            flash('Unfortunately we are at our team cap of 40. New Teams Cannot Be Registered');
            return view('kos.reghome');
        }
        return view('kos.reghome');
    }

    public function getRegTeam()
    {
        $team_count = KosTeam::count();
        if($team_count >= 40)
        {
            flash('Unfortunately we are at our team cap of 40. New Teams Cannot Be Registered');
            return view('kos.reghome');
        }
        return view('kos.regteam');
    }

    public function getRegPlayer()
    {
        return view('kos.regplayer');
    }

    public function storeFreeAgent(request $request)
    {
        $player = $request->all();
        $player['free_agent'] = 1;
        $player['name'] = filter_var($player['name'], FILTER_SANITIZE_STRING);
        $player['aka'] = filter_var($player['aka'], FILTER_SANITIZE_STRING);
        $player['pref_corp'] = filter_var($player['pref_corp'], FILTER_SANITIZE_STRING);
        $player['pref_runn'] = filter_var($player['pref_runn'], FILTER_SANITIZE_STRING);
        KosPlayer::create($player);
        flash('You\'ve been added to the Free Agent roster.');
        return redirect('kos/free_agents');
    }


    public function storeTeam(request $request)
    {
        $team = $request->all();
        $team_count = KosTeam::count();
        if($team_count >= 40)
        {
            flash('Unfortunately we are at our team cap of 40. New Teams Cannot Be Registered');
            return view('kos.reghome');
        }
        if($team['team_pass1'] != $team['team_pass2'])
        {
            flash('Your passwords do not match. Please try again.')->important();
            return view('kos.regteam');
        }
        else {
            $team['password'] = bcrypt($team['team_pass1']);
            $team['name'] = filter_var($team['name'], FILTER_SANITIZE_STRING);
            $team = KosTeam::create($team);
            $request->session()->put('team_id', $team->id);
            $request->session()->put('team_pass', $team['password']);
            flash('Your team has been created. Add your first player (probably yourself).');
            return redirect('kos/teams/' . $team->id . '/add_player');
        }

    }

    public function getTeamAddPlayer(request $request, $id)
    {
        $team = KosTeam::with('players')->findorFail($id);
        if($request->session()->get('team_pass') == $team['password'])
        {
            $player_count = count($team['players']);
            if($player_count >= 4)
            {
                flash('You have reached your max team players (4), any you try to add will be ignored.');
            }
            return view('kos.addplayer',compact('team'));
        }
        else
        {
            return redirect('kos');
        }
    }
    public function storeTeamAddPlayer(request $request, $id)
    {
        $team = KosTeam::with('players')->findorFail($id);
        if($request->session()->get('team_pass') == $team['password'])
        {
            $player_count = count($team['players']);
            if($player_count >= 4)
            {
                return redirect('kos/teams');
            }
            $player = $request->all();
            $player['name'] = filter_var($player['name'], FILTER_SANITIZE_STRING);
            $player['aka'] = filter_var($player['aka'], FILTER_SANITIZE_STRING);
            $player['pref_corp'] = filter_var($player['pref_corp'], FILTER_SANITIZE_STRING);
            $player['pref_runn'] = filter_var($player['pref_runn'], FILTER_SANITIZE_STRING);
            $team->players()->create($player);
            flash('Your player has been added.');
            return redirect('kos/teams/' . $id);
        }
        else
        {
            return redirect('kos');
        }
    }

    public function getTeamLogin(request $request, $id)
    {
        $team = KosTeam::findorFail($id);
        if($request->session()->get('team_id') == $id)
        {
            return redirect('kos/teams/' . $id);
        }
        else return view('kos.teamlogin',compact('team'));
    }

    public function logTeamIn(request $request, $id)
    {
        $team = KosTeam::findorFail($id);
        $pass_check = $request->all();
        if(Hash::check($pass_check['team_password'], $team['password']))
        {
            $request->session()->put('team_id', $team->id);
            $request->session()->put('team_pass', $team['password']);
            flash('Welcome. Feel free to edit your team.')->important();
            return redirect('kos/teams/' . $id);
        }
        else return view('kos.teamlogin',compact('team'));
    }

    public function getTeamEdit(request $request, $id)
    {
        $team = KosTeam::with('players')->findorFail($id);
        if($request->session()->get('team_pass') == $team['password'])
        {
            return view('kos.teampage', compact('team'));
        }
        else return view('kos.teamlogin',compact('team'));
    }

    public function updateTeam(request $request, $id)
    {
        $team = KosTeam::with('players')->findorFail($id);
        if($request->session()->get('team_pass') == $team['password'])
        {
            $new_team = $request->all();
            $new_team['name'] = filter_var($new_team['name'], FILTER_SANITIZE_STRING);
            $team->update($new_team);
            $team = KosTeam::with('players')->findorFail($id);
            flash('Your team has been updated.');
            return view('kos.teampage', compact('team'));
        }
        else return view('kos.teamlogin',compact('team'));
    }

    public function deletePlayer(request $request, $id, $player_id)
    {
        $team = KosTeam::with('players')->findorFail($id);
        if($request->session()->get('team_pass') == $team['password'])
        {
            $player = KosPlayer::where('id', '=', $player_id)->get()->first();
            if($player['kos_team_id'] == $id)
            {
                if($player['free_agent'] == '0')
                {
                    $player->update(array('free_agent' => '1', 'kos_team_id' => ''));
                }
                else
                {
                    $player->delete();
                }
                $team = KosTeam::with('players')->findorFail($id);
                return view('kos.teampage', compact('team'));
            }
            else return view('kos.teampage', compact('team'));

        }
        else return view('kos.teamlogin',compact('team'));

    }

    public function getFreeAgents()
    {
        $agents = KosPlayer::where('free_agent', '=', '1')->get();
        return view('kos.freeagents', compact('agents'));
    }

    public function getAddFreeAgent(request $request, $id)
    {
        $agent = KosPlayer::findorFail($id);
        $teams = KosTeam::lists('name','id');
        return view('kos.addfreeagent', compact('agent', 'teams'));
    }

    public function storeAddFreeAgent(request $request, $id)
    {
        $team_info = $request->all();
        $team = KosTeam::with('players')->findorFail($team_info['team']);
        $player = KosPlayer::findorFail($id);
        if(Hash::check($team_info['team_password'], $team['password']))
        {
            if(($player['free_agent'] == '1') && (count($team['players']) < 4))
            {
                $player->update(array('free_agent' => '0','kos_team_id' => $team['id']));
                flash('Player has been added to your team');
                return redirect('kos/free_agents');
            }
            else
            {
                flash('Could not add player to team.');
                return redirect('kos/free_agents');
            }
        }
        else
        {
            flash('Incorrect Team Password');
            return redirect('kos/free_agents/add/'. $id);
        }

    }

    public function getRegistrationToggle()
    {
        return view('kos.regtoggle');
    }

    public function setRegistrationToggle(request $request)
    {
        $status = $request->all();
        DB::table('statuses')
            ->where('service','kos_registration')
            ->update(['status' => $status['toggle']]);
        flash('Done.');
        return view('kos.regtoggle');
    }

    public function getPasswordReset()
    {
        $teamlist = KosTeam::lists('name','id');
        return view('kos.passwordreset', compact('teamlist'));
    }

    public function storePasswordReset(request $request)
    {
        $team = KosTeam::findorFail($request['team']);
        $team['password'] = bcrypt($request['team_password']);
        $team->update();
        flash('Team Password Updated');
        return redirect('kos/password');



    }

    public function getCSV()
    {
        header("Content-Type:application/csv");
        header("Content-Disposition:attachment;filename=kos.csv");
        $data = KosTeam::with('players')->get();
        $data = $data->toArray();
        //return $data;
        $teams['count'] = KosTeam::count();

        # Generate CSV data from array
        $fh = fopen('php://temp', 'rw'); # don't create a file, attempt
        # to use memory instead

        # write out the headers
        fputcsv($fh, array('Team Name','Player 1','Player 2','Player 3','Player 4'));


        # write out the data
        foreach ( $data as $row ) {
            $row_contents['name'] = $row['name'];
            $i = 1;
            foreach($row['players'] as $player)
            {
                $row_contents['player'.$i] = $player['name'] . ' (' . $player['aka'] . ')';
                $i++;
            }
            fputcsv($fh, $row_contents);
            for($i=1;$i<5;$i++)
            {
                $row_contents['player'.$i] = '';
            }
        }
        rewind($fh);
        $csv = stream_get_contents($fh);
        fclose($fh);

        return $csv;
    }
}
