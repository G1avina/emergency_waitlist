
//this is probably not going to be usefull for this project
//has some cool stuf like class encode stuf in json function



//This class handles all current info of the game and all methods to draw the game on the screen


class Game {

    //Image of the game on start up
    onesFunc;
    twosFunc;
    threesFunc;
    foursFunc;
    fiveFunc;
    sixFunc;
    onePairFunc;
    twoPairFunc;
    threeOfKindFunc;
    fourOfKindFunc;
    fullHouseFunc;
    smallStraightFunc;
    largeStraightFunc;
    chanceFunc;
    yatzyFunc;



    constructor(name) {
        this.playerName = name;
        this.state =0;

        this.dice1 = { value: 0, set: 0 };
        this.dice2 = { value: 0, set: 0 };
        this.dice3 = { value: 0, set: 0 };
        this.dice4 = { value: 0, set: 0 };
        this.dice5 = { value: 0, set: 0 };

        this.ones = { value: 0, set: 0 };
        this.twos = { value: 0, set: 0 };
        this.threes = { value: 0, set: 0 };
        this.fours = { value: 0, set: 0 };
        this.fives = { value: 0, set: 0 };
        this.sixes = { value: 0, set: 0 };
        this.sum = 0;
        this.bonus = 0;

        this.onePair = { value: 0, set: 0 };
        this.twoPair = { value: 0, set: 0 };
        this.threeOfKind = { value: 0, set: 0 };
        this.fourOfKind = { value: 0, set: 0 };
        this.fullHouse = { value: 0, set: 0 };
        this.smallStraight = { value: 0, set: 0 };
        this.largeStraight = { value: 0, set: 0 };
        this.chance = { value: 0, set: 0 };
        this.yatzy = { value: 0, set: 0 };

        this.total = 0;



    }

    //update the games info using a Json received by the server
    updateInfo(JsonData){

        //state
        this.state = JsonData.state;

        //dice info update
        this.dice1.value = JsonData.d1Value;
        this.dice1.Set = JsonData.d1Set;
        this.dice2.value = JsonData.d2Value;
        this.dice2.Set = JsonData.d2Set;
        this.dice3.value = JsonData.d3Value;
        this.dice3.Set = JsonData.d3Set;
        this.dice4.value = JsonData.d4Value;
        this.dice4.Set = JsonData.d4Set;
        this.dice5.value = JsonData.d5Value;
        this.dice5.Set = JsonData.d5Set;

        //higher score info update
        this.ones.value = JsonData.onesValue;
        this.ones.set = JsonData.onesSet;
        this.twos.value = JsonData.twosValue;
        this.twos.set = JsonData.twosSet;
        this.threes.value = JsonData.threesValue;
        this.threes.set = JsonData.threesSet;
        this.fours.value = JsonData.foursValue;
        this.fours.set = JsonData.foursSet;
        this.fives.value = JsonData.fivesValue;
        this.fives.set = JsonData.fivesSet;
        this.sixes.value = JsonData.sixesValue;
        this.sixes.set = JsonData.sixesSet;
        this.sum = JsonData.sum;
        this.bonus = JsonData.bonus;
        this.total = JsonData.total;

        //Lower score info update
        this.onePair.value = JsonData.onePairValue;
        this.onePair.set = JsonData.onePairSet;
        this.twoPair.value = JsonData.twoPairValue;
        this.twoPair.set = JsonData.twoPairSet;
        this.threeOfKind.value = JsonData.threeOfKindValue;
        this.threeOfKind.set = JsonData.threeOfKindSet;
        this.fourOfKind.value = JsonData.fourOfKindValue;
        this.fourOfKind.set = JsonData.fourOfKindSet;
        this.fullHouse.value = JsonData.fullHouseValue;
        this.fullHouse.set = JsonData.fullHouseSet;
        this.smallStraight.value = JsonData.smallStraightValue;
        this.smallStraight.set = JsonData.smallStraightSet;
        this.largeStraight.value = JsonData.largeStraightValue;
        this.largeStraight.set = JsonData.largeStraightSet;
        this.chance.value = JsonData.chanceValue;
        this.chance.set = JsonData.chanceSet;
        this.yatzy.value = JsonData.yatzyValue;
        this.yatzy.set = JsonData.yatzySet;
    }


    //translate game info in JSON to be sent to the server
    createJson(){

        let jsonData = {
            //player info 
            playerName: this.playerName,
            //state
            state: this.state,
            //dice info
            d1Value: this.dice1["value"],
            d1Set: this.dice1["set"],
            d2Value: this.dice2["value"],
            d2Set: this.dice2["set"],
            d3Value: this.dice3["value"],
            d3Set: this.dice3["set"],
            d4Value: this.dice4["value"],
            d4Set: this.dice4["set"],
            d5Value: this.dice5["value"],
            d5Set: this.dice5["set"],
            
            //Higher score info
            onesValue: this.ones["value"],
            onesSet: this.ones["set"],
            twosValue: this.twos["value"],
            twosSet: this.twos["set"],
            threesValue: this.threes["value"],
            threesSet: this.threes["set"],
            foursValue: this.fours["value"],
            foursSet: this.fours["set"],
            fivesValue: this.fives["value"],
            fivesSet: this.fives["set"],
            sixesValue: this.sixes["value"],
            sixesSet: this.sixes["set"],
            sum: this.sum,
            bonus: this.bonus,
            total: this.total,
    
            //Lower score info
            onePairValue: this.onePair["value"],
            onePairSet: this.onePair["set"],
            twoPairValue: this.twoPair["value"],
            twoPairSet: this.twoPair["set"],
            threeOfKindValue: this.threeOfKind["value"],
            threeOfKindSet: this.threeOfKind["set"],
            fourOfKindValue: this.fourOfKind["value"],
            fourOfKindSet: this.fourOfKind["set"],
            fullHouseValue: this.fullHouse["value"],
            fullHouseSet: this.fullHouse["set"],
            smallStraightValue: this.smallStraight["value"],
            smallStraightSet: this.smallStraight["set"],
            largeStraightValue: this.largeStraight["value"],
            largeStraightSet: this.largeStraight["set"],
            chanceValue: this.chance["value"],
            chanceSet: this.chance["set"],
            yatzyValue: this.yatzy["value"],
            yatzySet: this.yatzy["set"],
        };

        return jsonData;
    }

    //draw all info on screen
    drawScreen(){

        //current state to be deleted 
        document.getElementById("state1").innerHTML = "state: " + this.state;


        //draw dices
        document.getElementById("dice1").innerHTML = this.drawDice(this.dice1.value);
        document.getElementById("dice2").innerHTML = this.drawDice(this.dice2.value);
        document.getElementById("dice3").innerHTML = this.drawDice(this.dice3.value);
        document.getElementById("dice4").innerHTML = this.drawDice(this.dice4.value);
        document.getElementById("dice5").innerHTML = this.drawDice(this.dice5.value);

        //draw higher score
        document.getElementById('ones').innerHTML = "ones: "+this.ones.value;
        document.getElementById('twos').innerHTML = "twos: "+this.twos.value;
        document.getElementById('threes').innerHTML = "threes: "+this.threes.value;
        document.getElementById('fours').innerHTML = "fours: "+this.fours.value;
        document.getElementById('fives').innerHTML = "fives: "+this.fives.value;
        document.getElementById('sixes').innerHTML = "sixes: "+this.sixes.value;

        document.getElementById('sum').innerHTML = "sum: "+this.sum;
        document.getElementById('bonus').innerHTML = "bonus: "+this.bonus;

        //draw lower score
        document.getElementById('onePair').innerHTML = "one Pair: "+this.onePair.value;
        document.getElementById('twoPair').innerHTML = "two Pair: "+this.twoPair.value;
        document.getElementById('threeOfKind').innerHTML = "three of a kind: "+this.threeOfKind.value;
        document.getElementById('fourOfKind').innerHTML = "fourOfKind: "+this.fourOfKind.value;
        document.getElementById('fullHouse').innerHTML = "fullHouse: "+this.fullHouse.value;
        document.getElementById('smallStraight').innerHTML = "smallStraight: "+this.smallStraight.value;
        document.getElementById('largeStraight').innerHTML = "largeStraight: "+this.largeStraight.value;
        document.getElementById('chance').innerHTML = "chance: "+this.chance.value;
        document.getElementById('yatzy').innerHTML = "yatzy: "+this.yatzy.value;
    }


    //The dice image are kept here
    drawDice(x){
        //return display info of blank dice
        if(x == 0){
           return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
            <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
            </svg>
            </div>`;
        }
    
        //return display info of dice 1
        if(x == 1){
    
            return `<div class = "gdice" id = "gdice">
                <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx='60' cy="60" r="5" stroke="black" stroke-width="4" fill="black" />
                </svg>
            </div>`;
        }
        //return display info of dice 2
        if(x == 2){
    
            return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx="30" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
            </svg>
        </div>`;
        }
    
        //return display info of dice 3
        if(x == 3){
    
            return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx="30" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="60" cy="60" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
            </svg>
        </div>`;
        }
    
        //return display info of dice 4
        if(x == 4){
    
            return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx="30" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="30" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
            </svg>
        </div>`;
        }
    
        //return display info of dice 5
        if(x == 5){
    
            return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx="30" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="30" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="60" cy="60" r="5" stroke="black" stroke-width="4" fill="black" />
            </svg>
        </div>`;
        }
    
        //return display info of dice 6
        if(x == 6){
    
            return `<div class = "gdice" id = "gdice">
            <svg width="120" height="120">
                <rect x="0" y="0" width="120" height="120" stroke="black" stroke-width="4" fill = "white" />
                <circle cx="30" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="30" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="30" cy="90" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="30" cy="60" r="5" stroke="black" stroke-width="4" fill="black" />
                <circle cx="90" cy="60" r="5" stroke="black" stroke-width="4" fill="black" />
            </svg>
        </div>`;
        }
    }
}