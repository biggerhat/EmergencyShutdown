<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\FanDraft;
use App\FdraftPlayer;
use App\FdraftTeam;

class FanDraftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'getTeam',
            'storeTeam',
            'updateTeam',
            'getElite']]);

        $this->middleware('fdraftadmin', ['only' => ['editDraft',
            'createDraft',
            'storeDraft',
            'updateDraft',
            'createPlayer',
            'storePlayer',
            'editPlayer',
            'updatePlayer',
            'getAdminPlayers',
            'getCurrent',
            'getAdminTeams',
            'makeElite',
            'undoElite',
            'getAdminElite',
            'getAdminAddTeam',
            'storeAdminAddTeam',
            'getAdmin',
            'getAdminElite',
        ]]);
    }

    public function getIndex()
    {
        $draft = FanDraft::latest()->get()->first();
        return view('fandraft.index',compact('draft'));
    }

    public function createDraft()
    {
        return view('fandraft.create_draft');
    }

    public function storeDraft(request $request)
    {
        $draft = new FanDraft;
        $draft::create($request->all());
        flash('Draft Created');
        return redirect('/fantasy/admin');

    }

    public function editDraft($id)
    {
        $draft = FanDraft::findOrFail($id);
        return view('fandraft.edit_draft',compact('draft'));
    }

    public function updateDraft(request $request, $id)
    {
        $draft = FanDraft::findOrFail($id);
        $draft->update($request->all());
        flash($draft->name . ' Updated!');
        return redirect('/fantasy/admin');
    }

    public function getPlayers()
    {
        $draft = FanDraft::latest()->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft->id)->orderBy('cost','desc')->orderBy('name','asc')->get();
        return view('fandraft.players',compact('draft','players'));
    }

    public function createPlayer()
    {
        return view('fandraft.create_player');
    }

    public function storePlayer(request $request)
    {
        $draft = FanDraft::latest()->where('open','=','0')->get()->first();
        $player = $request->all();
        $player['fan_draft_id'] = $draft['id'];
        FdraftPlayer::create($player);
        flash('Player Created');
        return redirect('/fantasy/admin');
    }

    public function editPlayer($id)
    {
        $player = FdraftPlayer::findOrFail($id);
        return view('fandraft.edit_player',compact('player'));
    }

    public function updatePlayer(request $request, $id)
    {
        $player = FdraftPlayer::findOrFail($id);
        $player->update($request->all());

        $draft = FanDraft::latest()->get()->first();
        $teams = FdraftTeam::with('players')->where('fan_draft_id','=',$draft['id'])->get();
        foreach($teams as $team)
        {
            $score = 0;
            foreach($team['players'] as $player)
            {
                $score = $score + $player['score'];
            }
            $team_update = FdraftTeam::findorFail($team['id']);
            $team_update->update(array('score' => $score));
        }




        flash('Player Updated!');
        return redirect('/fantasy/admin');
    }

    public function getTeam()
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->get()->first();
        $team = FdraftTeam::with('players')->where('user_id','=',$user['id'])->where('fan_draft_id','=',$draft['id'])->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->orderBy('cost','desc')->get();
        if($team) {
            return view('fandraft.mydraft', compact('draft','team','players'));
        }
        else {
            return view('fandraft.newmydraft', compact('draft','team','players'));
        }

    }

    public function storeTeam(request $request)
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->where('open','=','0')->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->orderBy('cost','desc')->get();
        $team = $request->all();
        $count = 0;
        $double_check = false;
        for($i=0;$i<$draft['team_lim'];$i++)
        {
            for($j=0;$j<$draft['team_lim'];$j++)
            {
                if(($i != $j) && ($team['players'][$i] == $team['players'][$j]))
                {
                    $double_check = true;
                }
            }
        }
        if($double_check)
        {
            flash('You cannot have 2 of the same player on the same team. Please try again.')->important();
            return view('fandraft.newmydraft', compact('draft','team','players'));
        }
        foreach($team['players'] as $player)
        {
            $cost_check = FdraftPlayer::findorFail($player);
            $count = $count + $cost_check['cost'];
        }
        if($count > $draft['creds'])
        {
            flash('The team you selected costs more than ' . $draft['creds'] . ' Credits. Please try again.')->important();
            return view('fandraft.newmydraft', compact('draft','team','players'));
        }
        else
        {
            $team['name'] = filter_var($team['name'], FILTER_SANITIZE_STRING);
            $team['fan_draft_id'] = $draft['id'];
            $team['user_id'] = $user['id'];
            $team['cost'] = $count;
            $new_team = new FdraftTeam;
            $new_team = $new_team::create($team);
            $new_team->players()->sync($team['players']);
            flash('Your team has been created!');
            return redirect('fantasy/my_draft');
        }

    }

    public function updateTeam(request $request)
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->where('open','=','0')->get()->first();
        $team = FdraftTeam::with('players')->where('user_id','=',$user['id'])->where('fan_draft_id','=',$draft['id'])->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->orderBy('cost','desc')->get();
        $new_team = $request->all();
        $count = 0;
        $double_check = false;
        for($i=0;$i<$draft['team_lim'];$i++)
        {
            for($j=0;$j<$draft['team_lim'];$j++)
            {
                if(($i != $j) && ($new_team['players'][$i] == $new_team['players'][$j]))
                {
                    $double_check = true;
                }
            }
        }
        if($double_check)
        {
            flash('You cannot have 2 of the same player on the same team. Please try again.')->important();
            return view('fandraft.mydraft', compact('draft','team','players'));
        }

        foreach($new_team['players'] as $player)
        {
            $cost_check = FdraftPlayer::findorFail($player);
            $count = $count + $cost_check['cost'];
        }
        if($count > $draft['creds'])
        {
            flash('The team you selected costs more than ' . $draft['creds'] . ' Credits. Please try again.')->important();
            return view('fandraft.mydraft', compact('draft','team','players'));
        }
        else
        {
            $new_team['cost'] = $count;
            flash('Team Updated!');
            $new_team['name'] = filter_var($new_team['name'], FILTER_SANITIZE_STRING);
            $team->update($new_team);
            $team->players()->sync($new_team['players']);
            return redirect('fantasy/my_draft');
        }
    }

    public function getTeams()
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->get()->first();
        $teams = FdraftTeam::with('user')->where('fan_draft_id','=',$draft['id'])->orderBy('score','desc')->orderBy('cost','asc')->get();
        return view('fandraft.teams',compact('teams','draft','user'));
    }

    public function getProfile($id)
    {
        $player = FdraftPlayer::findorFail($id);
        return view('fandraft.profile',compact('player'));
    }

    public function addWritein()
    {
        return view('fandraft.writein');
    }

    public function storeWritein(request $request)
    {
        $draft = FanDraft::latest()->get()->first();
        $player = $request->all();
        $player['name'] = filter_var($player['name'], FILTER_SANITIZE_STRING);
        $player['cost'] = $draft['writein_value'];
        $player['fan_draft_id'] = $draft['id'];
        FdraftPlayer::create($player);
        flash('Thank you! Your write-in has been submitted.');
        return redirect('fantasy/players');
    }

    public function getAdminPlayers()
    {
        $draft = FanDraft::latest()->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft->id)->orderBy('name','asc')->paginate(10);
        return view('fandraft.adminplayers',compact('draft','players'));
    }

    public function getAdmin()
    {
        $draft = FanDraft::latest()->get()->first();
        return view('fandraft.adminindex',compact('draft'));
    }

    public function getCurrent()
    {
        $draft = FanDraft::latest()->get()->first();
        return view('fandraft.edit_draft',compact('draft'));
    }

    public function getStats()
    {
        $draft = FanDraft::latest()->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->get();
        $n = 0;
        foreach($players as $player)
        {
            $counts['players'][$n]['name'] = $player['name'];
            $counts['players'][$n]['cost'] = $player['cost'];
            $counts['players'][$n]['score'] = $player['score'];
            $counts['players'][$n]['count'] = DB::table('fdraft_player_fdraft_team')->where('fdraft_player_id','=',$player['id'])->count();
            $n++;
        }
        usort($counts['players'], function($a, $b) {
            return $a['count'] < $b['count'];
        });


        return view('fandraft.stats',compact('draft','counts'));
    }

    public function getAdminTeams()
    {
        $draft = FanDraft::latest()->get()->first();
        $teams = FdraftTeam::with('user')->where('fan_draft_id','=',$draft['id'])->orderBy('score','desc')->orderBy('cost','asc')->get();
        return view('fandraft.adminteams',compact('teams','draft'));
    }

    public function makeElite($id)
    {
        $team = FdraftTeam::findorFail($id);
        $team->update(array('elite' => '1'));
        flash($team['name'] . ' has been made ELITE');
        return redirect('fantasy/admin_teams');
    }

    public function undoElite($id)
    {
        $team = FdraftTeam::findorFail($id);
        $team->update(array('elite' => '0'));
        flash($team['name'] . ' has been made NOT ELITE');
        return redirect('fantasy/admin_teams');
    }

    public function getAdminElite()
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->get()->first();
        $teams = FdraftTeam::with('user')->where('fan_draft_id','=',$draft['id'])->where('elite','=','1')->orderBy('score','desc')->orderBy('cost','asc')->get();
        return view('fandraft.teams',compact('teams','draft','user'));
    }

    public function getElite()
    {
        $user = Auth::user();
        $draft = FanDraft::latest()->get()->first();
        $teams = FdraftTeam::with('user')->where('fan_draft_id','=',$draft['id'])->where('elite','=','1')->orderBy('score','desc')->orderBy('cost','asc')->get();
        $team_check = FdraftTeam::where('user_id','=',$user['id'])->first();
        if($team_check['elite'] != '1')
        {
            return redirect('fantasy');
        }
        else
        {
            return view('fandraft.teams',compact('teams','draft','user'));
        }

    }

    public function getAdminAddTeam()
    {
        $draft = FanDraft::latest()->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->orderBy('cost','desc')->get();
            return view('fandraft.adminaddteam', compact('draft','players'));
    }

    public function storeAdminAddTeam(request $request)
    {
        $draft = FanDraft::latest()->where('open','=','0')->get()->first();
        $players = FdraftPlayer::where('fan_draft_id','=',$draft['id'])->orderBy('cost','desc')->get();
        $team = $request->all();
        $count = 0;
        $double_check = false;
        for($i=0;$i<$draft['team_lim'];$i++)
        {
            for($j=0;$j<$draft['team_lim'];$j++)
            {
                if(($i != $j) && ($team['players'][$i] == $team['players'][$j]))
                {
                    $double_check = true;
                }
            }
        }
        if($double_check)
        {
            flash('You cannot have 2 of the same player on the same team. Please try again.')->important();
            return view('fandraft.adminaddteam', compact('draft','team','players'));
        }
        foreach($team['players'] as $player)
        {
            $cost_check = FdraftPlayer::findorFail($player);
            $count = $count + $cost_check['cost'];
        }
        if($count > $draft['creds'])
        {
            flash('The team you selected costs more than ' . $draft['creds'] . ' Credits. Please try again.')->important();
            return view('fandraft.adminaddteam', compact('draft','team','players'));
        }
        else
        {
            $team['name'] = filter_var($team['name'], FILTER_SANITIZE_STRING);
            $team['fan_draft_id'] = $draft['id'];
            $team['cost'] = $count;
            $new_team = new FdraftTeam;
            $new_team = $new_team::create($team);
            $new_team->players()->sync($team['players']);
            flash('Your team has been created!');
            return redirect('fantasy/admin');
        }

    }
}
