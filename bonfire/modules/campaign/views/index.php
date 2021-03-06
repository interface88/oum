<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<style>
body {
 background-image: url("<?php echo base_url('themes/unity/img/bg-body.jpg')?>");
 background-position: left top;
 background-size: auto;
 background-repeat: repeat;
 background-attachment: scroll;
}

#campaignDetailTabContent {
    color:#666666;
}


.accordion {
   /* border: 1px solid #002247;*/
}

.accordion h3 {
    background-color: #f3e9eb;
    color: #222;
    font-size: 16px;
    text-align: center;
    margin: 0;
    padding: 10px;
}

.accordion .card-header {
    padding: 0;
}

.accordion .card-header button {
    text-align: left;
    display: block;
    width: 100%;
    font-size: 18px;
    color: #000000;
    position: relative;
}

.accordion .card-header button.collapsed::after {
    position: absolute;
    width: 2px;
    height: 12px;
    content: '';
    background-color: #000;
    right: 12px;
    top: 54%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.accordion .card-header button::before {
    position: absolute;
    width: 12px;
    height: 2px;
    content: '';
    background-color: #000;
    right: 7px;
    top: 50%;
}

.accordion .card-header button:hover {
    text-decoration: none;
}

.accordion .card-header button i {
    float: right;
    margin-top: 3px;
}

.accordion .card-body {
    padding: 15px;
    font-size: 16px;
}

.accordion .card-body table {
    margin: 0;
}

.accordion .card-body table a {
    color: #000;
}

.accordion .card-body table span {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 5px;
}

.accordion ul.occasion_list a {
    padding: 5px 15px;
    color: #222;
    font-size: 14px;
    display: inline-block;
}

.accordion ul.occasion_list a:hover {
    color: #002247;
}   

#campaignDetailTabContent .tab-pane {
    padding :5px;
    background-color: #FFF;
}

.campaignSideLeft {
color : #002247;
background-color: #FFF;
}
</style>
<main id="main">
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $campaign_item->title;?></h2>
          <ol>
            <li><a href="#">Home</a></li>
            <li><?php echo $campaign_item->title;?></li>
          </ol>
        </div>

      </div>
    </section>
<section class="inner-page">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-9">
    			<div class="row">
    				<div class="col-lg-12">
    					<img class="img-fluid" src="<?php echo base_url('assets/campaign/'.$campaign_item->image.'')?>" >
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-lg-12">
    					<ul class="nav nav-tabs" id="campaignDetailTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="campaign" aria-selected="true">Campaign</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                              </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                  </li>
                            </ul>
                            <div class="tab-content" id="campaignDetailTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              	<?php echo $campaign_item->description;?>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  <div class="accordion" id="faqAccordion">
                                      <div class="card">
                                        <div class="card-header" id="headingOne">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              How do I apply?
                                            </button>
                                          </h2>
                                        </div>
                                    
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                          <div class="card-body">
                                            Before you can send us your application, you'll need to pay an application fee of £20 if you’re applying to just one course, or £25 for multiple courses and for late applications sent after 30 June 2020 (£26 for 2021 entry courses).
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingTwo">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              Why can’t I sign in?	
                                            </button>
                                          </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                          <div class="card-body">
                                            You will only be able to use Track when you receive a welcome email from us confirming your login details.
											If you are unsure of your login details for Apply or Track, you can use the ‘forgotten login’ link.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingThree">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              What are entry requirements?
                                            </button>
                                          </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                          <div class="card-body">
                                            Entry requirements vary between universities and colleges – a full list of universities and colleges and their minimum entry criteria can be found in our search tool. If you are unsure you meet a university/college's criteria, it is best to contact their admissions team for further guidance.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingFour">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="headingFour" aria-expanded="false" aria-controls="headingFour">
                                              What are UCAS Tariff points?
                                            </button>
                                          </h2>
                                        </div>
                                        <div id="headingFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                          <div class="card-body">
                                            The UCAS Tariff is a way of allocating points to qualifications. Not all qualifications attract UCAS Tariff points for various reasons. The university or college you're interested in may accept your qualifications as an appropriate entry route, even if they don't attract UCAS Tariff points.
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                                                  
                                                                  
                              	</div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                            </div>
    				</div>
    			</div>	
    		</div>
    		<div class="col-lg-3">
    			<div class="campaignSideLeft">
    				<canvas id="myChart" width="400" height="400"></canvas>
    				<ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Current
                         <input id="percentage" type="hidden" value="<?php echo percentage_calculation($goal=$campaign_item->goal,$pledge=$campaign_item->pledge);?>"/>
                        <span class="badge badge-primary badge-pill"><?php echo $campaign_item->pledge;?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Target
                        <span class="badge badge-primary badge-pill"><?php echo $campaign_item->goal;?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Backers
                        <span class="badge badge-primary badge-pill">
						<?php echo $donation_count;?>
						</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                       <?php echo form_open('donation/donate/'.$this->uri->segment(2).'');?>
                       	<div class="row">
      						<div class="col">
                     			<input type="hidden" value="<?php echo $campaign_item->campaign_id;?>" name="campaign_id">
                     			<input type="hidden" value="<?php echo $campaign_item->title;?>" name="campaign_name">
                        		<?php echo form_input(array('class'=>'form-control','name'=>'amount','value'=>set_value('amount'),'width'=>'100px'));?>
                        	</div>
      						<div class="col">
		                        <?php echo form_submit('save', 'Donate','class="btn btn-primary"');?>
        					</div>
        				</div>		
                        <?php echo form_close();?>	
                        
                      </li>
                    </ul>
    			</div>
    		</div>
    	</div>
    </div>
<!-- recent campaign -->
<div class="container page-container">
<div class="row">
        <?php
        foreach($recent_campaign_item as $row)
        {
            ?>	
        	<div class="col-lg-4 give-wrap">
        		<div class="fundpress-grid-item-content-v2 give-card">
        			<div class="fundpress-item-header">
        				<img src="<?php echo base_url('assets/campaign/'.$row->image.'')?>" class="img-thumbnail" />
        			</div>
        			<!-- .fundpress-item-header END -->
        			<div class="fundpress-item-content text-center">
        				<a href="<?php echo base_url('campaign/'.$row->slug.'')?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row->title;?></a>
        				<p><?php echo character_limiter($row->description,100)?></p>
        				<span class="xs-separetor"></span>
        				<div class="give-card__progress">
        					<div class="give-goal-progress">
        						<div class="raised">
        							<div class="income">
        								<span class="label">Current</span><span class="value"><i class="bx bx-rupee"></i><?php echo $row->pledge;?></span>
        							</div>
        							<div class="percentage">
        							<?php
        							echo percentage_calculation($goal=$row->goal,$pledge=$row->pledge);
        							?>
        							</div>
        							<div class="goal">
        								<span class="label">Target</span><span class="value"><i class="bx bx-rupee"></i><?php echo $row->goal;?></span>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<!-- .fundpress-item-content END -->
        		</div>
        	</div>
        <?php
        }
        ?>
	</div>
</div>
<!-- recent campaign end -->    	
</section>
</main>

<script type="text/javascript">
Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 50;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "20px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


var config = {
  type: 'doughnut',
  data: {
    labels: [
      'Remaining', 'Donated'
    ],
    datasets: [{
      data: [<?php echo $campaign_item->goal;?>, <?php echo $campaign_item->pledge;?>],
      backgroundColor: [
        "#2a2a2a",
        "#fed857"
      ],
      hoverBackgroundColor: [
        "#2a2a2a",
        "#fed857"
      ],
    }]
  },
  options: {
  	cutoutPercentage: 70,
    elements: {
      center: {
        text:$('#percentage').val(),
        color: '#666666', // Default is #000000
        fontStyle: 'Arial', // Default is Arial
        sidePadding: 20, // Default is 20 (as a percentage)
        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
        lineHeight: 25 // Default is 25 (in px), used for when text wraps
      }
    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, config);
</script>