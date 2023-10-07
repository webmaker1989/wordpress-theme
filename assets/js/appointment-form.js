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

  const options = {
    method: 'POST',
    body: formData // Use FormData as the request body
};


const url = `${form_val.url}?action=get_appointment`;

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