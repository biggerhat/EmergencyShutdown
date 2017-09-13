@extends('main')
@section('title')
     - Welcome to the Webminster Project
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Welcome to the Webminster Project</div>
                    <div class="panel-body">
                        <p class="pgraph">
                            The Webminster Project began as a way to make information about the original Netrunner CCG more accessible to the public.
                            Some time ago, the website NetrunnerOnline.com was taken offline, and with it went a library of information, decklists, forums and card images from the game.
                            This information is still available but not easy to find spread across the internet. With the help of several Android: Netrunner community members, including Alex (@internet) and Zach Cavis (who has been a huge fountain of links and information!), this project has commenced in order to bring together a database for the original Netrunner card game.</p>
                        <p class="pgraph">While right now it's just a searchable card database, I fully intend to add many other features, including: decklists, game rules, cards rulings/errata, and many more things. Please check back for new features often!</p>
                        <p class="pgraph">The following introduction to the Netrunner CCG is taken from the website <a href="http://arasaka.de" target="_new">Arasaka.de</a>, which contains a lot of the information I will be putting up here eventually before it is lost forever:</p>

                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h2 style="font-style: italic">What is Netrunner?</h2>
                                <p class="pgraph">Netrunner is a collectible card game designed by Richard Garfield, the creator of Magic: The Gathering. It was published by Wizards of the Coast and introduced in 1996. Netrunner was lauded by critics, such as InQuest magazine, for its level of strategy and tactics, balanced game play and impressive artwork, and is regarded by many players around the world as one of the best CCGs ever published.</p>
                                <h3>Basic Storyline and Game Aspects</h3>
                                <p class="pgraph">Netrunner is based heavily on the Cyberpunk 2020 role-playing game published by R. Talsorian Games, but also draws additional flavor from the broader cyberpunk genre. Netrunner depicts cyberspace combat between a global mega-corporation (the Corp) and a hacker (the Runner). The Corp's goal is to complete their secret agendas before the Runner can hack in and spoil their secret plans for world domination. It isn't easy, though, as the Corp has strong defensive data forts protected by malevolent computer programs known as ICE (short for Intrusion Countermeasures Electronics). The Runner must use special programs of their own (called Icebreakers) to break through and steal the hidden plans - to keep the Corp from taking over completely. All this is paid for in the game by a system of resources called bits (representing currency), which are earned and spent during the course of play.</p>

                                <p class="pgraph">An interesting feature of Netrunner is that each side has different abilities and uses completely different cards distinguished by alternate card backs. This contrasts with most other CCG's, which usually depict a "battle between peers" where each opponent draws upon the same card pool. While a player does not have to play both sides except in tournament play, it is commonly held that a firm understanding of both leads to better overall player ability.</p>

                                The following quote is taken from InQuest Magazine, May 1997:
                                <span style="font-style: italic">
                                    <p class="pgraph">"Probably the best CCG on the market. Netrunner's only drawback is that it can't be played with more than two players. However, this is a small price to pay for such a marvelously crafted game of strategy and guile.</p>

                                    <p class="pgraph">Every time you play, you'll face the challenges of having to make the right tactical decision, judging your opponents poker face and executing bluffs of your own. You must consider every move your opponent makes, and he'll be putting you under the same scrutiny. The skill and concentration Netrunner requires enhances its enjoyability.</p>

                                    <p class="pgraph">Netrunner also does a great job of simulating the the feel of R. Talsorian's Cyberpunk RPG. As the Runner, you'll feel like you're putting your life on the line every time you investigate the Corp's data forts.</p>

                                    <p class="pgraph">Unlike most other games, Netrunner plays best out of a starter. Add two or three boosters and trim both your Corp and Runner Decks down to the 45-card minimum and you're ready to go. Netrunner is the benchmark of CCG's."</p></span>
                            </div>
                        </div>

                    </div>

                </div>

        </div>

    </div>


@endsection
