<?php
//could be usfull its a php class with unsfull function that encodes data in Json

namespace yatzy;


require_once('_config.php');
require_once('../app/models/YatzyEngine.php');

use yatzy\Dice;
use yatzy\Engine;

//idk if this is going to be used because its suppose to be a used by the client side to memorise info.
//might have to translate in javascript
//will be usefull for server to build image of client game
class Game{

    public $playerName;
    public $d;
    public $eng;

    
    public $state;

    public $dice1 = ["value" => 0,"set" => 0];
    public $dice2 = ["value" => 0,"set" => 0];
    public $dice3 = ["value" => 0,"set" => 0];
    public $dice4 = ["value" => 0,"set" => 0];
    public $dice5 = ["value" => 0,"set" => 0];

    public $ones = ["value" => 0,"set" => 0];
    public $twos = ["value" => 0,"set" => 0];
    public $threes = ["value" => 0,"set" => 0];
    public $fours = ["value" => 0,"set" => 0];
    public $fives = ["value" => 0,"set" => 0];
    public $sixes = ["value" => 0,"set" => 0];

    public $sum = 0;
    public $bonus = 0;


    public $onePair = ["value" => 0,"set" => 0];
    public $twoPair = ["value" => 0,"set" => 0];
    public $threeOfKind = ["value" => 0,"set" => 0];
    public $fourOfKind = ["value" => 0,"set" => 0];
    public $fullHouse = ["value" => 0,"set" => 0];
    public $smallStraight = ["value" => 0,"set" => 0];
    public $largeStraight =["value" => 0,"set" => 0];
    public $chance = ["value" => 0,"set" => 0];
    public $yatzy =["value" => 0,"set" => 0];

    public $total = 0;

    public function __construct($JsonData) {

        $this->d = new Dice();

        //state
        $this->state = $JsonData["state"];

        //initialise image of dices
        $this->dice1["value"] = $JsonData["d1Value"];
        $this->dice1["set"] = $JsonData["d1Set"];

        $this->dice2["value"] = $JsonData["d2Value"];
        $this->dice2["set"] = $JsonData["d2Set"];

        $this->dice3["value"] = $JsonData["d3Value"];
        $this->dice3["set"] = $JsonData["d3Set"];

        $this->dice4["value"] = $JsonData["d4Value"];
        $this->dice4["set"] = $JsonData["d4Set"];

        $this->dice5["value"] = $JsonData["d5Value"];
        $this->dice5["set"] = $JsonData["d5Set"];

        $this->eng = new Engine($this->dice1["value"], $this->dice2["value"], $this->dice3["value"], $this->dice4["value"], $this->dice5["value"]);

        //initialise image of Lower scores
        $this->ones["value"] = $JsonData["onesValue"];
        $this->ones["set"] = $JsonData["onesSet"];
        $this->twos["value"] = $JsonData["twosValue"];
        $this->twos["set"] = $JsonData["twosSet"];
        $this->threes["value"] = $JsonData["threesValue"];
        $this->threes["set"] = $JsonData["threesSet"];
        $this->fours["value"] = $JsonData["foursValue"];
        $this->fours["set"] = $JsonData["foursSet"];
        $this->fives["value"] = $JsonData["fivesValue"];
        $this->fives["set"] = $JsonData["fivesSet"];
        $this->sixes["value"] = $JsonData["sixesValue"];
        $this->sixes["set"] = $JsonData["sixesSet"];

        $this->sum =$JsonData["sum"];
        $this->bonus =$JsonData["bonus"];
        $this->total =$JsonData["total"];

        //initialise image of Higher scores
        $this->onePair["value"] = $JsonData["onePairValue"];
        $this->onePair["set"] = $JsonData["onePairSet"];
        $this->twoPair["value"] = $JsonData["twoPairValue"];
        $this->twoPair["set"] = $JsonData["twoPairSet"];
        $this->threeOfKind["value"] = $JsonData["threeOfKindValue"];
        $this->threeOfKind["set"] = $JsonData["threeOfKindSet"];
        $this->fourOfKind["value"] = $JsonData["fourOfKindValue"];
        $this->fourOfKind["set"] = $JsonData["fourOfKindSet"];
        $this->fullHouse["value"] = $JsonData["fullHouseValue"];
        $this->fullHouse["set"] = $JsonData["fullHouseSet"];
        $this->smallStraight["value"] = $JsonData["smallStraightValue"];
        $this->smallStraight["set"] = $JsonData["smallStraightSet"];
        $this->largeStraight["value"] = $JsonData["largeStraightValue"];
        $this->largeStraight["set"] = $JsonData["largeStraightSet"];
        $this->chance["value"] = $JsonData["chanceValue"];
        $this->chance["set"] = $JsonData["chanceSet"];
        $this->yatzy["value"] = $JsonData["yatzyValue"];
        $this->yatzy["set"] = $JsonData["yatzySet"];

    }



    function rollDice(){
        if($this->dice1["set"] == 0){
            $this->dice1["value"] = $this->d->roll();
        }

        if($this->dice2["set"] == 0){
            $this->dice2["value"] = $this->d->roll();
        }

        if($this->dice3["set"] == 0){
            $this->dice3["value"] = $this->d->roll();
        }

        if($this->dice4["set"] == 0){
            $this->dice4["value"] = $this->d->roll();
        }

        if($this->dice5["set"] == 0){
            $this->dice5["value"] = $this->d->roll();
        }

        $this->eng->analyseDice($this->dice1["value"], $this->dice2["value"], $this->dice3["value"], $this->dice4["value"], $this->dice5["value"]);

    }

    function calcScore(){

        $this->eng->analyseDice($this->dice1["value"], $this->dice2["value"], $this->dice3["value"], $this->dice4["value"], $this->dice5["value"]);

        //Higher section

        if($this->ones["set"]== 0){
            $this->ones["value"]= $this->eng->ones();
        }
        if($this->twos["set"]== 0){
            $this->twos["value"]= $this->eng->twos();
        }
        if($this->threes["set"]== 0){
            $this->threes["value"]= $this->eng->threes();
        }
        if($this->fours["set"]== 0){
            $this->fours["value"]= $this->eng->fours();
        }
        if($this->fives["set"]== 0){
            $this->fives["value"]= $this->eng->fives();
        }
        if($this->sixes["set"]== 0){
            $this->sixes["value"]= $this->eng->sixes();
        }

        if($this->sixes["set"]== 1 && $this->fives["set"]== 1 && $this->fours["set"]== 1 && $this->threes["set"]== 1 && $this->twos["set"]== 1 && $this->ones["set"]== 1){
            $this->sum= $this->eng->sum($this->sixes["value"],$this->fives["value"],$this->fours["value"],$this->threes["value"],$this->twos["value"],$this->ones["value"]);
            $this->bonus= $this->eng->bonus($this->sum);
        }

        //Lower section
        if($this->onePair["set"]== 0){
            $this->onePair["value"]= $this->eng->onePair();
        }

        if($this->twoPair["set"]== 0){
            $this->twoPair["value"]= $this->eng->twoPair();
        }

        if($this->threeOfKind["set"]== 0){
            $this->threeOfKind["value"]= $this->eng->threeOfKind();
        }

        if($this->fourOfKind["set"]== 0){
            $this->fourOfKind["value"]= $this->eng->fourOfKind();
        }

        if($this->fullHouse["set"]== 0){
            $this->fullHouse["value"]= $this->eng->fullHouse();
        }

        if($this->smallStraight["set"]== 0){
            $this->smallStraight["value"]= $this->eng->smallStraight();
        }

        if($this->largeStraight["set"]== 0){
            $this->largeStraight["value"]= $this->eng->largeStraight();
        }

        if($this->chance["set"]== 0){
            $this->chance["value"]= $this->eng->chance();
        }

        if($this->yatzy["set"]== 0){
            $this->yatzy["value"]= $this->eng->yatzy();
        }

    }

    function calcTotal(){
        $this->total = $this->sum+$this->bonus+ $this->onePair["value"]+ $this->twoPair["value"]+ $this->threeOfKind["value"]+ $this->fourOfKind["value"]+$this->fullHouse["value"]+ $this->smallStraight["value"]+ $this->largeStraight["value"]+ $this->chance["value"]+ $this->yatzy["value"];


    }

    function checkEnd(){
        if($this->ones["set"]== 1 && $this->twos["set"]== 1 && $this->threes["set"]== 1 && $this->fours["set"]== 1 && $this->fives["set"]== 1 && $this->sixes["set"]== 1 && $this->onePair["set"]== 1 && $this->twoPair["set"]== 1 && $this->threeOfKind["set"]== 1 && $this->fourOfKind["set"]== 1 && $this->fullHouse["set"]== 1 && $this->smallStraight["set"]== 1 && $this->largeStraight["set"]== 1 && $this->chance["set"]== 1 && $this->yatzy["set"]== 1){
            $this->state = 5;
            $this->calcTotal();
            return;
        }else{
            return;
        }




    }
//Calculates the satate of the game
    function calcState($action){
        if($this->state == 0 && $action == "roll"){
            $this->state =2;
            return;
        }
        if($this->state == 1 && $action == "roll"){
            $this->state =2;
            return;
        }
        if($this->state == 2 && $action == "roll"){
            $this->state =3;
            return;
        }
        if($this->state == 3 && $action == "roll"){
            $this->state =4;
            return;
        }
        if($this->state == 2 && $action == "score"){
            $this->state =1;
            return;
        }
        if($this->state == 3 && $action == "score"){
            $this->state =1;
            return;
        }
        if($this->state == 4 && $action == "score"){
            $this->state =1;
            return;
        }
    }

    function createJson(){

        //state
        $JsonData["state"] = $this->state;

        //dice
        $JsonData["d1Value"] = $this->dice1["value"];
        $JsonData["d1Set"] = $this->dice1["set"];

        $JsonData["d2Value"] = $this->dice2["value"];
        $JsonData["d2Set"] = $this->dice2["set"];

        $JsonData["d3Value"] = $this->dice3["value"];
        $JsonData["d3Set"] = $this->dice3["set"];

        $JsonData["d4Value"] = $this->dice4["value"];
        $JsonData["d4Set"] = $this->dice4["set"];

        $JsonData["d5Value"] = $this->dice5["value"];
        $JsonData["d5Set"] = $this->dice5["set"];

        
        //initialise image of Lower scores
       $JsonData["onesValue"] = $this->ones["value"];
        $JsonData["onesSet"] = $this->ones["set"];
        $JsonData["twosValue"] = $this->twos["value"];
        $JsonData["twosSet"] = $this->twos["set"];
        $JsonData["threesValue"] = $this->threes["value"];
        $JsonData["threesSet"] = $this->threes["set"];
        $JsonData["foursValue"] = $this->fours["value"];
        $JsonData["foursSet"] = $this->fours["set"];
        $JsonData["fivesValue"] = $this->fives["value"];
        $JsonData["fivesSet"] = $this->fives["set"];
        $JsonData["sixesValue"] = $this->sixes["value"];
        $JsonData["sixesSet"] = $this->sixes["set"];

        $JsonData["sum"] = $this->sum;
        $JsonData["bonus"] = $this->bonus;
        $JsonData["total"] = $this->total;

        //initialise image of Higher scores
        $JsonData["onePairValue"] = $this->onePair["value"];
        $JsonData["onePairSet"] = $this->onePair["set"];
        $JsonData["twoPairValue"] = $this->twoPair["value"];
        $JsonData["twoPairSet"] = $this->twoPair["set"];
        $JsonData["threeOfKindValue"] = $this->threeOfKind["value"];
        $JsonData["threeOfKindSet"] = $this->threeOfKind["set"]; 
        $JsonData["fourOfKindValue"] = $this->fourOfKind["value"];
        $JsonData["fourOfKindSet"] = $this->fourOfKind["set"];
        $JsonData["fullHouseValue"] = $this->fullHouse["value"];
        $JsonData["fullHouseSet"] = $this->fullHouse["set"];
        $JsonData["smallStraightValue"] = $this->smallStraight["value"];
        $JsonData["smallStraightSet"] = $this->smallStraight["set"];
        $JsonData["largeStraightValue"] = $this->largeStraight["value"];
        $JsonData["largeStraightSet"] = $this->largeStraight["set"];
        $JsonData["chanceValue"] = $this->chance["value"];
        $JsonData["chanceSet"] = $this->chance["set"];
        $JsonData["yatzyValue"] = $this->yatzy["value"];
        $JsonData["yatzySet"] =$this->yatzy["set"];

        return $JsonData;




    }




}



