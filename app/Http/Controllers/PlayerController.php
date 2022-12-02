<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::get();
        return view('player.index', ['players' => $players]);
    }

    public function create()
    {
        return view('player.create');
    }

    public function store(Request $request)
    {
        $validateplayer = $request->validate([
            'name' => 'required',
            'nickname' => 'required'
        ]);
        $detail_player = $request->validate([
            'country' => 'required',
            'position' => 'required',
            'team' => 'required'
        ]);

        $player = Player::create($validateplayer);
        $player->detail_player()->create($detail_player);
        return redirect()->route('player.index')->with('message', "Data Player With Name {$validateplayer['name']} Added Succesfully");
    }

    public function destroy(Player $player)
    {
        $player->detail_player()->delete($player->id);
        $player->delete($player->id);
        return redirect()->route('player.index')->with('message', "Data Player With Name $player->name Deleted Succesfully");
    }

    public function edit(Player $player)
    {
        return view('player.edit', ['player' => $player]);
    }

    public function update(Request $request, Player $player)
    {
        $validateplayer = $request->validate([
            'name' => 'required',
            'nickname' => 'required'
        ]);

        $detail_player = $request->validate([
            'country' => 'required',
            'position' => 'required',
            'team' => 'required'
        ]);

        $player1 = Player::find($player->id);
        $player1->update($validateplayer);
        $player1->detail_player()->update($detail_player);

        return redirect()->route('player.index')->with('message', "Data Player With Name $player->name Changed Succesfully");
    }
}