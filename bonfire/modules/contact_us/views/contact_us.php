<style>
#main .inner-page{background-color:#fff !important;}
.map{width:100%;height:400px;}
</style>
<main id="main">
  <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Contact Us</h2>
            <ol>
              <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li>Contact Us</li>
            </ol>
          </div>
        </div>
  </section>
 <!-- contac us -->
 <section class="inner-page contact-form">
 <div class="container-fluid page-container">
 	<div class="text-center"><h1 class="title_header">Contact Us</h1></div>
 	<div class="row">
 		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
	 		<iframe class="map thumbnail" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3151.763532424569!2d144.95485471531887!3d-37.81900742975143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s8%20King%20Street%2C%20Melbourne%20Victoria%2089!5e0!3m2!1sen!2sin!4v1601651444061!5m2!1sen!2sin"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 		</div>
 		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
     		<div class="thumbnail">
					<?php echo form_open('home/contact_us',array('class'=>'',))?>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">Name:</label>
                        <div class="col-sm-9">
                        <?php 
                       echo form_input(array('class' => form_error('name') ? 'form-control is-invalid' : 'form-control', 'id'=>'name', 'name'=>'name', 'type'=>'text', 'value'=>set_value('name'),));
                        echo '<div class="invalid-feedback">'.form_error('name').'</div>';
                        ?>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">Email:</label>
                        <div class="col-sm-9">
                        <?php 
                       echo form_input(array('class' => form_error('email') ? 'form-control is-invalid' : 'form-control', 'id'=>'email', 'name'=>'email', 'type'=>'email', 'value'=>set_value('email'),));
                        echo '<div class="invalid-feedback">'.form_error('email').'</div>';
                        ?>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="phone">Mobile no:</label>
                        <div class="col-sm-9">
                        <?php 
                       echo form_input(array('class' => form_error('phone') ? 'form-control is-invalid' : 'form-control', 'id'=>'phone', 'name'=>'phone', 'type'=>'text', 'value'=>set_value('phone'),));
                        echo '<div class="invalid-feedback">'.form_error('phone').'</div>';
                        ?>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="subject">Subject:</label>
                        <div class="col-sm-9">
                        <?php 
                       echo form_input(array('class' => form_error('subject') ? 'form-control is-invalid' : 'form-control', 'id'=>'subject', 'name'=>'subject', 'type'=>'text', 'value'=>set_value('subject'),));
                        echo '<div class="invalid-feedback">'.form_error('subject').'</div>';
                        ?>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                        <?php 
                       echo form_textarea(array('class' => form_error('name') ? 'form-control is-invalid' : 'form-control', 'id'=>'message', 'rows'=>'5' ,'name'=>'message', 'value'=>set_value('message'),));
                        echo '<div class="invalid-feedback">'.form_error('message').'</div>';
                        ?>
                        </div>
                     </div>
                     <div class="form-group">
                       <div class="col-sm-12">
                       <?php echo form_submit('send','Send','class="btn btn-primary"');?>
                       </div>
                     </div>
					<?php echo form_close();?>
            </div>
 		</div>
 	</div>
 </div>
 </section>
  <!-- contac us end-->
 </main> 
 