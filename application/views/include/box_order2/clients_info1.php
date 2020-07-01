<div class="container-fluid internal_title"><strong>Clients Information</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
      <form id="clients_info_from" role="form" method="POST" action="<?php echo base_url();?>index.php/site_controller/client_info">
      <div class="row">
      
      <div class="col-md-6">
      <h5>Client Info</h5>
        <div class="input-group input-group-sm">
          <span class="input-group-addon">First Name: </span>
          <input type="text" name="firstName" class="form-control" required="required" placeholder="First Name">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Last Name: </span>
          <input type="text" name="lastName" class="form-control" required="required" placeholder="Last Name">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Father Name: </span>
          <input type="text" name="fatherName" class="form-control" placeholder="Father Name">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Mother Name: </span>
          <input type="text" name="motherName" class="form-control" placeholder="Mother Name">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Date of Birth: </span>
          <input type="text" name="dob" class="form-control pic_birth" placeholder="Pic Date of Birth">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Gender: </span>
          <select name="gender" class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          </select>
        </div>
        
        <h5>Client Address</h5>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Present Address: </span>
          <input type="text" name="presentAddress" class="form-control" placeholder="Present Address">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Permanent Address: </span>
          <input type="text" name="parmannentAddress" class="form-control" placeholder="Permanent Address">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon" >Nationality: </span>
            <select class="form-control" name="nationality">
          <option>Bangladeshi</option>
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
          </span>
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Country: </span>
          <select class="form-control" name="countryCode">
          <option>Bangladesh</option>
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
          </span>
          
        </div>

       </div>

      <div class="col-md-6">
       <h5>Client Contact Information</h5>
       
       <div class="input-group input-group-sm">
          <span class="input-group-addon">Contact No: </span>
          <input type="text"  name="contactNo" class="form-control" required="required" placeholder="Contact No">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Email: </span>
          <input type="email" name="emailAddress" class="form-control" placeholder="Email Address">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Passport No: </span>
          <input type="text" name="passportNo" class="form-control" placeholder="Passport Number">
        </div>
        
        <div class="seperat10"></div>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">National Id: </span>
          <input type="text" name="nID" class="form-control" placeholder="National Id Card Number">
        </div>
        
        <h5>Aditional Information</h5>
        
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Corporate Name: </span>
          <select name="corpID" class="form-control client_corporate_show">
          </select>
          
          <span class="input-group-btn">
          <button class="btn btn-default newcorp" type="button"><i class="fa fa-plus"></i></button>
          </span>
          
        </div>
        
      <h5>Client's Photo</h5>
      
      <div class="fileinput fileinput-new" style="position:relative" data-provides="fileinput">
       <div class="fileinput-new thumbnail" style="width: 300px; height: 203px;">
        <button type="button" style="position:absolute; right:10px; top:5px;" aria-hidden="true"><i class="fa fa-times"></i></button>
        <button class="mmm" type="button" style="position:absolute; right:10px; top:40px;" aria-hidden="true"><i class="fa fa-plus-square"></i><input type="file" class="upload" /></button>
        <img class="minage" src="<?php echo base_url(); ?>assets/element_image/300x200.gif" height="200px" width="300px" data-src="holder.js/100%x100%" alt="Logo">
      </div>
     </div>
      </div>
      
      </div>
      
      <div class="seperat10"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="massage_client_info"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-default btn-sm cencel_client_add"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>
      </form>

      </div>