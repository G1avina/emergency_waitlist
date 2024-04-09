
document.querySelectorAll('#patientdelete').forEach(button => {

    button.addEventListener('click', function() {
        const url = '../API/apiAdminView.php';
        let profileId = button.getAttribute('data-patient-id');
        console.log(profileId);

        // Data to be sent in the request body
        const data = {
            id: profileId,
        };

        // Configuring the fetch request
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json' 
            },
            body: JSON.stringify(data) 
        })
        .then(response => response.json())


         .then(response => {
        if (response.redirected) {
            // If redirected, you can handle it accordingly
            console.log('Redirected to:', response.url);
            window.location.href = response.url; // Perform the redirect
          } else if (!response.ok) {
            throw new Error('Network response was not ok');
          } else {

            return response.json();
            //console.log('Received response:', response);
          }
        })

    .then(data => { 
        // Handle the response data here

        location.reload();
        document.getElementById("error").innerHTML = data.error;
    })

    .catch(error => {
        console.error('Error:', error); // Log any errors that occur during fetch
        location.reload();
    });
    });


});