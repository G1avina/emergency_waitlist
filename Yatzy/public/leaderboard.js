//again not going to be usefull

class Leaderboard {

    //Image of the game on start up
    top1;
    top2;
    top3;
    top4;
    top5;
    top6;
    top7;
    top8;
    top9;
    top10;
    topArray;



    constructor() {
        this.top1 = { name: 0, score: 0 };
        this.top2 = { name: 0, score: 0 };
        this.top3 = { name: 0, score: 0 };
        this.top4 = { name: 0, score: 0 };
        this.top5 = { name: 0, score: 0 };
        this.top6 = { name: 0, score: 0 };
        this.top7 = { name: 0, score: 0 };
        this.top8 = { name: 0, score: 0 };
        this.top9 = { name: 0, score: 0 };
        this.top10 = { name: 0, score: 0 };

        this.topArray = [this.top1,this.top2,this.top3,this.top4,this.top5,this.top6,this.top7,this.top8,this.top9,this.top10];
    }

    upTopArray(){

        this.topArray = [this.top1,this.top2,this.top3,this.top4,this.top5,this.top6,this.top7,this.top8,this.top9,this.top10];


    }

    draw(){

        document.getElementById("top1name").innerHTML = this.top1.name;
        document.getElementById("top1score").innerHTML = this.top1.score;

        document.getElementById("top2name").innerHTML = this.top2.name;
        document.getElementById("top2score").innerHTML = this.top2.score;

        document.getElementById("top3name").innerHTML = this.top3.name;
        document.getElementById("top3score").innerHTML = this.top3.score;

        document.getElementById("top4name").innerHTML = this.top4.name;
        document.getElementById("top4score").innerHTML = this.top4.score;


        document.getElementById("top5name").innerHTML = this.top5.name;
        document.getElementById("top5score").innerHTML = this.top5.score;


        document.getElementById("top6name").innerHTML = this.top6.name;
        document.getElementById("top6score").innerHTML = this.top6.score;


        document.getElementById("top7name").innerHTML = this.top7.name;
        document.getElementById("top7score").innerHTML = this.top7.score;


        document.getElementById("top8name").innerHTML = this.top8.name;
        document.getElementById("top8score").innerHTML = this.top8.score;


        document.getElementById("top9name").innerHTML = this.top9.name;
        document.getElementById("top9score").innerHTML = this.top9.score;


        document.getElementById("top10name").innerHTML = this.top10.name;
        document.getElementById("top10score").innerHTML = this.top10.score;





    }


}




function getLeaderboard() {

    //json data for roll
    let jsonData = {
        //player info 
        none: "nothingHere",
    };

    const xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if (xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
          var jsonResponse = JSON.parse(xmlhttp.responseText);
          console.log(jsonResponse);
          leaderboard.top1.name = jsonResponse.playerName1;
          leaderboard.top1.score = jsonResponse.score1;

          leaderboard.top2.name = jsonResponse.playerName2;
          leaderboard.top2.score = jsonResponse.score2;

          leaderboard.top3.name = jsonResponse.playerName3;
          leaderboard.top3.score = jsonResponse.score3;

          leaderboard.top4.name = jsonResponse.playerName4;
          leaderboard.top4.score = jsonResponse.score4;

          leaderboard.top5.name = jsonResponse.playerName5;
          leaderboard.top5.score = jsonResponse.score5;

          leaderboard.top6.name = jsonResponse.playerName6;
          leaderboard.top6.score = jsonResponse.score6;

          leaderboard.top7.name = jsonResponse.playerName7;
          leaderboard.top7.score = jsonResponse.score7;

          leaderboard.top8.name = jsonResponse.playerName8;
          leaderboard.top8.score = jsonResponse.score8;

          leaderboard.top9.name = jsonResponse.playerName9;
          leaderboard.top9.score = jsonResponse.score9;

          leaderboard.top10.name = jsonResponse.playerName10;
          leaderboard.top10.score = jsonResponse.score10;
          leaderboard.draw();

          

        }
      }
    };

    xmlhttp.open("POST", "/api.php?action=getleaderboard", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));


}


var leaderboard = new Leaderboard();
getLeaderboard();
leaderboard.draw();