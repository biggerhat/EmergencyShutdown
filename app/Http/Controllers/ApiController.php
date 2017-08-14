<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function getDeckname()
    {
        $prefix = array("Glass", "Butcher", "L4J", "Minh", "TGI Friday's", "Can o'", "Reg-ass", "Food", "Dumble", "Pitch", "Hot Tub", "Super", "Snaking", "Street", "Big Girls Play With", "Rude", "Dyper", "Andy", "Damon", "Haandy", "Prison", "Vegan", "Gramble", "Anatomy of", "Headlock", "Yomi", "Endless", "Cambridge", "Barnacle", "Modern", "PPVP", "One-Armed", "2-Armed", "Stim-", "Perfume", "Nexus", "Stealth", "Dumpster", "Russian", "BigBoy", "SlySquid's", "Apoc", "Spanish", "Moonbase", "Here Come Dat", "NEXT", "Mumba", "THE FUN", "No Brakes on This", "Battle of", "Hate", "Fiery", "Papa", "Snekbite", "Credit", "Fake", "Bleed", "Angry", "Killer", "Temujin", "Annoying", "Snek", "Slightly Miffed", "Git Gud", "Silver Bullet", "Peddle to the", "Binder Fodder's", "Princess", "Jeeves Brothers'", "Sol", "Takeshi's", "Noob", "Minnesota Magnum", "Mooninites", "Do Techlords Dream of", "Hammer", "Moon", "Minnesota", "Cold", "FAQ", "Nightmare", "1 like =");
        $suffix = array("Shop", "Refinery", "Whupass", "Coats", "Fork", "Modernism", "Time Machine", "News", "Corp", "Runner", "4tman", "Creepy Sleepover", "Sucker", "Bootcamp", "Scrub", "Ice Feast", "Anarchy", "Lock", "Ratios", "Waltz", "Chess", "Moby", "Brometheus", "Fast Advance", "Sandburg", "Dog Deck", "Cams", "Monolith", "Influenza", "Tagstorm", "Bread", "Rush", "Tag-Me", "Scramble", "7-Point Combo", "Bus", "Wits", "Bear", "Info", "Smurf", "Clicker", "Purple", "Geist", "Ruse", "Kittens", "Sleeper Hold", "Inquisition", "Railgun","Metal", "Barcode", "Revenge", "Citadel", "Castle", "Electric Sheep", "Party", "Moon", "Mooninites", "NPE", "Penguins", "Magnum Maxx", "Bird Deck");

        $rand_pref = array_rand($prefix, 1);
        $rand_suff = array_rand($suffix, 1);

        $added = mt_rand(0,50);
        $deckname = $prefix[mt_rand(0, count($prefix) - 1)] . " " . $suffix[mt_rand(0, count($suffix) - 1)];

        switch($added)
        {
            case 5:
                $deckname = $deckname . " - Post Rotation";
                break;
            case 7:
                $rando = mt_rand(16,278);
                $deckname = $deckname . " - Top " . $rando . " at Worlds!";
                break;
            case 10:
                $deckname = "Make '" . $deckname . "' Great Again";
                break;
            case 13:
                $rando = mt_rand(0,12);
                $deckname = $deckname . " " . $rando . "000";
                break;
            case 15:
                $deckname = "UNDEFEATED ON JINTEKI.NET " . $deckname;
                break;
            case 17:
                $deckname = "My secret love affair with " . $deckname;
                break;
            case 20:
                $deckname = $deckname . "- Now in Apex";
                break;
            case 22:
                $deckname = "I WON A GAME WITH THIS- " . $deckname;
                break;
            case 25:
                $deckname = $deckname . "- w/Spags";
                break;
            case 27:
                $deckname = "TheBigBoy's " . $deckname;
                break;
            case 30:
                $deckname = $deckname . "- Grail Edition";
                break;
            case 33:
                $deckname = "Nobody Expects " . $deckname;
                break;
            case 35:
                $rando = mt_rand(1,12);
                $deckname = $deckname . " v" . $rando . ".0";
                break;
            case 37:
                $deckname = $deckname . " - Made Day 2 at Worlds!";
                break;
            case 40:
                $deckname = $deckname . "- Breaks the Meta!";
                break;
            case 42:
                $deckname = "d1en's " . $deckname;
                break;
            case 45:
                $rando = mt_rand(4,15);
                $deckname = $deckname . " - MWL " . $rando . " Legal";
                break;
        }

        return $deckname;
    }
}
