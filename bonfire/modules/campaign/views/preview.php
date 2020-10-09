<main id="main">
	<section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Campaign</h2>
          <ol>
            <li><a href="<?php echo base_url('');?>">Home</a></li>
            <li><a href="<?php 
            if($this->session->role_id == 1)
            {
                echo base_url('campaign/views');
            }
            else{
                    echo base_url('campaign/view');
                }
            ?>">Campaign List</a></li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
		<div class="container page-container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    				 <div class="table-responsive">
                          <?php
                          if(!empty($campaign_list))
                          {
                          ?>
                          <table class="table table-hover">
                           <thead class="thead-dark text-center">
                           <tr><th colspan="2">Project</th></tr>
                           </thead>
                            <tbody>
                            	<tr><td>Title</td><td><?php echo $campaign_list->title;?></td></tr>
                            	<tr><td>Subtitle</td><td><?php echo $campaign_list->subtitle;?></td></tr>
                            	<tr><td>Category</td><td><?php echo $campaign_list->category;?></td></tr>
                            	<tr><td>Sub Category</td><td><?php echo $campaign_list->sub_category;?></td></tr>
                            	<tr><td>Target Audience</td><td><?php echo $campaign_list->target_audience;?></td></tr>
                            	<tr><td>Project description</td><td><?php echo $campaign_list->description;?></td></tr>
                            	<tr><td>Image</td><td><img src="<?php echo base_url('assets/campaign/'.$campaign_list->image.'');?>"</td></tr>
                            	<tr><td>Video</td><td><iframe src="<?php echo $campaign_list->video_url;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td></tr>
                            </tbody>
                          </table>
                          <table class="table table-hover">
                           <thead class="thead-dark text-center">
                           <tr><th colspan="2">Campaign & Funding Details</th></tr>
                           </thead>
                            <tbody>
                            	<tr><td>Campaign duration</td><td>
                            	<?php 
                            	if('DAY'==$campaign_list->final_deadline_type)
                            	{
                            	    echo $campaign_list->deadline_day;
                            	}
                            	elseif('DATE_TIME'==$campaign_list->final_deadline_type)
                            	{
                            	    echo date("d-M-Y h:i", strtotime($campaign_list->deadline));
                            	}
                            	?>
                            	    </td></tr>
                            	<tr><td>Option to provide 80G certificate to the donor</td><td><?php echo $campaign_list->{'80G_availablity'};?></td></tr>
                            	<tr><td>Amount required</td><td><?php echo $campaign_list->goal;?></td></tr>
                            	<tr><td>Funding Goal </td><td><?php echo $campaign_list->final_goal;?></td></tr>
                            </tbody>
                          </table>
                          <?php
                          }
                          if(!empty($people_user_list))
                          {
                          ?>
                          <table class="table table-hover">
                           <thead class="thead-dark text-center">
                           <tr><th colspan="2">User</th></tr>
                           </thead>
                            <tbody>
                            	<tr><td>Name</td><td><?php echo $people_user_list->name;?></td></tr>
                            	<tr><td>Education Degree</td><td><?php echo $people_user_list->education;?></td></tr>
                            	<tr><td>Email ID</td><td><?php echo $people_user_list->email_id;?></td></tr>
                            	<tr><td>Phone Number</td><td><?php echo $people_user_list->phone_number;?></td></tr>
                            	<tr><td>Facebook Profile Link</td><td><?php echo $people_user_list->facebook_profile_link;?></td></tr>
                            	<tr><td>LinkedIn Profile Link</td><td><?php echo $people_user_list->linkedin_profile_link;?></td></tr>
                            	<tr><td>Twitter Profile Link</td><td><?php echo $people_user_list->twitter_profile_link;?></td></tr>
                            	<tr><td>Adhaar Card</td><td><img src="<?php echo base_url('assets/adhaarcard/'.$people_user_list->adhaar_card_img.'');?>"/></td></tr>
                            	<tr><td>Pan Card</td><td><img src="<?php echo base_url('assets/pancard/'.$people_user_list->pan_card_img.'');?>"/></td></tr>
                            </tbody>
                          </table>
                          <?php }
                          if(!empty($company_list))
                          {
                          ?>
                          <table class="table table-hover">
                           <thead class="thead-dark text-center">
                           <tr><th colspan="2">Company</th></tr>
                           </thead>
                            <tbody>
                            	<tr><td>Company Name</td><td><?php echo $company_list->company_name;?></td></tr>
                            	<tr><td>Number of Director</td><td><?php echo $company_list->no_of_director;?></td></tr>
                         		<?php 
                         		$i=1;
            					foreach ($director_list as $row)
            					{
            					    $x=$i++;
            					    echo '<tr><td>Name of '.$x.'<sup>st</sup> Director</td><td>'.$row->name_director.'</td></tr>';
            					    echo '<tr><td>DIN of '.$x.'<sup>st</sup> Director</td><td>'.$row->din_director.'</td></tr>';
            					}
            					?>	
                            	<tr><td>Registered Address</td><td><?php echo $company_list->registered_address;?></td></tr>
                            	<tr><td>Communication Address</td><td><?php echo $company_list->communication_address;?></td></tr>
                            	<tr><td>GST Number</td><td><?php echo $company_list->gst;?></td></tr>
                            	<tr><td>Upload CIN</td><td><img src="<?php echo base_url('assets/cin/'.$company_list->cin_img.'');?>"/></td></tr>
                            	<tr><td>Company Pan</td><td><img src="<?php echo base_url('assets/companypan/'.$company_list->pan_img.'');?>"/></td></tr>
                            </tbody>
                          </table>
                          <?php 
                          }
                          if(!empty($campaign_list))
                          {
                          ?>
                          <table class="table table-hover">
                           <thead class="thead-dark text-center">
                           <tr><th colspan="2">Payment Details</th></tr>
                           </thead>
                            <tbody>
                            	<tr><td>Account Number</td><td><?php echo $campaign_list->account_number;?></td></tr>
                            	<tr><td>Bank Name</td><td><?php echo $campaign_list->bank_name;?></td></tr>
                            	<tr><td>IFSC Code</td><td><?php echo $campaign_list->ifsc_code;?></td></tr>
                            	<tr><td>Account Holders Name</td><td><?php echo $campaign_list->account_holder_name;?></td></tr>
                            </tbody>
                          </table>
                          <?php }?>   
                     </div>
				</div>
			</div>
		</div>
    </section>
</main>
    