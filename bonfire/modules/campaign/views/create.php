<style>
.common{margin: 10px; padding-bottom: 15px;}
.common p:first-child{font-weight: 550;}
body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

.tab-pane {
    padding: 10px;
}
</style>
<!------ Include the above in your HEAD tag ---------->
<main id="main">
  <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Inner Page</h2>
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Start Project</li>
            </ol>
          </div>
        </div>
  </section>
  <section class="inner-page">
    <div class="container">
    	<div class="card card-outline-secondary">
                <div class="card-body">
                	<div class="page-container row">
                		<div class="col-lg-12">
                        	<nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link <?php echo $active_tab == 'project' ? 'active' : ''; ?>" id="nav-home-tab" <?php echo $active_tab == 'project' ? 'data-toggle="tab"' : ''; ?> href="#nav-project" role="tab" aria-controls="nav-home" aria-selected="true">Project</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'funding' ? 'active' : ''; ?>" id="nav-profile-tab" <?php echo $active_tab == 'funding' ? 'data-toggle="tab"' : ''; ?> href="#nav-funding" role="tab" aria-controls="nav-profile" aria-selected="false">Campagin & Funding Details</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'people_team' ? 'active' : ''; ?>" id="nav-contact-tab" <?php echo $active_tab == 'people_team' ? 'data-toggle="tab"' : ''; ?> href="#nav-people_team" role="tab" aria-controls="nav-contact" aria-selected="false">People/team</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'payment' ? 'active' : ''; ?> " id="nav-contact1-tab" <?php echo $active_tab == 'payment' ? 'data-toggle="tab"' : ''; ?> href="#nav-payment" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Details</a>
                              </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane <?php echo $active_tab == 'project' ? 'active' : ''; ?>" id="nav-project" role="tabpanel" aria-labelledby="nav-home-tab">
                              		
                              	 <?php
                              	 if($active_tab == 'project') {
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                    echo form_open_multipart('campaign/create', $attributes);
                                  ?> 
                                      <div class="form-group row">
                                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-6">
                                             <?php echo 
                                                form_input(array('class' => form_error('title') ? 'form-control is-invalid' : 'form-control', 'id'=>'title', 'name'=>'title', 'type'=>'text', 'value'=>set_value('title'),)); 
                                                echo '<div class="invalid-feedback">'.form_error('title').'</div>';
                                             ?>
                                         </div>
                                      </div>
                                       <div class="form-group row">
                                          <label for="subtitle" class="col-sm-3 col-form-label">Subtitle</label>
                                          <div class="col-sm-6">
                                               <?php echo form_input(array('class' => form_error('subtitle') ? 'form-control is-invalid' : 'form-control', 'id'=>'subtitle', 'name'=>'subtitle', 'type'=>'text', 'value'=>set_value('subtitle'),)); echo '<div class="invalid-feedback">'.form_error('subtitle').'</div>';?>   
                                           </div>
                                        </div>	
                                        <div class="form-group row">
                                          <label for="category" class="col-sm-3 col-form-label">Category</label>
                                          <div class="col-sm-6">
                                               <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
                                                 <?php
                                                  echo form_dropdown('category', $category_list, set_value('category'), '','class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('category').'</div>';
                                                ?>     
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="sub_category" class="col-sm-3 col-form-label">Sub Category</label>
                                          <div class="col-sm-6">
                                               <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
                                                 <?php
                                                  echo form_dropdown('sub_category', $category_list, set_value('sub_category'), '','class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('sub_category').'</div>';
                                                ?>     
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="target_audience" class="col-sm-3 col-form-label">Target Audience</label>
                                          <div class="col-sm-6">
                                                <?php
                                                  $audiencearr=array();
                                                  for($i=1; $i<=10; $i++)
                                                  {
                                                    $audiencearr[$i.'000']=$i;
                                                  }
                                                  echo form_dropdown('target_audience', $audiencearr, set_value('target_audience'), '','class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('target_audience').'</div>';
                                                ?>          
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="description" class="col-sm-3 col-form-label">Project description</label>
                                          <div class="col-sm-6">
                                                <?php echo form_textarea(array('class' => form_error('description') ? 'form-control is-invalid' : 'form-control',  'id'=>'description', 'name'=>'description', 'type'=>'text', 'value'=>set_value('description'), 'placeholder'=>"Start typing your description...")); echo '<div class="invalid-feedback">'.form_error('description').'</div>';?>      
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label">Image</label>
                                          <div class="col-sm-6">
                                                    <?php echo form_upload(array('class' => form_error('image') ? 'form-control is-invalid' : 'form-control', 'name'=>'image','id'=>'image')); echo '<div class="invalid-feedback">'.form_error('image').'</div>';?>
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label">Video</label>
                                          <div class="col-sm-6">
                                              <?php echo form_input(array('class' => form_error('video_url') ? 'form-control is-invalid' : 'form-control',  'id'=>'video_url', 'name'=>'video_url', 'type'=>'text', 'value'=>set_value('video_url'), 'placeholder'=>"Youtube Video Url")); echo '<div class="invalid-feedback">'.form_error('video_url').'</div>';?>
                                              <small id="videoHelp" class="form-text text-muted">If you add the video you have a better chance of getting noticed</small> 
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <div class="col-sm-12 col-md-offset-3">
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save" >Next</button> 
                                           </div>
                                        </div>  
                                    <?php
                                    echo form_close();
                              	 }
                                    ?>  
                              
                              </div>
                              <div class="tab-pane <?php echo $active_tab == 'funding' ? 'active' : ''; ?>" id="nav-funding" role="tabpanel" aria-labelledby="nav-profile-tab">
                              	 <?php
                              	     if($active_tab == 'funding') {
                                      $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('campaign/funding/'.$this->uri->segment(3).'', $attributes);
                                  ?> 
                                     <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">
                                          Campaign duration
                                          <p>Set a time limit for your campaign. You won't be able to change this after you launch.</p>
                                        </label>
                                        <div class="col-sm-6">
                                              <div class="form-group row">
                                                <label class="form-check-label">
                                                  <input type="radio" checked  class="form-check-input" id="deadline_selecter" name="deadline_selecter" value="DAY">Fixed number of days(1-60)
                                                </label>
                                              </div>
                                              <div class="form-group row show1">
                                                  <?php echo form_input(array('class' => form_error('deadline_day') ? 'form-control is-invalid' : 'form-control',  'id'=>'deadline_day', 'name'=>'deadline_day', 'type'=>'text', 'value'=>set_value('deadline_day'), 'placeholder'=>"60")); echo '<div class="invalid-feedback">'.form_error('deadline_day').'</div>';?>   
                                        
                                              </div>
                                            <div class="form-group row">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" id="deadline_selecter" name="deadline_selecter" value="DATE_TIME">End on a specific date & time
                                              </label>
                                            </div>
                                              <div class="form-group row option2 show2" style="display:none;">
                                                 <?php echo form_input(array('class' => form_error('deadline_date') ? 'form-control is-invalid' : 'form-control',  'id'=>'deadline_date', 'name'=>'deadline_date', 'type'=>'date', 'value'=>set_value('deadline_date'),)); echo '<div class="invalid-feedback">'.form_error('deadline_date').'</div>';?>   
                                                  <?php echo form_input(array('class' => form_error('deadline_time') ? 'form-control is-invalid' : 'form-control',  'id'=>'deadline_time', 'name'=>'deadline_time', 'type'=>'time', 'value'=>set_value('deadline_time'),)); echo '<div class="invalid-feedback">'.form_error('deadline_time').'</div>';?>   
                                              </div>

                                         </div>
                                     </div>
                                     <div class="form-group row">
                                          <label for="80G_availablity" class="col-sm-3 col-form-label">Target Audience</label>
                                          <div class="col-sm-6">
                                                <?php
                                                $yesarr= array('Yes' => 'Yes','No' => 'No',);
                                                echo form_dropdown('80G_availablity', $yesarr, set_value('80G_availablity'),'class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('80G_availablity').'</div>';
                                                ?> 
                                               <p>option to provide 80G certificate to the donor</p>
                                               <p>Campaigners who are able to provide the 80G certificate usually get more support and  backers.</p>          
                                           </div>
                                     </div>    
                                     <div class="form-group row">
                                     
        <script>
        $(document).on('input','#goal',function(){
              var amount=$("#goal").val();
              var tan_per=amount*10/100;
              var eight_per=amount*18/100;
              var pro_fee=parseFloat(amount) + parseFloat(tan_per);
              var taxes=parseFloat(amount) + parseFloat(eight_per);
              var totalamount=parseFloat(amount) + parseFloat(tan_per) + parseFloat(eight_per);
             $("#final_goal").val(totalamount);
           	 $('#pro_fee').text(pro_fee);
             $('#taxes').text(taxes);        
        });
        </script>                             
                                  <style>
                                  #final_goal{background: transparent;color: #fff; border:none;}
                                  </style>   
                                        <label for="" class="col-sm-3 col-form-label">Amount required</label>
                                         <div class="col-sm-6">
                                                <?php echo form_input(array('class' => form_error('goal') ? 'form-control is-invalid' : 'form-control',  'id'=>'goal', 'name'=>'goal', 'type'=>'text', 'value'=>set_value('goal'), 'placeholder'=>"2000.00")); echo '<div class="invalid-feedback">'.form_error('goal').'</div>';?>   
                                         </div>
                                         <div class="col-sm-12 col-sm-offset-2">
                                             <table class="table table-bordered  table-sm">
                                              <caption class="bg-warning text-white text-center">Funding Goal - Rs <input type="text" readonly="" name="final_goal" id="final_goal" value="" >  
                                              </caption>
                                               <thead class="thead-dark">
                                                 <tr>
                                                   <th>Particulars</th>
                                                   <th>Percentage</th>
                                                   <th>Amount</th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                 <tr>
                                                   <td>Processing Fee</td>
                                                   <td>10%</td>
                                                   <td id="pro_fee"></td>
                                                 </tr>
                                                 <tr>
                                                   <td>Taxes</td>
                                                   <td>18%</td>
                                                   <td id="taxes"></td>
                                                 </tr>
                                               </tbody>
                                             </table>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                          <div class="col-sm-12 col-md-offset-3">
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save"  >Next</button> 
                                           </div>
                                     </div>    
                                  <?php
                                    echo form_close();
                              	   }
                                  ?>
                              </div>
                              <div class="tab-pane <?php echo $active_tab == 'people_team' ? 'active' : ''; ?>" id="nav-people_team" role="tabpanel" aria-labelledby="nav-contact-tab">
                              	<button type="button" class="user_tab">User</button><button class="company_tab" type="button">Company</button> 
                                 <?php
                                    if($active_tab == 'people_team') {
                                      $attributes = array('class' => 'form-horizontal user_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('Campaign/people_team/'.$this->uri->segment(3).'', $attributes);
                                  ?>
                                  <div class="people_block">
                                     <div class="single_people_block">
                                          <h1>User Detail</h1>
                                          <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-3">
                                             <?php echo form_input(array('class' => form_error('name') ? 'form-control is-invalid' : 'form-control',  'id'=>'name', 'name'=>'name', 'type'=>'text', 'value'=>set_value('name'),)); echo '<div class="invalid-feedback">'.form_error('name').'</div>';?>    
                                             </div>

                                             <label for="education" class="col-sm-3 col-form-label">Education Degree</label>
                                            <div class="col-sm-3">
                                             <?php 
                                             echo form_dropdown('education',array('ba' => 'ba','bca'=>'bca'),set_value('education'),'class="form-control"'); 
                                             echo '<div class="invalid-feedback">'.form_error('education').'</div>';?>    
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="email_id" class="col-sm-3 col-form-label">Email ID</label>
                                                <div class="col-sm-3">
                                                     <?php echo form_input(array('class' => form_error('email_id') ? 'form-control is-invalid' : 'form-control',  'id'=>'email_id', 'name'=>'email_id', 'type'=>'text', 'value'=>set_value('email_id'),)); echo '<div class="invalid-feedback">'.form_error('email_id').'</div>';?>    
                                                 </div>
                                        
                                                <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-3">
                                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'phone_number', 'name'=>'phone_number', 'type'=>'text', 'value'=>set_value('phone_number'),)); echo '<div class="invalid-feedback">'.form_error('phone_number').'</div>';?>    
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="facebook_profile_link" class="col-sm-3 col-form-label">Facebook Profile Link</label>
                                                <div class="col-sm-3">
                                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'facebook_profile_link', 'name'=>'facebook_profile_link', 'type'=>'text', 'value'=>set_value('facebook_profile_link'),)); echo '<div class="invalid-feedback">'.form_error('facebook_profile_link').'</div>';?>    
                                                 </div>
                                                <label for="linkedin_profile_link" class="col-sm-3 col-form-label">LinkedIn Profile Link</label>
                                                <div class="col-sm-3">
                                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'linkedin_profile_link', 'name'=>'linkedin_profile_link', 'type'=>'text', 'value'=>set_value('linkedin_profile_link'),)); echo '<div class="invalid-feedback">'.form_error('linkedin_profile_link').'</div>';?>    
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="twitter_profile_link" class="col-sm-3 col-form-label">Twitter Profile Link</label>
                                              <div class="col-sm-3">
                                                   <?php echo form_input(array('class' =>'form-control', 'id'=>'twitter_profile_link', 'name'=>'twitter_profile_link', 'type'=>'text', 'value'=>set_value('twitter_profile_link'),)); echo '<div class="invalid-feedback">'.form_error('twitter_profile_link').'</div>';?>    
                                               </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="adhaarcard" class="col-sm-3 col-form-label">Adhaar Card</label>
                                                <div class="col-sm-3">
                                                <?php echo form_upload(array('class' => form_error('adhaarcard') ? 'form-control is-invalid' : 'form-control', 'name'=>'adhaarcard','id'=>'adhaarcard')); echo '<div class="invalid-feedback">'.form_error('adhaarcard').'</div>';?>
                                                 </div>
                                                <label for="pancard" class="col-sm-3 col-form-label">Pan Card</label>
                                                <div class="col-sm-3">
                                                 <?php echo form_upload(array('class' => form_error('pancard') ? 'form-control is-invalid' : 'form-control', 'name'=>'pancard','id'=>'pancard')); echo '<div class="invalid-feedback">'.form_error('pancard').'</div>';?>
                                                </div>
                                          </div>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-sm-12 col-md-offset-3">
                                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save" >Next</button> 
                                           </div>
                                     </div> 
                                <?php echo form_close();?>
                                <?php
                                      $attributes = array('style'=>"display:none",'class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('campaign/company/'.$this->uri->segment(3).'', $attributes);
                                ?>
                                  <div class="form-group row">
                                    <label for="company_name" class="col-sm-6 col-form-label">Company Name</label>
                                    <div class="col-sm-6">
                                     <?php echo form_input(array('class' => form_error('company_name') ? 'form-control is-invalid' : 'form-control',  'id'=>'company_name', 'name'=>'company_name', 'type'=>'text', 'value'=>set_value('company_name'),)); echo '<div class="invalid-feedback">'.form_error('company_name').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="company_name" class="col-sm-6 col-form-label">Company Name</label>
                                    <div class="col-sm-6">
                                    
                                    <?php
                                    $no_directorArr=array();
                                    for($i=1; $i<=10; $i++)
                                    {
                                        $no_directorArr[$i]=$i;
                                    }
                                    echo form_dropdown('no_of_director',$no_directorArr,set_value('no_of_director'),'class="form-control"');  echo '<div class="invalid-feedback">'.form_error('no_of_director').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                   <script>
                                   $('#add_director').click(function()
                                   {      $('.director_block').append($('.single_director_block').html());
                                       //   $(' .single_director_block:last').append(removeBtn);
                                     });
                                   </script>
                                   <table class="table">
                                    <thead class="thead-dark">
                                    <tr><th>Name of 1sr Director</th><th>DIN of 1st Director</th></tr>
                                    </thead>
                                    <tbody class="single_director_block">
                                    <tr class="director_block">
                                    	<td><?php echo form_input(array('class' => form_error('name_director') ? 'form-control is-invalid' : 'form-control',  'id'=>'name_director', 'name'=>'name_director[]', 'type'=>'text', 'value'=>set_value('name_director'),)); echo '<div class="invalid-feedback">'.form_error('name_director').'</div>';?></td>
                                     	<td><?php echo form_input(array('class' =>'form-control', 'id'=>'din_director', 'name'=>'din_director[]', 'type'=>'text', 'value'=>set_value('din_director'),)); echo '<div class="invalid-feedback">'.form_error('din_director').'</div>';?></td>
                                    	<td>
                                    		<button type="button" class="btn btn-default" id="add_director">+</button> <button type="button" class="btn btn-default" id="remove_director">-</button>
                                    	</td>
                                     </tr>
                                     
                                    </tbody>
                                   </table> 
                                   </div>
                                  <div class="form-group row">
                                        <label for="registered_address" class="col-sm-6 col-form-label">Registered Address</label>
                                        <div class="col-sm-6">
                                     		<?php echo form_input(array('class' => form_error('registered_address') ? 'form-control is-invalid' : 'form-control',  'id'=>'registered_address', 'name'=>'registered_address', 'type'=>'text', 'value'=>set_value('registered_address'),)); echo '<div class="invalid-feedback">'.form_error('registered_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Communication Address</label>
                                        <div class="col-sm-6">
                                     		<?php echo form_input(array('class' => form_error('communication_address') ? 'form-control is-invalid' : 'form-control',  'id'=>'communication_address', 'name'=>'communication_address', 'type'=>'text', 'value'=>set_value('communication_address'),)); echo '<div class="invalid-feedback">'.form_error('communication_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="gst" class="col-sm-6 col-form-label">GST Number</label>
                                      <div class="col-sm-6">
                                     		<?php echo form_input(array('class' => form_error('gst') ? 'form-control is-invalid' : 'form-control',  'id'=>'gst', 'name'=>'gst', 'type'=>'text', 'value'=>set_value('gst'),)); echo '<div class="invalid-feedback">'.form_error('gst').'</div>';?>    
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="cin_img" class="col-sm-6 col-form-label">Upload CIN</label>
                                        <div class="col-sm-6">
                                     		<?php echo form_upload(array('class' => form_error('cin_img') ? 'form-control is-invalid' : 'form-control',  'id'=>'cin_img', 'name'=>'cin_img', 'value'=>set_value('cin_img'),)); echo '<div class="invalid-feedback">'.form_error('cin_img').'</div>';?>    
                                           </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="pan_img" class="col-sm-6 col-form-label">Company Pan</label>
                                        <div class="col-sm-6">
                                     		<?php echo form_upload(array('class' => form_error('pan_img') ? 'form-control is-invalid' : 'form-control',  'id'=>'pan_img', 'name'=>'pan_img', 'value'=>set_value('pan_img'),)); echo '<div class="invalid-feedback">'.form_error('pan_img').'</div>';?>    
                                         </div>
                                  </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12 col-md-offset-3">
                                           <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save" >Next</button> 
                                         </div>
                                   </div>    
                                <?php echo form_close();
                                    }
                                ?>
                              
                              </div>
                              <div class="tab-pane <?php echo $active_tab == 'payment' ? 'active' : ''; ?> " id="nav-payment" role="tabpanel" aria-labelledby="nav-contact-tab">
                              	 <?php
                              	 if($active_tab == 'payment') {
                                      $attributes = array('class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('campaign/payment/'.$this->uri->segment(3).'', $attributes);
                                ?>
                                   <div class="form-group row">
                                        <label for="account_number" class="col-sm-6 col-form-label">Account Number</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'account_number', 'name'=>'account_number', 'type'=>'text', 'value'=>set_value('account_number'),)); echo '<div class="invalid-feedback">'.form_error('account_number').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="bank_name" class="col-sm-6 col-form-label">Bank Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'bank_name', 'name'=>'bank_name', 'type'=>'text', 'value'=>set_value('bank_name'),)); echo '<div class="invalid-feedback">'.form_error('bank_name').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="ifsc_code" class="col-sm-6 col-form-label">IFSC Code</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'ifsc_code', 'name'=>'ifsc_code', 'type'=>'text', 'value'=>set_value('ifsc_code'),)); echo '<div class="invalid-feedback">'.form_error('ifsc_code').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="account_holder_name" class="col-sm-6 col-form-label">Account Holders Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'account_holder_name', 'name'=>'account_holder_name', 'type'=>'text', 'value'=>set_value('account_holder_name'),)); echo '<div class="invalid-feedback">'.form_error('account_holder_name').'</div>';?>    
                                         </div>
                                  </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12 col-md-offset-3">
                                                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save" >Submit</button> 
                                         </div>
                                   </div>    
                                <?php
                                echo form_close();
                              	 }
                                ?>   
                              
                              </div>
                        	</div>
                        </div>
            
                </div>
            </div>
        </div>
        </div>
  </section>
</main>




<script>
	$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<script>
  $(document).on('click','.user_tab',function()
  {
    $('.user_profile').show();
    $('.company_profile').hide();
  });
  $(document).on('click','.company_tab',function(){
    $('.company_profile').show();
    $('.user_profile').hide();
  });
</script>
<script>
  $(document).on('click','#deadline_selecter', function(){
      var value=$(this).val();
      if('DAY'==value)
      {
        $('.show1').show();
        $('.show2').hide();   
      }
      else {
            $('.show2').show();
             $('.show1').hide();   
      }
  });
</script>
