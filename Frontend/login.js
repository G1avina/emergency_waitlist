

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
    xmlhttp.open("POST", "/API/api.php?action=test", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify(jsonData));
}


function testApi(){
    $("#test").click(function(){
        clickTest();
    });
}

testApi()





//-----------------------------Login Form API Response Handler-------------------------------
document.getElementById("LoginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission
            
    // Get form data
    var jsonData = {
        "username": document.getElementById("username").value,
        "password": document.getElementById("password").value,
    };
    console.log(JSON.stringify(jsonData));

    // Send form data to server using fetch API
    fetch(this.action, {
        method: this.method,
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(jsonData)
        })

    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          
        if (response.redirected) {
            // If redirected, you can handle it accordingly
            console.log('Redirected to:', response.url);
            window.location.href = response.url; // Perform the redirect
          } else {
            // If not redirected, handle the response as needed
            console.log('Received response:', response);
          }
        })

    .then(data => { 
        // Handle the response data here
        console.log(data); // For example, log the response data to console
        // You can update the UI based on the response here
    })
    .catch(error => {
        console.error('Error:', error); // Log any errors that occur during fetch
    });
});