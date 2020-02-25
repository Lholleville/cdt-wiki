<?php


namespace App\Service;


use App\Character;

class CharacterService
{

    private $characters = [];
    private static $instance;

    private function __construct() {}

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new CharacterService();
        }
        return self::$instance;
    }

    public function getAllCharacters() {
        foreach(Character::All() as $c){
            $this->characters[] = [
                'firstname' => $c->firstname,
                'lastname'  => $c->lastname,
                'birthday'  => $c->birthday,
                'image'     => $c->image,
                'is_dead'   => $c->is_dead,
                'deathdate' => $c->deathdate,
                'physical_description' => $c->physical_description,
                'personality' => $c->personality,
                'history'     => $c->history,
                'weapons'     => $this->setWeapons($c),
                'events'      => $this->setEvents($c),
                'religions'   => $this->setReligions($c),
                'titles'      => $this->setTitles($c),
                'relationships' => $c->relationships,
                'age'         => $c->age,
                'blazon'      => $c->blazons,
                'nicknames'   => $this->setNicknames($c)
            ];
        }
        return $this->characters;
    }


    private function setWeapons(Character $character) {
        $weapons = [];
        foreach($character->weapons as $w){
            $weapons[] = [
                'id' => $w->id,
                'name' => $w->name,
                'description' => $w->description,
                'image' => $w->image,
            ];
        }
        return $weapons;
    }

    private function setNicknames(Character $character) {
        $nicknames = [];
        foreach($character->nicknames as $n){
            $nicknames[] =  $n->name;
        }
        return $nicknames;
    }

    private function setEvents(Character $character){
        $events = [];
        foreach($character->events as $e){
            $events[] = [
                "id" => $e->id,
                "name" => $e->name,
                "description" => $e->description,
                "history" => $e->history,
                "start_date" => $e->start_date,
                "end_date" => $e->end_date,
                "type" => $e->types->name
            ];
        }
        return $events;
    }
    private function setReligions(Character $character){
        $religions = [];
        foreach($character->religions as $r){
            $religions[] = [
                'id' => $r->id,
                'name' => $r->name,
                'description' => $r->description,
                'history' => $r->history,
                'image' => $r->image,
                'conversion_date' => $r->pivot->conversion_date
            ];
        }
        return $religions;
    }

    private function setTitles(Character $character){
        $titles= [];

        foreach($character->titles as $t){
            $titles[] = [
                'id' => $t->id,
                'name' => $t->name,
                'description' => $t->description,
                'parent_id' => $t->parent_id,
                'start_date' => $t->pivot->start_date,
                'end_date' => ($t->pivot->end_date == null) ? ($character->deathdate == null) ? null : $character->deathdate : $t->pivot->end_date
            ];
        }
        return $titles;
    }
}
