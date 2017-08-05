<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ballot;
use App\Nominee;
use App\Voter;
use App\Vote;
use App\CommitteeKey;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;

/**
 * Class HofController
 * @package App\Http\Controllers
 */
class HofController extends Controller
{

    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {
        $this->middleware('hofadmin', ['only' => ['editBallot',
            'updateBallot',
            'createBallot',
            'storeBallot',
            'createNominee',
            'storeNominee',
            'editNominee',
            'updateNominee',
            'createCommitteeKey',
            'getCreateCommitteeKey',
            'getCommitteeList',
            'getNomineeList',
            'getBallotList',
            'getAdmin',
            'getCommResults',
            'getPublicResults']]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('hof.index');
    }

    public function getMembers()
    {
        $count = Nominee::where('member','=','1')->count();
        if($count == 0)
        {
            return view('hof.nomembers');
        } else {
            $members = Nominee::where('member','=','1')->get();
            return view('hof.members', compact('members'));
        }


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNominees()
    {
        $count = Ballot::latest()->where('closed','=','0')->count();
        if($count == 0) {
            return view('hof.noballot');
        }
        else {
            $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
            return view('hof.nominees', compact('ballot'));
        }

    }

    public function getVote()
    {
        $count = Ballot::latest()->where('closed','=','0')->count();
        if($count == 0) {
            return view('hof.noballot');
        }
        else {
            $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
            return view('hof.vote', compact('ballot'));
        }
    }

    public function submitVote(Request $request)
    {
        $nominees = $request['nominees'];
        $count = count($nominees);
        $ip = $request->ip();
        $votes = $request->all();
        $votes['voter_ip'] = $ip;
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $votes['ballot'] = $ballot->id;
        if($count == 0) {
            return $this->getVote();
        } else if ($count > 12) {
            flash('You cannot vote for more than 12 nominees.')->important();
            return redirect('hof/vote');
        } else {
            $ipcheck = Voter::where('ballot','=',$ballot->id)->where('voter_ip','=',$votes['voter_ip'])->count();
            if($ipcheck == 0)
            {
                $voter = new Voter;
                $voter = $voter::create($votes);
                foreach ($nominees as $nominee)
                {
                    $vote = new Vote;
                    $nom['vote'] = $nominee;
                    $nom['ballot'] = $ballot['id'];
                    $nom['voter_id'] = $voter->id;
                    $vote::create($nom);
                }
            }
            else {

                return redirect('hof/');
            }

            flash()->success('Thank you for voting!');
            return redirect('hof/');
        }
    }

    public function getCommVote()
    {
        $count = Ballot::latest()->where('closed','=','0')->count();
        if($count == 0) {
            return view('hof.noballot');
        }
        else {
            $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
            return view('hof.comm_vote', compact('ballot'));
        }
    }

    public function submitCommVote(Request $request)
    {
        $nominees = $request['nominees'];
        $count = count($nominees);
        $votes = $request->all();
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $votes['ballot'] = $ballot->id;
        if($count == 0) {
            return redirect('hof.comm_vote');
        } else if ($count > 12) {
            flash('You cannot vote for more than 12 nominees.')->important();
            return redirect('hof/comm_vote');
        } else {
            $commcheck = Voter::where('ballot', '=', $ballot->id)->where('committee_id', '=', $votes['committee_id'])->count();
            if ($commcheck > 0) {
                flash('You\'ve Already Voted.')->important();
                return redirect('hof/comm_vote');
            } else {
                $idcheck = CommitteeKey::where('key','=',$votes['committee_id'])->count();
                if($idcheck == 1)
                {
                    $voter = new Voter;
                    $voter = $voter::create($votes);
                    foreach ($nominees as $nominee)
                    {
                        $vote = new Vote;
                        $nom['vote'] = $nominee;
                        $nom['ballot'] = $ballot['id'];
                        $nom['committee_id'] = $votes['committee_id'];
                        $nom['voter_id'] = $voter->id;
                        $vote::create($nom);
                    }
                    flash()->success('Thank you for voting!');
                    return redirect('hof');
                }
                else {
                    flash('Invalid Committee Key')->important();
                    return redirect('hof/comm_vote');
                }
            }
        }
    }

    /**
     *
     */
    public function getPublicResults()
    {
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $counts['total'] = Vote::where('ballot','=',$ballot->id)->where('committee_id','=','')->count();
        if($counts['total'] == '0')
        {
            return 'Nobody has voted yet!';
        }
        $counts['voters'] = Voter::where('ballot','=',$ballot->id)->where('committee_id','=','')->count();
        $n = 0;
        foreach ($ballot->nominees as $nominee)
        {
            $count = Vote::where('ballot','=',$ballot->id)->where('vote','=',$nominee->id)->where('committee_id','=','')->count();
            $counts['nominees'][$n]['name'] = $nominee->name;
            $counts['nominees'][$n]['count'] = $count;
            $counts['nominees'][$n]['percent'] = round((($count/$counts['total'])*100),2);
            $n++;
        }
        return view('hof.public_results', compact('counts'));

    }

    public function getCommResults()
    {
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $counts['total'] = Vote::where('ballot','=',$ballot->id)->where('committee_id','!=','')->count();
        if($counts['total'] == '0')
        {
            return 'Nobody has voted yet!';
        }
        $counts['voters'] = Voter::where('ballot','=',$ballot->id)->where('committee_id','!=','')->count();
        $n = 0;
        foreach ($ballot->nominees as $nominee)
        {
            $count = Vote::where('ballot','=',$ballot->id)->where('vote','=',$nominee->id)->where('committee_id','!=','')->count();
            $counts['nominees'][$n]['name'] = $nominee->name;
            $counts['nominees'][$n]['count'] = $count;
            $counts['nominees'][$n]['percent'] = round((($count/$counts['total'])*100),2);
            $n++;
        }
        return view('hof.comm_results', compact('counts'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        $nominee = Nominee::findorFail($id);

        //return $nominee;
        return view('hof.profile', compact('nominee'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBallot($id)
    {
        $ballot = Ballot::findorFail($id);
        $nominees = Nominee::lists('name', 'id');

        return view('hof.edit_ballot', compact('ballot', 'nominees'));

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBallot($id, Request $request)
    {
        $ballot = Ballot::findorFail($id);
        $ballot->update($request->all());
        $ballot->nominees()->sync($request->input('nominee_list', []));

        flash()->success('Ballot has been updated successfully.');
        return redirect('/hof/admin');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBallot()
    {
        $nominees = Nominee::lists('name', 'id');
        return view('hof.create_ballot', compact('nominees'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeBallot(Request $request)
    {
        $ballot = new Ballot;
        $ballot = $ballot::create($request->all());
        $ballot->nominees()->attach($request->input('nominee_list'));
        flash('Your ballot has been created!')->important();
        return redirect('/hof/admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createNominee()
    {
        return view('hof.create_nominee');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeNominee(Request $request)
    {
        $nominee = new Nominee;
        $nominee::create($request->all());
        flash('Your nominee has been added!')->important();
        return redirect('/hof/admin');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editNominee($id)
    {
        $nominee = Nominee::findorFail($id);

        return view('hof.edit_nominee', compact('nominee'));

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateNominee($id, Request $request)
    {
        $nominee = Nominee::findorFail($id);
        $nominee->update($request->all());

        flash()->success($request->name . ' has been updated successfully.');
        return redirect('/hof/admin');

    }

    public function createCommitteeKey(Request $request)
    {
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $commKey = $request->all();
        $commKey['ballot'] = $ballot->id;
        $commKey['key'] = sha1(time());
        $keyCheck = CommitteeKey::where('key','=',$commKey['key'])->get()->count();
        if($keyCheck == 0)
        {
            $key = new CommitteeKey;
            $key::create($commKey);
        }
        else
        {
            return 'Try again';
        }

        return redirect('hof/comm_list');
    }

    public function getCreateCommitteeKey()
    {
        return view('hof/create_comm_key');
    }

    public function getCommitteeList()
    {
        $ballot = Ballot::latest()->where('closed','=','0')->get()->first();
        $commMembers = CommitteeKey::where('ballot','=',$ballot->id)->orderBy('name')->get();

        return view('hof/comm_list',compact('commMembers'));
    }

    public function getNomineeList()
    {
        $nominees = Nominee::where('member','=','0')->orderBy('name')->paginate(10);
        return view('hof/nominee_list',compact('nominees'));
    }

    public function getBallotList()
    {
        $ballots = Ballot::get();
        return view('hof/ballot_list',compact('ballots'));
    }

    public function getAdmin()
    {
        return view('admin.index');
    }

}
