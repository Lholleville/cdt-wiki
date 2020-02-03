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
            $titles= [];
            $nicknames = [];

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

            foreach($c->titles as $t){
                $titles[] = [
                    'id' => $t->id,
                    'name' => $t->name,
                    'description' => $t->description,
                    'parent_id' => $t->parent_id,
                    'start_date' => $t->pivot->start_date,
                    'end_date' => ($t->pivot->end_date == null) ? ($c->deathdate == null) ? null : $c->deathdate : $t->pivot->end_date
                ];
            }

            foreach($c->nicknames as $n){
                $nicknames[] =  $n->name;
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
                'titles'      => $titles,
                'relationships' => $c->relationships,
                'age'         => $c->age,
                'blazon'      => $c->blazons,
                'nicknames'   => $nicknames
            ];
        }
        return $characters;
    }
}
