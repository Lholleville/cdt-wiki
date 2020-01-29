<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index(){
        $characters = [];
        foreach(Character::All() as $c){
            $characters[] = [
                'firstname' => $c->firstname,
                'lastname'  => $c->lastname,
                'birthday'  => $c->birthday,
                'image'     => $c->image,
                'is_dead'   => $c->is_dead,
                'deathdate' => $c->deathdate,
                'physical_description' => $c->physical_description,
                'personality' => $c->personality,
                'history'     => $c->history,
                'weapons'     => $c->weapons,
                'places'      => $c->places,
                'events'      => $c->events,
                'religions'   => $c->religions
            ];
        }
        return $characters;
    }
}
