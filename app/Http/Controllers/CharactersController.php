<?php

namespace App\Http\Controllers;

use App\Service\CharacterService;

class CharactersController extends Controller
{

    private $characterService;

    public function __construct()
    {
        $this->characterService = CharacterService::getInstance();
    }

    public function index(){
        return $this->characterService->getAllCharacters();
    }
}
