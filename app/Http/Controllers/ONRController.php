<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\OnrCard;
use Input;


class ONRController extends Controller
{
    public function getIndex()
    {
        $cards = OnrCard::orderBy('title')->get();
        return view('onr.index',compact('cards'));
    }

    public function getCard($id)
    {
        $card = OnrCard::findorFail($id);
        return view('onr.card',compact('card'));
    }

    public function getSearch()
    {
        return view('onr.search');
    }

    public function searchCard(request $request)
    {
        $terms = $request->all();
        $query = OnrCard::where('title','LIKE','%' . $terms['title'] . '%');
        if($terms['side'] != '')
        {
            $query->where('side','=',$terms['side']);
        }
        if($terms['type'] != '')
        {
            $query->where('type','=',$terms['type']);
        }
        if($terms['keywords'] != '')
        {
            $query->where('keywords','LIKE','%' . $terms['keywords'] . '%');
        }
        if($terms['text'] != '')
        {
            $query->where('text','LIKE','%' . $terms['text'] . '%');
        }
        if($terms['set'] != '')
        {
            $query->where('set','=',$terms['set']);
        }
        if($terms['rarity'] != '')
        {
            $query->where('rarity','=',$terms['rarity']);
        }
        if($terms['artist'] != '')
        {
            $query->where('artist','LIKE','%' . $terms['artist'] . '%');
        }

        $count = $query->count();
        if($count == '0')
        {
            return '0 Results';
        }
        else
        {
            $cards = $query->orderBy('title')->get();
            return view('onr.results',compact('cards','count'));
        }
    }

    public function quicksearchCard(request $request)
    {
        $terms = $request->all();
        $query = OnrCard::where('title','LIKE','%' . $terms['title'] . '%');
        $count = $query->count();
        if($count == '0')
        {
            return '0 Results';
        }
        else
        {
            $cards = $query->orderBy('title')->get();
            return view('onr.results',compact('cards','count'));
        }
    }

    public function createCard()
    {
        return view('onr.create_card');
    }

    public function editCard($id)
    {
        $onrcard = OnrCard::findorFail($id);
        return view('onr.edit_card',compact('onrcard'));
    }

    public function updateCard($id, request $request)
    {
        $card = Onrcard::findorFail($id);
        $card->update($request->all());

        flash()->success($request->title . ' has been updated successfully.');
        return redirect('/webminster');
    }

    public function storeCard(request $request)
    {
        $card = $request->all();
        if(Input::hasFile('image_upload'))
        {
            $file = Input::file('image_upload');
            $path = "images/onr/" . $card['set'];
            $file->move($path, $file->getClientOriginalName());
            $card['image'] = "/" . $path . "/" . $file->getClientOriginalName();
        }
        $new_card = new OnrCard;
        $new_card::create($card);
        flash($card['title'] . " has been added.");
        return view('onr.create_card');
    }

    public function getSets()
    {
        $cards = OnrCard::where('set','=','base')->orderBy('title')->get();
        return view('onr.sets',compact('cards'));
    }

    public function getSet($set)
    {
        $count = OnrCard::where('set','=',$set)->orderBy('title')->count();
        if($count == '0')
        {
            abort(404);
        } else
        {
            $cards = OnrCard::where('set','=',$set)->orderBy('title')->get();
            return view('onr.set',compact('cards'));
        }
    }
}
