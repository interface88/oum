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
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
        <p></p>

      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
<?php
	$attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
	echo form_open_multipart('Campaign/new', $attributes);
?> 
<!--step1-->
<div class="row setup-content" id="step-1">
    <div class="col-xs-12">
        <div class="row common">
           <div class="col-md-6">
           	<p>Title</p>
          </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <?php echo form_input(array('class' =>'form-control', 'id'=>'title', 'name'=>'title', 'type'=>'text', 'value'=>set_value('title'),)); echo '<div class="error">'.form_error('title').'</div>';?>    
                </div>
                <div class="form-group">
                    <label class="control-label">Subtitle</label>
                    <?php echo form_input(array('class' =>'form-control', 'id'=>'subtitle', 'name'=>'subtitle', 'type'=>'text', 'value'=>set_value('subtitle'),)); echo '<div class="error">'.form_error('subtitle').'</div>';?>    
                </div>
            </div>	
		</div>           
        <div class="row common">
          <div class="col-md-6">
          	<p>Category</p>
          </div>
          <div class="col-md-6">
	          <div class="form-group">
	           <?php $category_list=array('Art'=>'Art','Comics'=>'Comics','Crafts'=>'Crafts','Dance'=>'Dance','Design'=>'Design','Fashion'=>'Fashion','Film & Video'=>'Film & Video','Food'=>'Food','Games'=>'Games','Journalism'=>'Journalism','Music'=>'Music','Photography'=>'Photography','Publishing'=>'Publishing','Technology'=>'Technology','Theater'=>'Theater');?>
               <?php
                echo form_dropdown('category', $category_list, set_value('category'), '','class="form-control"');
                echo '<div class="error">'.form_error('category').'</div>';
              ?>    
	          </div>
          </div>     
        </div>
        <div class="row common">
          <div class="col-md-6">
          	<p>Project location</p>
          	<p>Enter the location that best describes where your project is based.</p>
          </div>      
		  <div class="col-md-6">
	          <div class="form-group">
	            <?php echo form_input(array('class' =>'form-control', 'id'=>'location', 'name'=>'location', 'type'=>'text', 'value'=>set_value('location'), 'placeholder'=>"Start typing your location...")); echo '<div class="error">'.form_error('location').'</div>';?>    
	          </div>
	       </div>	    
        </div>
        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
</div>
<!--step1 end-->
<!--step2-->
<div class="row setup-content" id="step-2">
  <div class="col-xs-12">
    <div class="row common">
      <div class="col-md-6">
      <p>Project description</p>
      </div>
        <div class="col-md-6">
          <div class="form-group">
               <textarea class="form-control" id="txtEditor" name="txtEditor"></textarea>
               <?php echo '<div class="error">'.form_error('txtEditor').'</div>';?>
          </div>
        </div> 
    </div>    
    <div class="row common">
        <div class="col-md-6">
    		<p>Image</p>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <?php echo form_upload(array('class'=>'form-control','name'=>'userfile','id'=>'userfile')); ?>
          </div>
        </div>  
    </div>
    <div class="row common">
        <div class="col-md-6">
		 <p>Video</p>
		 <p>If you add the video you have a better chance of getting noticed</p>
     <p></p>
		    </div>
        <div class="col-md-6">
          <div class="form-group">
      	      <?php echo form_input(array('class' =>'form-control', 'id'=>'video_url', 'name'=>'video_url', 'type'=>'text', 'value'=>set_value('video_url'), 'placeholder'=>"Youtube Video Url")); echo '<div class="error">'.form_error('video_url').'</div>';?>    
	      </div>
        </div>
    </div>

    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
  </div>  
</div>
<!--step2 end-->
<!--step3-->
<div class="row setup-content" id="step-3">
    <div class="col-xs-12">
        <div class="row common">
            <div class="col-md-6">
			   <p>Target launch date (optional)</p>
		       <p>Enter a date when you plan to launch—you can always return to this after you’ve built out more of your Kickstarter project page.</p>
			  <p>We won’t automatically launch your project.</p>
            </div>
	        <div class="col-md-6">
	          <div class="form-group">
              <?php echo form_input(array('class' =>'form-control', 'id'=>'launched', 'name'=>'launched', 'type'=>'text', 'value'=>set_value('launched'), 'placeholder'=>"")); echo '<div class="error">'.form_error('launched').'</div>';?>    
  	      </div>
		      <div class="form-group">
	          		We'll recommend when you should:
			    <ul>
					<li>Confirm your identity and provide payment details</li>
					<li>Submit your project for review</li>
				</ul>
			  </div>
	        </div>  
        </div>
        <div class="row common">
          <div class="col-md-6">
        	<p>Campaign duration</p>
        	<p>Set a time limit for your campaign. You won’t be able to change this after you launch.</p>
          </div>
          <div class="col-md-6">
          	<div class="form-group">
          	    <label for="">Fixed number of days(1-60)</label>
                <?php echo form_input(array('class' =>'form-control', 'id'=>'fixed_day_value', 'name'=>'fixed_day_value', 'type'=>'text', 'value'=>set_value('fixed_day_value'), 'placeholder'=>"")); echo '<div class="error">'.form_error('fixed_day_value').'</div>';?>    
            </div>
          </div>  
        </div>
        <div class="row common">
          <div class="col-md-6">
          <p>Target Amount</p>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <?php echo form_input(array('class' =>'form-control', 'id'=>'goal', 'name'=>'goal', 'type'=>'text', 'value'=>set_value('goal'), 'placeholder'=>"2000.00")); echo '<div class="error">'.form_error('goal').'</div>';?>    
            </div>
          </div>  
        </div>
        <button class="btn btn-success btn-lg pull-right" type="submit" value="save" name="save">save</button>
    </div>
</div>
<!--step3 end-->
<?php
echo form_close();
?>
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