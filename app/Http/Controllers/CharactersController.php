<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index(){
        $characters = [];
        foreach(Character::All() as $c){

            $religions = [];
            $weapons = [];

            foreach($c->weapons as $w){
                $weapons[] = [
                    'id' => $w->id,
                    'name' => $w->name,
                    'description' => $w->description,
                    'image' => $w->image,
                ];
            }

            foreach($c->religions as $r){
                $religions[] = [
                    'id' => $r->id,
                    'name' => $r->name,
                    'description' => $r->description,
                    'history' => $r->history,
                    'image' => $r->image,
                    'conversion_date' => $r->pivot->conversion_date
                ];
            }


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
                'weapons'     => $weapons,
                'places'      => $c->places,
                'events'      => $c->events,
                'religions'   => $religions,
                'titles'      => $c->titles
            ];
        }
        return $characters;
    }
}
