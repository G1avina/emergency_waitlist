//-----------------------------Patient signup API Response Handler-------------------------------
document.getElementById("PatientSignupForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission
            
    // Get form data
    var jsonData = {
        "nom": document.getElementById("nom").value,
        "prenom": document.getElementById("prenom").value,
        "age": document.getElementById("age").value,
        "desc": document.getElementById("desc").value,
        "niv": document.getElementById("niv").value,
    };
    console.log(JSON.stringify(jsonData));

    // Send form data to server using fetch API
    fetch(this.action, {
        method: this.method,
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(jsonData)
        })

    .then(response => {
        if (response.redirected) {
            // If redirected, you can handle it accordingly
            console.log('Redirected to:', response.url);
            window.location.href = response.url; // Perform the redirect
          } else if (!response.ok) {
            throw new Error('Network response was not ok');
          } else {
            // If not redirected, handle the response as needed
            return response.json();
          }
        })

    .then(data => { 
        // Handle the response data here
        
        document.getElementById("error").innerHTML = data.error;
    })
    .catch(error => {
        console.error('Error:', error); // Log any errors that occur during fetch
    });
});