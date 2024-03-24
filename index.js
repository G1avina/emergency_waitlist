function clickTest() {
    //json data for roll
    let jsonData = {
        request: "smt"
    };
   
    const xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                var jsonResponse = JSON.parse(xmlhttp.responseText);
                document.getElementById('testResponse').innerHTML = "Answer: " + jsonResponse.answer;

                
            }
        }
    
        
    };
    xmlhttp.open("POST", "/api.php?action=test", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));
}

function testApi(){
    document.getElementById('test').addEventListener('click',clickTest);
}

testApi()