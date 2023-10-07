<form id="appointment">
    <h2>Send a message for appointment <?php the_title();?></h2>
    <div class="form-group row">   
            <div class="col-lg-6">
                    <input type="text" name="fname" placeholder="First Name"  class="form-control" id="firstname" required>
            </div>
    
            <div class="col-lg-6">
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" id="lastname" required>
            </div>

            <div class="col-lg-6">
                    <input type="text" name="message" placeholder="Your Message" class="form-control" id="msg">
            </div>
    
    </div>
    
    <div class="form-group">
           <button type="submit" class="btn btn-success btn-block" id="appointment-btn">Get Appointment</button>
    </div>

</form>

<div id= "appointment_info"> </div>


