console.log("appintment confirm");
console.log(form_val.url);
document.getElementById("appointment-btn").addEventListener('click', submit_data);

function submit_data(e){
    e.preventDefault();
   // alert("hello");
   let form = document.getElementById('appointment');
   // let firstname =document.getElementById('firstname').value;

   let firstname = form.elements.firstname.value;
   let lastname = form.elements.lastname.value;
   let msg = form.elements.msg.value;
   // console.log(firstname + " " + lastname + " " + msg);

   // Create a FormData object to send form data
   var formData = new FormData();
   formData.append('fname', firstname);
   formData.append('lname', lastname);
   formData.append('msg', msg);

  //console.log(formdata);


const url = `${form_val.url}?action=get_appointment`;

fetch(url , {
    method: 'POST',
    body: formData // Use FormData as the request body
})
.then(response => response.json())

.then(response => {
    // Handle the response.
    console.log(response);
})

.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
    // Handle errors here
});
}





/***
 * 
 */

/*
console.log("appointment confirm");
console.log(form_val.url);
document.getElementById("appointment-btn").addEventListener('click', submit_data);

function submit_data(e){
    e.preventDefault();

    let form = document.getElementById('appointment');

    let firstname = form.elements.firstname.value;
    let lastname = form.elements.lastname.value;
    let msg = form.elements.msg.value;

    // Create a JavaScript object to represent the form data
    const formData = {
        fname: firstname,
        lname: lastname,
        msg: msg
    };

    // Convert the object to JSON
    const formDataJSON = JSON.stringify(formData);

    const url = `${form_val.url}?action=get_appointment`;

    const options = {
        method: 'POST',
        body: formDataJSON, // Use JSON as the request body
        headers: {
            'Content-Type': 'application/json' // Specify that you are sending JSON data
        }
    };

    fetch(url, options)
    .then(response => response.json())
    .then(response => {
        // Handle the response.
        console.log(response);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        // Handle errors here
    });
}


*/