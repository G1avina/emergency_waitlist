<?php
//probs not going to be usefull


namespace yatzy;
require_once('_config.php');
require_once('../app/models/YatzyGame.php');

class Engine{

    public $one = 0;
    public $two = 0;
    public $three = 0;
    public $four = 0;
    public $five = 0;
    public $six = 0;

    //public $sum;
    //public $score;

        //constructor that analyse dices
        public function __construct($d1,$d2,$d3,$d4,$d5){

            $this->one = 0;
            $this->two = 0;
            $this->three = 0;
            $this->four = 0;
            $this->five = 0;
            $this->six = 0;

            $dice = array($d1,$d2,$d3,$d4,$d5);

            
            for($x = 0; $x<5; $x++){   

                $i = $dice[$x];
                if ($i == 1){
                    $this->one = $this->one +1;
                }else if($i == 2){
                    $this->two = $this->two +1;
                }else if($i == 3){
                    $this->three = $this->three +1;
                }else if($i == 4){
                    $this->four = $this->four +1;
                }else if($i == 5){
                    $this->five = $this->five +1;
                }else if($i == 6){
                    $this->six = $this->six +1;
                }
            }
        }

        //analyse dices
        function analyseDice($d1,$d2,$d3,$d4,$d5){

            $this->one = 0;
            $this->two = 0;
            $this->three = 0;
            $this->four = 0;
            $this->five = 0;
            $this->six = 0;

            $dice = array($d1,$d2,$d3,$d4,$d5);

            
            for($x = 0; $x<5; $x++){   

                $i = $dice[$x];
                if ($i == 1){
                    $this->one = $this->one +1;
                }else if($i == 2){
                    $this->two = $this->two +1;
                }else if($i == 3){
                    $this->three = $this->three +1;
                }else if($i == 4){
                    $this->four = $this->four +1;
                }else if($i == 5){
                    $this->five = $this->five +1;
                }else if($i == 6){
                    $this->six = $this->six +1;
                }
            }
        }


        //Upper Section

        //Calculate basic ones, twos, threes, fours, fives, sixes
        function ones(){
            return $this->one;
        }

        function twos (){
            return $this->two * 2;
        }
        

        function threes(){
            return $this->three * 3;
            
        }

        function fours(){
            return $this->four * 4;
            
        }


        function fives(){
            return $this->five * 5;
        }

        function sixes(){
            return $this->six * 6;
        }


       function sum($ones,$twos,$threes,$fours,$fives,$sixes){
            $sumVal = $ones + $twos + $threes + $fours + $fives + $sixes;
            return $sumVal;

       }

       function bonus($sum){
            $bonus =0;
            if($sum >=63){
                $bonus = 50;
            }
            return $bonus;
        }


        //Lower Section

        //Calculate One pair
        function onePair(){


            if($this->six >= 2){
                return 6 * 2;
            }else if($this->five >= 2){
                return 5 * 2;
            }
            else if($this->four >= 2){
                return 4 * 2;
            }
            else if($this->three >= 2){
                return 3 * 2;
            }
            else if($this->two >= 2){
                return 2 * 2;
            }else if($this->one >= 2){
                return 1 * 2;
            }else{
                return 0;
            }
        }

         //Calculate Two pair

        function twoPair(){

            $pairValue = 0;
            $numOfPair = 0;

            if($this->six >= 2){
                $pairValue = $pairValue+ 6 * 2;
                $numOfPair++;
            }
            if($this->five >= 2){
                $pairValue = $pairValue + 5 * 2;
                $numOfPair++;
            }
            if($this->four >= 2){
                $pairValue = $pairValue+ 4 * 2;
                $numOfPair++;
            }
            if($this->three >= 2){
                $pairValue = $pairValue +3 * 2;
                $numOfPair++;
            }
            if($this->two >= 2){
                $pairValue = $pairValue +2 * 2;
                $numOfPair++;
            }
            if($this->one >= 2){
                $pairValue = $pairValue + 1 * 2;
                $numOfPair++;
            }

            if($numOfPair != 2){
                $pairValue = 0;
            }

            return $pairValue;
        }

        

        //Calculate Three of a kind
       function threeOfKind(){
            $threeOfKindVal = 0;

            if($this->six >= 3){
                $threeOfKindVal = 6 * 3;
            }
            if($this->five >= 3){
                $threeOfKindVal =  5 * 3;
            }
            if($this->four >= 3){
                $threeOfKindVal =  4 * 3;
            }
            if($this->three >= 3){
                $threeOfKindVal = 3 * 3;
            }
            if($this->two >= 3){
                $threeOfKindVal = 2 * 3;
            }
            if($this->one >= 3){
                $threeOfKindVal =  1 * 3;
            }

            return $threeOfKindVal;
        }

        

        //Calculate Four of a kind
        function fourOfKind(){
            $fourOfKindVal = 0;

            if($this->six >= 4){
                $fourOfKindVal = 6 * 4;
            }
            if($this->five >= 4){
                $fourOfKindVal =  5 * 4;
            }
            if($this->four >= 4){
                $fourOfKindVal =  4 * 4;
            }
            if($this->three >= 4){
                $fourOfKindVal = 3 * 4;
            }
            if($this->two >= 4){
                $fourOfKindVal = 2 * 4;
            }
            if($this->one >= 4){
                $fourOfKindVal =  1 * 4;
            }

            return  $fourOfKindVal;
        }

        

        //calculate full house
        function fullHouse(){
            $fonePair =0;
            if($this->six == 2){
                $fonePair = 6 * 2;
            }else if($this->five == 2){
                $fonePair = 5 * 2;
            }
            else if($this->four == 2){
                $fonePair = 4 * 2;
            }
            else if($this->three == 2){
                $fonePair = 3 * 2;
            }
            else if($this->two == 2){
                $fonePair = 2 * 2;
            }else if($this->one == 2){
                $fonePair = 1 * 2;
            }

            $fthreeOfKind = 0;
        
            if($this->six == 3){
                $fthreeOfKind = 6 * 3;
            }
            if($this->five == 3){
                $fthreeOfKind =  5 * 3;
            }
            if($this->four == 3){
                $fthreeOfKind =  4 * 3;
            }
            if($this->three == 3){
                $fthreeOfKind = 3 * 3;
            }
            if($this->two == 3){
                $fthreeOfKind = 2 * 3;
            }
            if($this->one == 3){
                $fthreeOfKind =  1 * 3;
            }

            $fullHouseVal = 0;
            if ($fonePair != 0 && $fthreeOfKind !=0){
                $fullHouseVal = $fonePair + $fthreeOfKind;
            }

            return  $fullHouseVal;
        }

        

        //small straight
        function smallStraight(){
            $smallStraightVal = 0;
            $temp = 0;
            $temp2 = array($this->one,$this->two,$this->three,$this->four,$this->five,$this->six);
            for($i =0; $i<6;$i++){
                if($temp2[$i]>=1){
                    $temp = $temp + 1;
                }else{
                    $temp = 0;
                }
                if($temp == 4){
                    $smallStraightVal =30;
                    break;
                }
            }
        

           return $smallStraightVal;
        }






        //long straight
        function largeStraight(){
            $largeStraightVal = 0;
            if ($this->one ==1 && $this->two ==1 && $this->three == 1 && $this->four ==1 && $this->five ==1){
                $largeStraightVal=40;
            }else if($this->two ==1 && $this->three == 1 && $this->four ==1 && $this->five ==1 && $this->six == 1){
                $largeStraightVal=40;
            }

            return $largeStraightVal;
        }



        
        //calculate chance 
        function chance(){
            $chanceVal = $this->one * 1 + $this->two * 2 + $this->three * 3 + $this->four * 4 + $this->five * 5 + $this->six * 6;
            return $chanceVal;
        }

        

        //calculate yatzy

        function yatzy(){
            $yatzyVal = 0;
            if($this->one ==5 ||  $this->two == 5 ||$this->three == 5 || $this->four ==5 || $this->five ==5 || $this->six == 5){
                $yatzyVal = 50;
            }

            return $yatzyVal;
        }
        


    //takes in a game object created in yatzyGame.php
    function calcSum($game){
        
        $sum = $game->ones["values"] + $game->twos["values"] + $game->threes["values"] + $game->fours["values"] + $game->fives["values"] + $game->sixes["values"];

        if($sum >=63){
            return $sum + 50;
        }else{
            return $sum;
        }
    }
}
