//this file has some http request function usefull to look at for future refernces



//This js file handles click handlers for roles and score (activating and deactivating depending on state)
//It also performs action like creating the game objects.

//Server request created when you press the roll button----------------------------------------------
function clickRoll() {
    //json data for roll
    let jsonData = game.createJson();
   
    const xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if (xmlhttp.status == 200) {
        console.log(xmlhttp.responseText);
          var jsonResponse = JSON.parse(xmlhttp.responseText);
          game.updateInfo(jsonResponse);
          game.drawScreen();
          executeState(jsonResponse.state);
        }
      }
    
        
    };
    xmlhttp.open("POST", "/api.php?action=roll", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));
}




//Server request created when you press a score----------------------------------------------------------
function clickScore(idName) {

    //json data for roll
    let jsonData = game.createJson();
    jsonData.scoreClicked = idName;

    const xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if (xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
          var jsonResponse = JSON.parse(xmlhttp.responseText);
          game.updateInfo(jsonResponse);
          game.drawScreen();
          executeState(jsonResponse.state);

        }
      }
    };

    xmlhttp.open("POST", "/api.php?action=score", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));
}
//leaderboard post

function leaderboardPost() {

    //json data for roll
    let jsonData = {
        //player info 
        playerName: game.playerName,
        total: game.total,
    };

    const xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if (xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);

        }
      }
    };

    xmlhttp.open("POST", "/api.php?action=leaderboard", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));
}


//event handlers for dice sets-----------------------------------------------------------
function diceRollActivate(){
    document.getElementById('diceRoll').addEventListener('click',clickRoll);
}

function diceRollDeActivate(){

    document.getElementById('diceRoll').removeEventListener('click',clickRoll);
}

function diceStatusActivate(){
    let diceRoll1 = document.getElementById('d1Status');
    diceRoll1.addEventListener('click',d1StatusSet);

    let diceRoll2 = document.getElementById('d2Status');
    diceRoll2.addEventListener('click',d2StatusSet);

    let diceRoll3 = document.getElementById('d3Status');
    diceRoll3.addEventListener('click',d3StatusSet);

    let diceRoll4 = document.getElementById('d4Status');
    diceRoll4.addEventListener('click',d4StatusSet);

    let diceRoll5 = document.getElementById('d5Status');
    diceRoll5.addEventListener('click',d5StatusSet);
}

function diceStatusDeActivate(){
    let diceRoll1 = document.getElementById('d1Status');
    diceRoll1.removeEventListener('click',d1StatusSet);

    let diceRoll2 = document.getElementById('d2Status');
    diceRoll2.removeEventListener('click',d2StatusSet);

    let diceRoll3 = document.getElementById('d3Status');
    diceRoll3.removeEventListener('click',d3StatusSet);

    let diceRoll4 = document.getElementById('d4Status');
    diceRoll4.removeEventListener('click',d4StatusSet);

    let diceRoll5 = document.getElementById('d5Status');
    diceRoll5.removeEventListener('click',d5StatusSet);
}

function d1StatusSet(){
    if (game.dice1["set"] == 0){
        game.dice1["set"] = 1;
        document.getElementById('d1Status').innerHTML = "Saving";
    }else{
        document.getElementById('d1Status').innerHTML = "Rolling";
        game.dice1["set"] = 0;
    }
}

function d2StatusSet(){
    if (game.dice2["set"] == 0){
        game.dice2["set"] = 1;
        document.getElementById('d2Status').innerHTML = "Saving";
    }else{
        document.getElementById('d2Status').innerHTML = "Rolling";
        game.dice2["set"] = 0;
    }
}

function d3StatusSet(){
    if (game.dice3["set"] == 0){
        game.dice3["set"] = 1;
        document.getElementById('d3Status').innerHTML = "Saving";
    }else{
        document.getElementById('d3Status').innerHTML = "Rolling";
        game.dice3["set"] = 0;
    }
}

function d4StatusSet(){
    if (game.dice4["set"] == 0){
        game.dice4["set"] = 1;
        document.getElementById('d4Status').innerHTML = "Saving";
    }else{
        document.getElementById('d4Status').innerHTML = "Rolling";
        game.dice4["set"] = 0;
    }
}

function d5StatusSet(){
    if (game.dice5["set"] == 0){
        game.dice5["set"] = 1;
        document.getElementById('d5Status').innerHTML = "Saving";
    }else{
        document.getElementById('d5Status').innerHTML = "Rolling";
        game.dice5["set"] = 0;
    }
}

//event handlers for scores ---------------------------------------------------------------
function deactivateScore(idName,fun){
    document.getElementById(idName).removeEventListener('click',fun);
}


function deactivateAllScore(){
    deactivateScore('ones',onesFunc);
    deactivateScore('twos',twosFunc);
    deactivateScore('threes',threesFunc);
    deactivateScore('fours',foursFunc);
    deactivateScore('fives',fivesFunc);
    deactivateScore('sixes',sixesFunc);
    deactivateScore('onePair',onePairFunc);
    deactivateScore('twoPair',twoPairFunc);
    deactivateScore('threeOfKind',threeOfKindFunc);
    deactivateScore('fourOfKind',fourOfKindFunc);
    deactivateScore('smallStraight',smallStraightFunc);
    deactivateScore('largeStraight',largeStraightFunc);
    deactivateScore('fullHouse',fullHouseFunc);
    deactivateScore('chance',chanceFunc);
    deactivateScore('yatzy',yatzyFunc);

}

function activateAllScore(){
    if(game.ones.set == 0){
        onesFunc = selectScore('ones');
    }

    if(game.twos.set == 0){
        twosFunc = selectScore('twos');
    }

    if(game.threes.set == 0){
        threesFunc = selectScore('threes');
    }

    if(game.fours.set == 0){
        foursFunc = selectScore('fours');
    }

    if(game.fives.set == 0){
        fivesFunc = selectScore('fives');
    }

    if(game.sixes.set == 0){
        sixesFunc = selectScore('sixes');
    }

    if(game.onePair.set == 0){
        onePairFunc = selectScore('onePair');
    }

    if(game.twoPair.set == 0){
        twoPairFunc = selectScore('twoPair');
    }

    if(game.threeOfKind.set == 0){
        threeOfKindFunc = selectScore('threeOfKind');
    }

    if(game.fourOfKind.set == 0){
        fourOfKindFunc = selectScore('fourOfKind');
    }

    if(game.smallStraight.set == 0){
        smallStraightFunc = selectScore('smallStraight');
    }

    if(game.largeStraight.set == 0){
        largeStraightFunc = selectScore('largeStraight');
    }

    if(game.fullHouse.set == 0){
        fullHouseFunc = selectScore('fullHouse');
    }

    if(game.chance.set == 0){
        chanceFunc = selectScore('chance');
    }

    if(game.yatzy.set == 0){
        yatzyFunc = selectScore('yatzy');
    }
}



function selectScore(idName){

    clickHandler = function() {
    handleClick(idName);
};

document.getElementById(idName).addEventListener('click',clickHandler);
return clickHandler;
}

function handleClick(idName){
    if(idName == 'ones'){
        game.ones.set = 1;
    }
    if(idName == 'twos'){
        game.twos.set = 1;
    }
    if(idName == 'threes'){
        game.threes.set = 1;
    }
    if(idName == 'fours'){
        game.fours.set = 1;
    }
    if(idName == 'fives'){
        game.fives.set = 1;
    }
    if(idName == 'sixes'){
        game.sixes.set = 1;
    }
    if(idName == 'onePair'){
        game.onePair.set = 1;
    }
    if(idName == 'twoPair'){
        game.twoPair.set = 1;
    }
    if(idName == 'threeOfKind'){
        game.threeOfKind.set = 1;
    }
    if(idName == 'fourOfKind'){
        game.fourOfKind.set = 1;
    }
    if(idName == 'fullHouse'){
        game.fullHouse.set = 1;
    }
    if(idName == 'smallStraight'){
        game.smallStraight.set = 1;
    }
    if(idName == 'largeStraight'){
        game.largeStraight.set = 1;
    }
    if(idName == 'chance'){
        game.chance.set = 1;
    }
    if(idName == 'yatzy'){
        game.yatzy.set = 1;
    }
    document.getElementById(idName).style.color = "red";
    clickScore(idName); 
}

//--------------All things states--------------------------------------
function state0(){
    document.getElementById('state').innerHTML = "<h3>Roll the dices<h3>";
    diceRollActivate();
}

function state1(){
    diceRollActivate();
    deactivateAllScore();
    diceStatusDeActivate();
    document.getElementById('d1Status').innerHTML = "Rolling";
    game.dice1["set"] = 0;
    document.getElementById('d2Status').innerHTML = "Rolling";
    game.dice2["set"] = 0;
    document.getElementById('d3Status').innerHTML = "Rolling";
    game.dice3["set"] = 0;
    document.getElementById('d4Status').innerHTML = "Rolling";
    game.dice4["set"] = 0;
    document.getElementById('d5Status').innerHTML = "Rolling";
    game.dice5["set"] = 0;
}

function state2(){
    document.getElementById('state').innerHTML = "<h3>Roll the dices or Pick a score<h3>";
    diceStatusActivate();
    activateAllScore();
    diceRollActivate();
    

}
function state3(){
    document.getElementById('state').innerHTML = "<h3>Roll the dices or Pick a score<h3>";
}

function state4(){
    document.getElementById('state').innerHTML = "<h3>Pick a score<h3>";
    diceStatusDeActivate();
    diceRollDeActivate();
}

function state5(){
    document.getElementById('state').innerHTML = "<h3>CONGRATS your score is "+game.total+"<h3>"+"<br> Reload the page if you want to play again";
    document.getElementById('total').innerHTML = "TOTAL SCORE: "+ game.total;
    diceStatusDeActivate();
    deactivateAllScore();
    diceRollDeActivate();
    leaderboardPost();



}

function executeState(currentState){
    if(currentState==1){
        state1();
    }
    if(currentState==2){
        state2();
    }
    if(currentState==3){
        state3();
    }
    if(currentState==4){
        state4();
    }
    if(currentState==5){
        state5();
    }







}




//----------------------------------Things that are executed when game starts---------------------------
var userName = prompt("Please enter your name:");
var game = new Game(userName);
state0();


