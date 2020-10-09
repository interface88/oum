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
 #final_goal{background: transparent;color: #fff; border:none;}
 .fixed_date_time{display:none;}
 </style>
<!------ Include the above in your HEAD tag ---------->
<main id="main">
  <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Campaign</h2>
            <ol>
              <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li>Create Campaign</li>
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
                                <a class="nav-item nav-link <?php echo $active_tab == 'project' || $active_tab == 'all' ? 'active' : ''; ?>" id="nav-home-tab" <?php echo $active_tab == 'project' ? 'data-toggle="tab"' : ''; ?> href="<?php echo base_url('campaign/edit_create/'.$this->uri->segment(3).'');?>" role="tab" aria-controls="nav-home" aria-selected="true">Project</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'funding' ? 'active' : ''; ?>" id="nav-profile-tab" <?php echo $active_tab == 'funding' ? 'data-toggle="tab"' : ''; ?> href="<?php echo base_url('campaign/edit_funding/'.$this->uri->segment(3).'');?>" role="tab" aria-controls="nav-profile" aria-selected="false">Campaign & Funding Details</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'people_team' ? 'active' : ''; ?>" id="nav-contact-tab" <?php echo $active_tab == 'people_team' ? 'data-toggle="tab"' : ''; ?> href="<?php echo base_url('campaign/edit_people_team/'.$this->uri->segment(3).'');?>" role="tab" aria-controls="nav-contact" aria-selected="false">People/team</a>
                                <a class="nav-item nav-link <?php echo $active_tab == 'payment' ? 'active' : ''; ?> " id="nav-contact1-tab" <?php echo $active_tab == 'payment' ? 'data-toggle="tab"' : ''; ?> href="<?php echo base_url('campaign/edit_payment/'.$this->uri->segment(3).'');?>" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Details</a>
                              </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane <?php echo $active_tab == 'project' || $active_tab == 'all' ? 'active' : ''; ?>" id="nav-project" role="tabpanel" aria-labelledby="nav-home-tab">
                              	 <?php
                              	 if($active_tab == 'project' || $active_tab == 'all') {
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                    echo form_open_multipart('campaign/edit_create/'.$this->uri->segment(3).'', $attributes);
                                  ?> 
                                      <div class="form-group row required">
                                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-6">
                                             <?php
                                             echo form_input(array('class' => form_error('title') ? 'form-control is-invalid' : 'form-control', 'id'=>'title', 'name'=>'title', 'type'=>'text', 'value'=>$campaign_list->title,)); 
                                                echo '<div class="invalid-feedback">'.form_error('title').'</div>';
                                             ?>
                                         </div>
                                      </div>
                                       <div class="form-group row">
                                          <label for="subtitle" class="col-sm-3 col-form-label">Subtitle</label>
                                          <div class="col-sm-6">
                                               <?php echo form_input(array('class' => form_error('subtitle') ? 'form-control is-invalid' : 'form-control', 'id'=>'subtitle', 'name'=>'subtitle', 'type'=>'text', 'value'=>$campaign_list->subtitle,)); echo '<div class="invalid-feedback">'.form_error('subtitle').'</div>';?>   
                                           </div>
                                        </div>	
                                        <div class="form-group row required">
                                          <label for="category" class="col-sm-3 col-form-label">Category</label>
                                          <div class="col-sm-6">
                                                 <?php
                                                 echo form_dropdown('category', $category_list, $campaign_list->category,form_error('category') ? 'class="form-control is-invalid" id="category"' : 'class="form-control" id="category"');
                                                  echo '<div class="invalid-feedback">'.form_error('category').'</div>';
                                                ?>     
                                           </div>
                                        </div>  
                                        <div class="form-group row required">
                                          <label for="sub_category" class="col-sm-3 col-form-label">Sub Category</label>
                                          <div class="col-sm-6">
                                                 <?php
                                                 echo form_dropdown('sub_category', $subcategory_list, $campaign_list->sub_category,form_error('sub_category') ? 'class="form-control is-invalid" id="sub_category"' : 'class="form-control" id="sub_category"');
                                                  echo '<div class="invalid-feedback">'.form_error('sub_category').'</div>';
                                                ?>     
                                           </div>
                                        </div>  
                                        <div class="form-group row required">
                                          <label for="target_audience" class="col-sm-3 col-form-label">Target Audience</label>
                                          <div class="col-sm-6">
                                                <?php
                                                  $audiencearr=array();
                                                  for($i=1; $i<=10; $i++)
                                                  {
                                                    $audiencearr[$i.'000']=$i;
                                                  }
                                                  echo form_dropdown('target_audience', $audiencearr, $campaign_list->target_audience, 'class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('target_audience').'</div>';
                                                ?>          
                                           </div>
                                        </div>  
                                        <div class="form-group row required">
                                          <label for="description" class="col-sm-3 col-form-label">Project description</label>
                                          <div class="col-sm-6">
                                                <?php echo form_textarea(array('class' => form_error('description') ? 'form-control is-invalid' : 'form-control',  'id'=>'description', 'name'=>'description', 'type'=>'text', 'value'=>$campaign_list->description, 'placeholder'=>"Start typing your description...")); echo '<div class="invalid-feedback">'.form_error('description').'</div>';?>      
                                           </div>
                                        </div>  
                                        <div class="form-group row required">
                                          <label for="" class="col-sm-3 col-form-label">Image</label>
                                          <div class="col-sm-6">
                                                    <?php echo form_upload(array('class' => form_error('image') ? 'form-control is-invalid' : 'form-control', 'name'=>'image', 'accept'=>'image', 'id'=>'image','value'=>'assets/campaign/'.$campaign_list->image.'',)); echo '<div class="invalid-feedback">'.form_error('image').'</div>';?>
             										 <br/>
                                      				<img src="<?php echo base_url('assets/campaign/'.$campaign_list->image.'');?>" width="100px"/>
                                           </div>
                                        </div>  
                                        <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label">Video</label>
                                          <div class="col-sm-6">
                                              <?php echo form_input(array('class' => form_error('video_url') ? 'form-control is-invalid' : 'form-control',  'id'=>'video_url', 'name'=>'video_url', 'type'=>'text', 'value'=>$campaign_list->video_url, 'placeholder'=>"Youtube Video Url")); echo '<div class="invalid-feedback">'.form_error('video_url').'</div>';?>
                                              <small id="videoHelp" class="form-text text-muted">If you add the video you have a better chance of getting noticed</small> 
                                           </div>
                                        </div>  
                                        <div class="form-group row text-right">
                                          <div class="col-sm-9 col-md-offset-3">
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
                                      echo form_open_multipart('campaign/edit_funding/'.$this->uri->segment(3).'', $attributes);
                                  ?> 
         							<div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">
                                          Campaign duration
                                          <p>Set a time limit for your campaign. You won't be able to change this after you launch.</p>
                                        </label>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                       		<label for="" class="col-sm-6 col-form-label">
                                             <input type="radio" checked class="form-check-input" id="deadline_selecter" name="deadline_selecter" value="DAY">Fixed number of days(1-60)
                                        	</label>
                                            <?php echo form_input(array('class' => form_error('deadline_day') ? 'form-control fixed_day is-invalid' : 'form-control fixed_day',  'id'=>'deadline_day', 'name'=>'deadline_day', 'type'=>'text', 'value'=>$campaign_list->deadline_day, 'placeholder'=>"60")); echo '<div class="invalid-feedback">'.form_error('deadline_day').'</div>';?>   
                                           </div>
                                           <div class="form-group">
                                       		<label for="" class="col-sm-6 col-form-label">
                                                <input type="radio" class="form-check-input" id="deadline_selecter" name="deadline_selecter" value="DATE_TIME">End on a specific date & time
                                         	</label>
	                                             <?php echo form_input(array('class' => form_error('deadline_date') ? 'form-control fixed_date_time is-invalid' : 'form-control fixed_date_time',  'id'=>'deadline_date', 'name'=>'deadline_date', 'type'=>'date', 'value'=>date("Y-m-d", strtotime($campaign_list->deadline)),)); echo '<div class="invalid-feedback">'.form_error('deadline_date').'</div>';?>   
                                                 <?php echo form_input(array('class' => form_error('deadline_time') ? 'form-control fixed_date_time is-invalid' : 'form-control fixed_date_time',  'id'=>'deadline_time', 'name'=>'deadline_time', 'type'=>'time', 'value'=>date("H:i", strtotime($campaign_list->deadline)),)); echo '<div class="invalid-feedback">'.form_error('deadline_time').'</div>';?>   
                                             	 <small class="form-text text-muted fixed_date_time"><i class="bx bx-map"></i>Campaigns that last 30 days or less are more likely to be successful. <a href="">learn more..</a></small>
                                           </div>	
                                        </div>
                                    </div>
                                     <div class="form-group row required">
                                          <label for="80G_availablity" class="col-sm-3 col-form-label">Option to provide 80G certificate to the donor</label>
                                          <div class="col-sm-6">
                                                <?php
                                                $yesarr= array('Yes' => 'Yes','No' => 'No',);
                                                echo form_dropdown('80G_availablity', $yesarr,$campaign_list->{'80G_availablity'},'class="form-control"');
                                                  echo '<div class="invalid-feedback">'.form_error('80G_availablity').'</div>';
                                                ?> 
                                               <small class="form-text text-muted">Campaigners who are able to provide the 80G certificate usually get more support and  backers.</small>          
                                           </div>
                                     </div>    
                                     <div class="form-group row required">
                                        <label for="goal" class="col-sm-3 col-form-label">Amount required</label>
                                         <div class="col-sm-6">
                                                <?php echo form_input(array('class' => form_error('goal') ? 'form-control is-invalid' : 'form-control',  'id'=>'goal', 'name'=>'goal', 'type'=>'text', 'value'=>$campaign_list->goal, 'placeholder'=>"")); echo '<div class="invalid-feedback">'.form_error('goal').'</div>';?>   
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                      <div class="col-sm-9 col-sm-offset-2">
                                             <table class="table table-bordered  table-sm" id="particular_calc">
                                              <caption class="bg-warning text-white text-center">Funding Goal - Rs <input type="text" readonly="" name="final_goal" id="final_goal" value="<?php echo $campaign_list->final_goal;?>" >  
                                              </caption>
                                               <thead class="thead-dark">
                                                 <tr>
                                                   <th>Particulars</th>
                                                   <th>Percentage</th>
                                                   <th>Amount</th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                  <?php
                                                  foreach ($particulars_list as $row)
                                                  {
                                                  ?>
                                                 <tr>
                                                   <td><?php echo $row->particular;?></td>
                                                   <td><?php echo $row->particular_value;?>%</td>
                                                   <td></td>	
                                                 </tr>
                                              <?php
                                                 }
                                              ?>
                                               </tbody>
                                             </table>
                                        </div>
                                     </div>
                                     <div class="form-group row text-right">
                                          <div class="col-sm-9 col-md-offset-3">
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save"  >Next</button> 
                                           </div>
                                     </div>
                                  <?php
                                    echo form_close();
                              	   }
                                  ?>
                              </div>
                              <div class="tab-pane <?php echo $active_tab == 'people_team' ? 'active' : ''; ?>" id="nav-people_team" role="tabpanel" aria-labelledby="nav-contact-tab">
                              <div class="form-group row">
                              <div class="col-sm-12 text-center">
                              	<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-secondary">
                                    <input type="radio" class="user_tab" name="user_company_type" value="user_tab" id="User" autocomplete="off"> User
                                  </label>
                                  <label class="btn btn-secondary">
                                    <input type="radio" class="company_tab" name="user_company_type" value="company_tab" id="Company" autocomplete="off"> Company
                                  </label>
                                </div>
                                </div>
                              </div>
                                 <?php
                                    if($active_tab == 'people_team') {
                                      $attributes = array('class' => 'form-horizontal user_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('campaign/edit_people_team/'.$this->uri->segment(3).'', $attributes);
                                  ?>
                                  <div class="people_block">
                                     <div class="single_people_block">
                                          <div class="form-group row required">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-3">
                                             <?php 
                                             $name=empty($people_user_list->name)==true? set_value('name') : $people_user_list->name;
                                             echo form_input(array('class' => form_error('name') ? 'form-control is-invalid' : 'form-control',  'id'=>'name', 'name'=>'name', 'type'=>'text', 'value'=>$name,)); echo '<div class="invalid-feedback">'.form_error('name').'</div>';?>    
                                             </div>

                                             <label for="education" class="col-sm-3 col-form-label">Education Degree</label>
                                            <div class="col-sm-3">
                                             <?php 
                                             $education_arr=
                                             array(
                                                 '--select'=>'--Select--',
                                                 'ba'=>'Ba','b.com'=>'B.com',
                                                 'bca'=>'Bca','bbm'=>'Bbm',
                                                 'Art Directors'=>'Art Directors',
                                                 'Craft Artists'=>'Craft Artists',
                                                 'Fine Artists'=>'Fine Artists',
                                                 'Multimedia Artists'=>'Multimedia Artists',
                                                 'Printmakers'=>'Printmakers',
                                                 'Painting Restorers'=>'Painting Restorers','Bailiff'=>'Bailiff',
                                                 'Border patrol agent'=>'Border patrol agent','CIA agent'=>'CIA agent',
                                                 'Corrections officer'=>'Corrections officer','Court reporter'=>'Court reporter',
                                                 'Crime scene investigator'=>'Crime scene investigator','Customs agent'=>'Customs agent',
                                                 'Detective'=>'Detective','Drug enforcement agent'=>'Drug enforcement agent',
                                                 'FBI agent'=>'FBI agent','Industrial security specialist'=>'Industrial security specialist',
                                                 
                                             );
                                             $education=empty($people_user_list->education)==true? set_value('education') : $people_user_list->education;
                                             echo form_dropdown('education',$education_arr,$education,'class="form-control"');
                                             echo '<div class="invalid-feedback">'.form_error('education').'</div>';?>
                             </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="email_id" class="col-sm-3 col-form-label">Email ID</label>
                                                <div class="col-sm-3">
                                                     <?php 
                                                     $email=empty($people_user_list->email_id)==true? set_value('email_id') : $people_user_list->email_id;
                                                     echo form_input(array('class' => form_error('email_id') ? 'form-control is-invalid' : 'form-control',  'id'=>'email_id', 'name'=>'email_id', 'type'=>'text', 'value'=>$email,)); echo '<div class="invalid-feedback">'.form_error('email_id').'</div>';?>    
                                                 </div>
                                        
                                                <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-3">
                                                     <?php 
                                                     $phone_number=empty($people_user_list->email_id)==true? set_value('phone_number') : $people_user_list->phone_number;
                                                     echo form_input(array('class' =>'form-control', 'id'=>'phone_number', 'name'=>'phone_number', 'type'=>'text', 'value'=>$phone_number,)); echo '<div class="invalid-feedback">'.form_error('phone_number').'</div>';?>    
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="facebook_profile_link" class="col-sm-3 col-form-label">Facebook Profile Link</label>
                                                <div class="col-sm-3">
                                                     <?php 
                                                     $facebook_profile_link=empty($people_user_list->facebook_profile_link)==true? set_value('facebook_profile_link') : $people_user_list->facebook_profile_link;
                                                     echo form_input(array('class' =>'form-control', 'id'=>'facebook_profile_link', 'name'=>'facebook_profile_link', 'type'=>'text', 'value'=>$facebook_profile_link,)); echo '<div class="invalid-feedback">'.form_error('facebook_profile_link').'</div>';?>    
                                                 </div>
                                                <label for="linkedin_profile_link" class="col-sm-3 col-form-label">LinkedIn Profile Link</label>
                                                <div class="col-sm-3">
                                                     <?php
                                                     $linkedin_profile_link=empty($people_user_list->linkedin_profile_link)==true? set_value('linkedin_profile_link') : $people_user_list->linkedin_profile_link;
                                                     echo form_input(array('class' =>'form-control', 'id'=>'linkedin_profile_link', 'name'=>'linkedin_profile_link', 'type'=>'text', 'value'=>$linkedin_profile_link,)); echo '<div class="invalid-feedback">'.form_error('linkedin_profile_link').'</div>';?>    
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="twitter_profile_link" class="col-sm-3 col-form-label">Twitter Profile Link</label>
                                              <div class="col-sm-3">
                                                   <?php
                                                   $twitter_profile_link=empty($people_user_list->twitter_profile_link)==true? set_value('twitter_profile_link') : $people_user_list->twitter_profile_link;
                                                   echo form_input(array('class' =>'form-control', 'id'=>'twitter_profile_link', 'name'=>'twitter_profile_link', 'type'=>'text', 'value'=>$twitter_profile_link,)); echo '<div class="invalid-feedback">'.form_error('twitter_profile_link').'</div>';?>    
                                               </div>
                                          </div>
                                          <div class="form-group row required">
                                                <label for="adhaarcard" class="col-sm-3 col-form-label">Adhaar Card</label>
                                                <div class="col-sm-3">
                                                <?php
                                                $adhaar_card_img=empty($people_user_list->adhaar_card_img)==true? set_value('adhaarcard') : $people_user_list->adhaar_card_img;
                                                echo form_upload(array('class' => form_error('adhaarcard') ? 'form-control is-invalid' : 'form-control', 'name'=>'adhaarcard','id'=>'adhaarcard','value'=>$adhaar_card_img,)); echo '<div class="invalid-feedback">'.form_error('adhaarcard').'</div>';?>
                                           		   <br/>
                                           		   <img src="<?php echo base_url('assets/adhaarcard/'.$adhaar_card_img.'');?>" width="100px"/>    
                                                 </div>
                                                <label for="pancard" class="col-sm-3 col-form-label">Pan Card</label>
                                                <div class="col-sm-3">
                                                 <?php 
                                                 $pan_card_img=empty($people_user_list->pan_card_img)==true? set_value('pancard') : $people_user_list->pan_card_img;
                                                 echo form_upload(array('class' => form_error('pancard') ? 'form-control is-invalid' : 'form-control', 'name'=>'pancard','id'=>'pancard','value'=>$pan_card_img,)); echo '<div class="invalid-feedback">'.form_error('pancard').'</div>';?>
                                           		  <br/>
                                           		  <img src="<?php echo base_url('assets/pancard/'.$pan_card_img.'');?>" width="100px"/>    
                                                </div>
                                          </div>
                                        </div>
                                   </div>
                                   <div class="form-group row text-right">
                                          <div class="col-sm-12 col-md-offset-3">
                                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="save" value="save" >Next</button> 
                                           </div>
                                     </div> 
                                <?php echo form_close();?>
                                <?php
                                      $attributes = array('style'=>"display:none",'class' => 'form-horizontal company_profile', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                                      echo form_open_multipart('campaign/edit_company/'.$this->uri->segment(3).'', $attributes);
                                ?>
                                  <div class="form-group row required">
                                    <label for="company_name" class="col-sm-6 col-form-label">Company Name</label>
                                    <div class="col-sm-6">
                                     <?php
                                     $company_name=empty($company_list->company_name)==true? set_value('company_name') : $company_list->company_name;
                                     echo form_input(array('class' => form_error('company_name') ? 'form-control is-invalid' : 'form-control',  'id'=>'company_name', 'name'=>'company_name', 'type'=>'text', 'value'=>$company_name,)); echo '<div class="invalid-feedback">'.form_error('company_name').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row required">
                                    <label for="no_of_director" class="col-sm-6 col-form-label">Number of Director</label>
                                    <div class="col-sm-6">
                                    <?php
                                    $no_directorArr=array();
                                    for($i=1; $i<=10; $i++)
                                    {
                                        $no_directorArr[$i]=$i;
                                    }
                                    $no_of_director=empty($company_list->no_of_director)==true? set_value('no_of_director') : $company_list->no_of_director;
                                    echo form_dropdown('no_of_director',$no_directorArr,$no_of_director,'class="form-control" id="no_of_director"');  echo '<div class="invalid-feedback">'.form_error('no_of_director').'</div>';?>    
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                   <table class="table">
                                    <thead class="thead-dark">
                                    <tr><th>Name of Director</th><th>DIN of Director</th></tr>
                                    </thead>
                                    <tbody class="single_director_block">
                                    <?php foreach ($director_list as $row){?>
                                    <tr class="director_block">
                                    <td><?php
                                    $name_director=empty($row->name_director)==true? set_value('name_director') : $row->name_director;
                                    $din_director=empty($row->din_director)==true? set_value('din_director') : $row->din_director;
                                    echo form_input(array('class' => form_error('name_director') ? 'form-control is-invalid' : 'form-control',  'id'=>'name_director', 'name'=>'name_director[]', 'type'=>'text', 'value'=>$name_director,));?></td>
                                    <td><?php echo form_input(array('class' => form_error('din_director') ? 'form-control is-invalid' : 'form-control',  'id'=>'din_director', 'name'=>'din_director[]', 'type'=>'text', 'value'=>$din_director,));?></td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                   </table> 
                                   </div>
                                  <div class="form-group row required">
                                        <label for="registered_address" class="col-sm-6 col-form-label">Registered Address</label>
                                        <div class="col-sm-6">
                                     		<?php
                                     		$registered_address=empty($company_list->registered_address)==true? set_value('registered_address') : $company_list->registered_address;
                                     		echo form_input(array('class' => form_error('registered_address') ? 'form-control is-invalid' : 'form-control',  'id'=>'registered_address', 'name'=>'registered_address', 'type'=>'text', 'value'=>$registered_address,)); echo '<div class="invalid-feedback">'.form_error('registered_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="" class="col-sm-6 col-form-label">Communication Address</label>
                                        <div class="col-sm-6">
                                     		<?php 
                                     		$communication_address=empty($company_list->communication_address)==true? set_value('communication_address') : $company_list->communication_address;
                                     		echo form_input(array('class' => form_error('communication_address') ? 'form-control is-invalid' : 'form-control',  'id'=>'communication_address', 'name'=>'communication_address', 'type'=>'text', 'value'=>$communication_address,)); echo '<div class="invalid-feedback">'.form_error('communication_address').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="gst" class="col-sm-6 col-form-label">GST Number</label>
                                      <div class="col-sm-6">
                                     		<?php 
                                     		$gst=empty($company_list->gst)==true? set_value('gst') : $company_list->gst;
                                     		echo form_input(array('class' => form_error('gst') ? 'form-control is-invalid' : 'form-control',  'id'=>'gst', 'name'=>'gst', 'type'=>'text', 'value'=>$gst,)); echo '<div class="invalid-feedback">'.form_error('gst').'</div>';?>    
                                       </div>
                                  </div>
                                  <div class="form-group row required">
                                        <label for="cin_img" class="col-sm-6 col-form-label">Upload CIN</label>
                                        <div class="col-sm-6">
                                     		<?php
                                     		$cin_img=empty($company_list->cin_img)==true? set_value('cin_img') : $company_list->cin_img;
                                     		echo form_upload(array('class' => form_error('cin_img') ? 'form-control is-invalid' : 'form-control',  'id'=>'cin_img', 'name'=>'cin_img', 'value'=>$cin_img,)); echo '<div class="invalid-feedback">'.form_error('cin_img').'</div>';?>
                                     		<br/>
                                     		<img src="<?php echo base_url('assets/cin/'.$cin_img.'');?>" width="100px"/>    
                                           </div>
                                  </div>
                                  <div class="form-group row required">
                                        <label for="pan_img" class="col-sm-6 col-form-label">Company Pan</label>
                                        <div class="col-sm-6">
                                     		<?php
                                     		$pan_img=empty($company_list->pan_img)==true? set_value('pan_img') : $company_list->pan_img;
                                     		echo form_upload(array('class' => form_error('pan_img') ? 'form-control is-invalid' : 'form-control',  'id'=>'pan_img', 'name'=>'pan_img', 'value'=>$pan_img,)); echo '<div class="invalid-feedback">'.form_error('pan_img').'</div>';?>    
                                      		<br/>
                                      		<img src="<?php echo base_url('assets/companypan/'.$pan_img.'');?>" width="100px"/>
                                         </div>
                                  </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12 col-md-offset-3 text-right">
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
                                      echo form_open_multipart('campaign/edit_payment/'.$this->uri->segment(3).'', $attributes);
                                ?>
                                   <div class="form-group row required">
                                        <label for="account_number" class="col-sm-6 col-form-label">Account Number</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' => form_error('account_number') ? 'form-control is-invalid' : 'form-control', 'id'=>'account_number', 'name'=>'account_number', 'type'=>'text', 'value'=>$campaign_list->account_number,)); echo '<div class="invalid-feedback">'.form_error('account_number').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="bank_name" class="col-sm-6 col-form-label">Bank Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'bank_name', 'name'=>'bank_name', 'type'=>'text', 'value'=>$campaign_list->bank_name,)); echo '<div class="invalid-feedback">'.form_error('bank_name').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="ifsc_code" class="col-sm-6 col-form-label">IFSC Code</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'ifsc_code', 'name'=>'ifsc_code', 'type'=>'text', 'value'=>$campaign_list->ifsc_code,)); echo '<div class="invalid-feedback">'.form_error('ifsc_code').'</div>';?>    
                                         </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="account_holder_name" class="col-sm-6 col-form-label">Account Holders Name</label>
                                        <div class="col-sm-6">
                                             <?php echo form_input(array('class' =>'form-control', 'id'=>'account_holder_name', 'name'=>'account_holder_name', 'type'=>'text', 'value'=>$campaign_list->account_holder_name,)); echo '<div class="invalid-feedback">'.form_error('account_holder_name').'</div>';?>    
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
	$(document).on('change','#category',function () {
		var category_name=$(this).val();
		var url="<?php echo base_url('subcategory/get_by_category_name');?>"
		$.getJSON(url, {category_name:category_name}, function(response){
    		var option = '<option value=""> - Select - </option>';
    		$.each(response, function(k, v){
    			option = option + '<option value="'+v+'">'+k+'</option>'
    		});
    		$('#sub_category').html(option);
		});
           
	});
</script>




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
        $('.fixed_day').show();
        $('.fixed_date_time').hide();   
      }
      else {
            $('.fixed_date_time').show();
            $('.fixed_day').hide();   
      }
  });
</script>

 <script>
        $(document).on('input','#goal',function(){
        	var amount = 0;
        	if($("#goal").val().trim() != ''){
              amount= parseFloat($("#goal").val());
              amount = isNaN(amount) ? 0 : amount;
        	}
              var final_amount = amount; 
              $('#particular_calc tbody tr').each(function(){
              	var particular_percent = parseFloat( $(this).find('td:eq(1)').text());
              	var particular_calc_amt = amount * (particular_percent/100);
              	$(this).find('td:eq(2)').text(particular_calc_amt);
              	final_amount = final_amount + particular_calc_amt;
              })
             $("#final_goal").val(final_amount);
        });
 </script>      
    <script>
                                   $(document).on('change','#no_of_director',function()
                                   {
                                   		var rowLen = $('.single_director_block tr').length;
                                       var current_value=$(this).val();
                                       var final_row_count = current_value - rowLen;
                                       if(final_row_count > 0){
                                           var row='';
                                           for(var i=0; i<final_row_count; i++)
                                           {
                                            row = row + '<tr><td><input class="form-control" name="name_director[]" type="text" value="" /></td><td><input name="din_director[]" class="form-control" type="text" value="" /></td></tr>';
                                           }
                                           $('.single_director_block').append(row);
                                       }
                                       debugger;
                                       if(final_row_count < 0){
                                           $('.single_director_block tr').slice(final_row_count).remove();
                                       }
                                       }
                                   );
                                   </script>
                               