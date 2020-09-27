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
                                <a class="nav-item nav-link active" id="nav-home-tab" <?php echo $active_tab == 'project' ? 'data-toggle="tab"' : ''; ?> href="#nav-project" role="tab" aria-controls="nav-home" aria-selected="true">Project</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" <?php echo $active_tab == 'funding' ? 'data-toggle="tab"' : ''; ?> href="#nav-funding" role="tab" aria-controls="nav-profile" aria-selected="false">Campagin & Funding Details</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" <?php echo $active_tab == 'people_team' ? 'data-toggle="tab"' : ''; ?> href="#nav-people_team" role="tab" aria-controls="nav-contact" aria-selected="false">People/team</a>
                                <a class="nav-item nav-link" id="nav-contact1-tab" <?php echo $active_tab == 'payment' ? 'data-toggle="tab"' : ''; ?> href="#nav-payment" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Details</a>
                              </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-project" role="tabpanel" aria-labelledby="nav-home-tab">
                              		
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
                                               <?php echo form_input(array('class' =>'form-control', 'id'=>'subtitle', 'name'=>'subtitle', 'type'=>'text', 'value'=>set_value('subtitle'),)); echo '<div class="error">'.form_error('subtitle').'</div>';?>   
                                           </div>
                                        </div>	
                                        <div class="form-group row">
                                          <label for="category" class="col-sm-3 col-form-label">Category</label>
                                          <div class="col-sm-6">
                                               <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
                                                 <?php
                                                  echo form_dropdown('category', $category_list, set_value('category'), '','class="form-control"');
                                                  echo '<div class="error">'.form_error('category').'</div>';
                                                ?>     
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="sub_category" class="col-sm-3 col-form-label">Sub Category</label>
                                          <div class="col-sm-6">
                                               <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
                                                 <?php
                                                  echo form_dropdown('sub_category', $category_list, set_value('sub_category'), '','class="form-control"');
                                                  echo '<div class="error">'.form_error('sub_category').'</div>';
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
                                                  echo '<div class="error">'.form_error('target_audience').'</div>';
                                                ?>          
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="txtEditor" class="col-sm-3 col-form-label">Project description</label>
                                          <div class="col-sm-6">
                                                <?php echo form_textarea(array('class' =>'form-control', 'id'=>'description', 'name'=>'txtEditor', 'type'=>'text', 'value'=>set_value('txtEditor'), 'placeholder'=>"Start typing your description...")); echo '<div class="error">'.form_error('txtEditor').'</div>';?>      
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label">Image</label>
                                          <div class="col-sm-6">
                                                    <?php echo form_upload(array('class'=>'form-control','name'=>'userfile','id'=>'userfile')); ?>
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label">Video</label>
                                          <div class="col-sm-6">
                                              <?php echo form_input(array('class' =>'form-control', 'id'=>'video_url', 'name'=>'video_url', 'type'=>'text', 'value'=>set_value('video_url'), 'placeholder'=>"Youtube Video Url")); echo '<div class="error">'.form_error('video_url').'</div>';?>
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
                              <div class="tab-pane fade" id="nav-funding" role="tabpanel" aria-labelledby="nav-profile-tab">
                              	 <?php
                              	     if($active_tab == 'funding') {
                                      $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('Campaign/new', $attributes);
                                  ?> 
                                     <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">
                                          Campaign duration
                                          <p>Set a time limit for your campaign. You won't be able to change this after you launch.</p>
                                        </label>
                                        <div class="col-sm-6">
                                           <?php echo form_input(array('class' =>'form-control', 'id'=>'launched', 'name'=>'launched', 'type'=>'text', 'value'=>set_value('launched'), 'placeholder'=>"")); echo '<div class="error">'.form_error('launched').'</div>';?>  
                                              <?php echo form_input(array('class' =>'form-control', 'id'=>'fixed_day_value', 'name'=>'fixed_day_value', 'type'=>'text', 'value'=>set_value('fixed_day_value'), 'placeholder'=>"")); echo '<div class="error">'.form_error('fixed_day_value').'</div>';?>   
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                          <label for="80G_availablity" class="col-sm-3 col-form-label">Target Audience</label>
                                          <div class="col-sm-6">
                                                <?php
                                                $yesarr= array('Yes' => 'Yes','No' => 'No',);
                                                echo form_dropdown('80G_availablity', $yesarr, set_value('80G_availablity'),'class="form-control"');
                                                  echo '<div class="error">'.form_error('80G_availablity').'</div>';
                                                ?> 
                                               <p>option to provide 80G certificate to the donor</p>
                                               <p>Campaigners who are able to provide the 80G certificate usually get more support and  backers.</p>          
                                           </div>
                                     </div>    
                                     <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Amount required</label>
                                         <div class="col-sm-6">
                                                <?php echo form_input(array('class' =>'form-control', 'id'=>'goal', 'name'=>'goal', 'type'=>'text', 'value'=>set_value('goal'), 'placeholder'=>"2000.00")); echo '<div class="error">'.form_error('goal').'</div>';?>   
                                         </div>
                                         <div class="col-sm-12 col-sm-offset-2">
                                             <table class="table table-bordered  table-sm">
                                              <caption class="bg-warning text-white text-center">Funding Goal - Rs 64,00,000</caption>
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
                                                   <td>5,00,000</td>
                                                 </tr>
                                                 <tr>
                                                   <td>Taxes</td>
                                                   <td>18%</td>
                                                   <td>9,00,000</td>
                                                 </tr>
                                               </tbody>
                                             </table>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                          <div class="col-sm-12 col-md-offset-3">
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> 
                                           </div>
                                     </div>    
                                  <?php
                                    echo form_close();
                              	   }
                                  ?>
                              </div>
                              <div class="tab-pane fade" id="nav-people_team" role="tabpanel" aria-labelledby="nav-contact-tab">
                              	<button type="button" class="user_tab">User</button><button class="company_tab" type="button">Company</button>
                                <?php
                                    if($active_tab == 'people_team') {
                                      $attributes = array('class' => 'form-horizontal user_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('Campaign/new', $attributes);
                                  ?>
                                  <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'name', 'name'=>'name', 'type'=>'text', 'value'=>set_value('name'),)); echo '<div class="error">'.form_error('name').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Email ID</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'email', 'name'=>'email', 'type'=>'text', 'value'=>set_value('email'),)); echo '<div class="error">'.form_error('email').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Phone Number</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'phone', 'name'=>'phone', 'type'=>'text', 'value'=>set_value('phone'),)); echo '<div class="error">'.form_error('phone').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Facebook Profile Link</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'facebook', 'name'=>'facebook', 'type'=>'text', 'value'=>set_value('facebook'),)); echo '<div class="error">'.form_error('facebook').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="linkedin" class="col-sm-6 col-form-label">LinkedIn Profile Link</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'linkedin', 'name'=>'linkedin', 'type'=>'text', 'value'=>set_value('linkedin'),)); echo '<div class="error">'.form_error('linkedin').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="twitter" class="col-sm-6 col-form-label">Twitter Profile Link</label>
                                      <div class="col-sm-6">
                                           <?php echo form_input(array('class' =>'form-control', 'id'=>'twitter', 'name'=>'twitter', 'type'=>'text', 'value'=>set_value('twitter'),)); echo '<div class="error">'.form_error('twitter').'</div>';?>    
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="adhaarcard" class="col-sm-6 col-form-label">Adhaar Card</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'adhaarcard', 'name'=>'adhaarcard', 'type'=>'text', 'value'=>set_value('adhaarcard'),)); echo '<div class="error">'.form_error('adhaarcard').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Pan Card</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'pancard', 'name'=>'pancard', 'type'=>'text', 'value'=>set_value('pancard'),)); echo '<div class="error">'.form_error('pancard').'</div>';?>    
                                         </div>
                                  </div>
                                <?php echo form_close();?>
                                <?php
                                      $attributes = array('class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('Campaign/new', $attributes);
                                ?>
                                  <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Company Name</label>
                                    <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'companyname', 'name'=>'companyname', 'type'=>'text', 'value'=>set_value('companyname'),)); echo '<div class="error">'.form_error('companyname').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Number of Director</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'director', 'name'=>'director', 'type'=>'text', 'value'=>set_value('director'),)); echo '<div class="error">'.form_error('director').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Name of 1sr Director</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'name_first_director', 'name'=>'name_first_director', 'type'=>'text', 'value'=>set_value('name_first_director'),)); echo '<div class="error">'.form_error('name_first_director').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">DIN of 1<sup>st</sup> Director</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'din_first_director', 'name'=>'din_first_director', 'type'=>'text', 'value'=>set_value('din_first_director'),)); echo '<div class="error">'.form_error('din_first_director').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Name of 2nd Director</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'name_second_director', 'name'=>'name_second_director', 'type'=>'text', 'value'=>set_value('name_second_director'),)); echo '<div class="error">'.form_error('name_second_director').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">DIN of 2<sup>nd</sup> Director</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'din_second_director', 'name'=>'din_second_director', 'type'=>'text', 'value'=>set_value('din_second_director'),)); echo '<div class="error">'.form_error('din_second_director').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Registered Address</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'reg_address', 'name'=>'reg_address', 'type'=>'text', 'value'=>set_value('reg_address'),)); echo '<div class="error">'.form_error('reg_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Communication Address</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'com_address', 'name'=>'com_address', 'type'=>'text', 'value'=>set_value('com_address'),)); echo '<div class="error">'.form_error('com_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-6 col-form-label">GST Number</label>
                                      <div class="col-sm-6">
                                           <?php echo form_input(array('class' =>'form-control', 'id'=>'gst', 'name'=>'gst', 'type'=>'text', 'value'=>set_value('gst'),)); echo '<div class="error">'.form_error('gst').'</div>';?>    
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Upload CIN</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'cin', 'name'=>'cin', 'type'=>'text', 'value'=>set_value('cin'),)); echo '<div class="error">'.form_error('cin').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Company Pan</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'company_pan', 'name'=>'company_pan', 'type'=>'text', 'value'=>set_value('company_pan'),)); echo '<div class="error">'.form_error('company_pan').'</div>';?>    
                                         </div>
                                  </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12 col-md-offset-3">
                                                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> 
                                         </div>
                                   </div>    
                                <?php echo form_close();
                                    }
                                ?>
                              
                              </div>
                              <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-contact-tab">
                              	 <?php
                              	 if($active_tab == 'payment') {
                                      $attributes = array('class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('Campaign/new', $attributes);
                                ?>
                                   <div class="form-group row">
                                        <label for="account_no" class="col-sm-6 col-form-label">Account Number</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'account_no', 'name'=>'account_no', 'type'=>'text', 'value'=>set_value('account_no'),)); echo '<div class="error">'.form_error('account_no').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="bank_name" class="col-sm-6 col-form-label">Bank Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'bank_name', 'name'=>'bank_name', 'type'=>'text', 'value'=>set_value('bank_name'),)); echo '<div class="error">'.form_error('bank_name').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="ifsc_code" class="col-sm-6 col-form-label">IFSC Code</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'ifsc_code', 'name'=>'ifsc_code', 'type'=>'text', 'value'=>set_value('ifsc_code'),)); echo '<div class="error">'.form_error('ifsc_code').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="ac_holder_name" class="col-sm-6 col-form-label">Account Holders Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'ac_holder_name', 'name'=>'ac_holder_name', 'type'=>'text', 'value'=>set_value('ac_holder_name'),)); echo '<div class="error">'.form_error('ac_holder_name').'</div>';?>    
                                         </div>
                                  </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12 col-md-offset-3">
                                                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Submit</button> 
                                         </div>
                                   </div>    
                                <?php
                                echo form_close();
                              	 }
                                ?>   
                              
                              </div>
                        	</div>
                        </div>
                    <?php 
                        /*
                    ?> 
                    <div class="stepwizard col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                          <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Project</p>
                          </div>
                          <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Campagin & Funding Details</p>
                          </div>
                          <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>People/team</p>
                          </div>
                          <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p>Payment Details</p>
                          </div>
                        </div>
                    </div>
                    <!--step1-->
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                          <?php
                            $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                            echo form_open_multipart('Campaign/new', $attributes);
                          ?> 
                              <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Title</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'title', 'name'=>'title', 'type'=>'text', 'value'=>set_value('title'),)); echo '<div class="error">'.form_error('title').'</div>';?>    
                                 </div>
                              </div>
                               <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Subtitle</label>
                                  <div class="col-sm-6">
                                       <?php echo form_input(array('class' =>'form-control', 'id'=>'subtitle', 'name'=>'subtitle', 'type'=>'text', 'value'=>set_value('subtitle'),)); echo '<div class="error">'.form_error('subtitle').'</div>';?>   
                                   </div>
                                </div>	
                                <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Category</label>
                                  <div class="col-sm-6">
                                       <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
                                         <?php
                                          echo form_dropdown('category', $category_list, set_value('category'), '','class="form-control"');
                                          echo '<div class="error">'.form_error('category').'</div>';
                                        ?>     
                                   </div>
                                </div>  
                                <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Project location</label>
                                  <div class="col-sm-6">
                                        <?php echo form_input(array('class' =>'form-control', 'id'=>'location', 'name'=>'location', 'type'=>'text', 'value'=>set_value('location'), 'placeholder'=>"Start typing your location...")); echo '<div class="error">'.form_error('location').'</div>';?>      
                                   </div>
                                </div>  
                                <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Project description</label>
                                  <div class="col-sm-6">
                                        <?php echo form_textarea(array('class' =>'form-control', 'id'=>'txtEditor', 'name'=>'txtEditor', 'type'=>'text', 'value'=>set_value('txtEditor'), 'placeholder'=>"Start typing your location...")); echo '<div class="error">'.form_error('txtEditor').'</div>';?>      
                                   </div>
                                </div>  
                                <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Image</label>
                                  <div class="col-sm-6">
                                            <?php echo form_upload(array('class'=>'form-control','name'=>'userfile','id'=>'userfile')); ?>
                                   </div>
                                </div>  
                                <div class="form-group row">
                                  <label for="" class="col-sm-6 col-form-label">Video  <p>If you add the video you have a better chance of getting noticed</p></label>
                                  <div class="col-sm-6">
                                      <?php echo form_input(array('class' =>'form-control', 'id'=>'video_url', 'name'=>'video_url', 'type'=>'text', 'value'=>set_value('video_url'), 'placeholder'=>"Youtube Video Url")); echo '<div class="error">'.form_error('video_url').'</div>';?> 
                                   </div>
                                </div>  
                                <div class="form-group row">
                                  <div class="col-sm-12 col-md-offset-3">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> 
                                   </div>
                                </div>  
                            <?php
                            echo form_close();
                            ?>    
                    		</div>                   
                    </div>
                    <!--step1 end-->
                    <!--step2-->
                    <div class="row setup-content" id="step-2">
                      <div class="col-xs-12">
                          <?php
                              $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                              echo form_open_multipart('Campaign/new', $attributes);
                          ?> 
                             <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">
                                  Campaign duration
                                  <p>Set a time limit for your campaign. You won't be able to change this after you launch.</p>
                                </label>
                                <div class="col-sm-6">
                                   <?php echo form_input(array('class' =>'form-control', 'id'=>'launched', 'name'=>'launched', 'type'=>'text', 'value'=>set_value('launched'), 'placeholder'=>"")); echo '<div class="error">'.form_error('launched').'</div>';?>  
                                      <?php echo form_input(array('class' =>'form-control', 'id'=>'fixed_day_value', 'name'=>'fixed_day_value', 'type'=>'text', 'value'=>set_value('fixed_day_value'), 'placeholder'=>"")); echo '<div class="error">'.form_error('fixed_day_value').'</div>';?>   
                                 </div>
                             </div>  
                             <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Amount required</label>
                                 <div class="col-sm-6">
                                        <?php echo form_input(array('class' =>'form-control', 'id'=>'goal', 'name'=>'goal', 'type'=>'text', 'value'=>set_value('goal'), 'placeholder'=>"2000.00")); echo '<div class="error">'.form_error('goal').'</div>';?>   
                                 </div>
                             </div>
                             <div class="form-group row">
                                  <div class="col-sm-12 col-md-offset-3">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> 
                                   </div>
                             </div>    
                          <?php
                          echo form_close();
                          ?>
                      </div>  
                    </div> 
                    <!--step2 end-->
                    <!--step3-->
                    <div class="row setup-content" id="step-3">
                      <div class="col-sm-12">
                        <button type="button" class="user_tab">User</button><button class="company_tab" type="button">Company</button>
                        <?php
                              $attributes = array('class' => 'form-horizontal user_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                              echo form_open_multipart('Campaign/new', $attributes);
                          ?>
                          <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Name</label>
                            <div class="col-sm-6">
                             <?php echo form_input(array('class' =>'form-control', 'id'=>'name', 'name'=>'name', 'type'=>'text', 'value'=>set_value('name'),)); echo '<div class="error">'.form_error('name').'</div>';?>    
                             </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Email ID</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'email', 'name'=>'email', 'type'=>'text', 'value'=>set_value('email'),)); echo '<div class="error">'.form_error('email').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Phone Number</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'phone', 'name'=>'phone', 'type'=>'text', 'value'=>set_value('phone'),)); echo '<div class="error">'.form_error('phone').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Facebook Profile Link</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'facebook', 'name'=>'facebook', 'type'=>'text', 'value'=>set_value('facebook'),)); echo '<div class="error">'.form_error('facebook').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">LinkedIn Profile Link</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'linkedin', 'name'=>'linkedin', 'type'=>'text', 'value'=>set_value('linkedin'),)); echo '<div class="error">'.form_error('linkedin').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-6 col-form-label">Twitter Profile Link</label>
                              <div class="col-sm-6">
                                   <?php echo form_input(array('class' =>'form-control', 'id'=>'twitter', 'name'=>'twitter', 'type'=>'text', 'value'=>set_value('twitter'),)); echo '<div class="error">'.form_error('twitter').'</div>';?>    
                               </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Adhaar Card</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'adhaarcard', 'name'=>'adhaarcard', 'type'=>'text', 'value'=>set_value('adhaarcard'),)); echo '<div class="error">'.form_error('adhaarcard').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Pan Card</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'pancard', 'name'=>'pancard', 'type'=>'text', 'value'=>set_value('pancard'),)); echo '<div class="error">'.form_error('pancard').'</div>';?>    
                                 </div>
                          </div>
                        <?php echo form_close();?>
                        <?php
                              $attributes = array('class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                              echo form_open_multipart('Campaign/new', $attributes);
                        ?>
                          <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Company Name</label>
                            <div class="col-sm-6">
                             <?php echo form_input(array('class' =>'form-control', 'id'=>'companyname', 'name'=>'companyname', 'type'=>'text', 'value'=>set_value('companyname'),)); echo '<div class="error">'.form_error('companyname').'</div>';?>    
                             </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Number of Director</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'director', 'name'=>'director', 'type'=>'text', 'value'=>set_value('director'),)); echo '<div class="error">'.form_error('director').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Name of 1sr Director</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'name_first_director', 'name'=>'name_first_director', 'type'=>'text', 'value'=>set_value('name_first_director'),)); echo '<div class="error">'.form_error('name_first_director').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">DIN of 1<sup>st</sup> Director</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'din_first_director', 'name'=>'din_first_director', 'type'=>'text', 'value'=>set_value('din_first_director'),)); echo '<div class="error">'.form_error('din_first_director').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Name of 2nd Director</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'name_second_director', 'name'=>'name_second_director', 'type'=>'text', 'value'=>set_value('name_second_director'),)); echo '<div class="error">'.form_error('name_second_director').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">DIN of 2<sup>nd</sup> Director</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'din_second_director', 'name'=>'din_second_director', 'type'=>'text', 'value'=>set_value('din_second_director'),)); echo '<div class="error">'.form_error('din_second_director').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Registered Address</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'reg_address', 'name'=>'reg_address', 'type'=>'text', 'value'=>set_value('reg_address'),)); echo '<div class="error">'.form_error('reg_address').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Communication Address</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'com_address', 'name'=>'com_address', 'type'=>'text', 'value'=>set_value('com_address'),)); echo '<div class="error">'.form_error('com_address').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-6 col-form-label">GST Number</label>
                              <div class="col-sm-6">
                                   <?php echo form_input(array('class' =>'form-control', 'id'=>'gst', 'name'=>'gst', 'type'=>'text', 'value'=>set_value('gst'),)); echo '<div class="error">'.form_error('gst').'</div>';?>    
                               </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Upload CIN</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'cin', 'name'=>'cin', 'type'=>'text', 'value'=>set_value('cin'),)); echo '<div class="error">'.form_error('cin').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Company Pan</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'company_pan', 'name'=>'company_pan', 'type'=>'text', 'value'=>set_value('company_pan'),)); echo '<div class="error">'.form_error('company_pan').'</div>';?>    
                                 </div>
                          </div>
                           <div class="form-group row">
                                <div class="col-sm-12 col-md-offset-3">
                                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> 
                                 </div>
                           </div>    
                        <?php echo form_close();?>
                      </div>   
                    </div>
                    <!--step3-->
                    <!--step4-->
                    <div class="row setup-content" id="step-4">
                      <div class="col-sm-12">
                        <?php
                              $attributes = array('class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                              echo form_open_multipart('Campaign/new', $attributes);
                        ?>
                           <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Account Number</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'account_no', 'name'=>'account_no', 'type'=>'text', 'value'=>set_value('account_no'),)); echo '<div class="error">'.form_error('account_no').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Bank Name</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'bank_name', 'name'=>'bank_name', 'type'=>'text', 'value'=>set_value('bank_name'),)); echo '<div class="error">'.form_error('bank_name').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">IFSC Code</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'ifsc_code', 'name'=>'ifsc_code', 'type'=>'text', 'value'=>set_value('ifsc_code'),)); echo '<div class="error">'.form_error('ifsc_code').'</div>';?>    
                                 </div>
                          </div>
                          <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Account Holders Name</label>
                                <div class="col-sm-6">
                                     <?php echo form_input(array('class' =>'form-control', 'id'=>'ac_holder_name', 'name'=>'ac_holder_name', 'type'=>'text', 'value'=>set_value('ac_holder_name'),)); echo '<div class="error">'.form_error('ac_holder_name').'</div>';?>    
                                 </div>
                          </div>
                           <div class="form-group row">
                                <div class="col-sm-12 col-md-offset-3">
                                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Submit</button> 
                                 </div>
                           </div>    
                        <?php
                        echo form_close();
                        ?>   
                      </div>
                    </div>
                    <!--step4 end-->
                    */?>
                    
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