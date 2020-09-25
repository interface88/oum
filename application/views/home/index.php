<style>
body {
 background-color: #ffffff;
 background-image: url("<?php echo base_url('themes/unity/img/bg-body.jpg')?>");
 background-position: left top;
 background-size: auto;
 background-repeat: repeat;
 background-attachment: scroll;
}

    .fundpress-icon-with-square-service-v2 {
  text-align: center;
  margin-bottom: 50px; }
  .fundpress-icon-with-square-service-v2 i {
    font-size: 4.28571em;
    color: #050C24;
    display: inline-block;
    margin-bottom: 40px;
    position: relative; }
    .fundpress-icon-with-square-service-v2 i:after {
      position: absolute;
      content: '\e93f';
      font-family: "iconfont";
      background-color: #1B70F0;
      width: 38px;

<div class="container">
<div class="row">
<?php
foreach($campaign_item as $row)
{
?>	
	<div class="col-lg-4 give-wrap">
		<div class="fundpress-grid-item-content-v2 give-card">
			<div class="fundpress-item-header">
				<img src="<?php echo base_url('assets/Campaign/'.$row->image.'')?>"
					class="img-thumbnail" />
			</div>
			<!-- .fundpress-item-header END -->

			<div class="fundpress-item-content text-center">
				<a href="<?php echo base_url('Campaign/view/'.$row->slug.'')?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row->title;?></a>
				<p><?php echo $row->description;?></p>
				<span class="xs-separetor"></span>
				<div class="give-card__progress">
					<div class="give-goal-progress">
						<div class="raised">
							<div class="income">
								<span class="label">Current</span><span class="value">$4,090</span>
							</div>
							<div class="percentage">41%</div>
							<div class="goal">
								<span class="label">Target</span> <span class="value"><?php echo $row->goal;?></span>
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
      height: 38px;
      border-radius: 100%;
      font-size: 0.21429em;
      color: #FFFFFF;
      line-height: 34px;
      border: 3px solid #FFFFFF;
      right: -16px;
      bottom: -12px; }
  .fundpress-icon-with-square-service-v2 h4 {
    font-size: 1.57143em;
    font-weight: 700;
    color: #050C24;
    margin-bottom: 20px; }
  .fundpress-icon-with-square-service-v2 p {
    margin-bottom: 0;
    color: #615F5F;
    line-height: 1.7; }

.fundpress-cause-matters-v2.xs-section-padding {
  padding-bottom: 70px; }

.fundpress-grid-item-content-v2 {
  background-color: #FFFFFF; }
  .fundpress-grid-item-content-v2 .xs-item-header-content {
    position: absolute;
    top: 0;
    right: 0;
    padding: 20px; }
  .fundpress-grid-item-content-v2 .fundpress-item-content p {
    margin-bottom: 0;
    color: #666666;
    font-size: 0.85714em;
    line-height: 2; }
  .fundpress-grid-item-content-v2 .fundpress-post-title {
    color: #050C24;
    font-size: 1.85714em;
    line-height: 1.3; }
    .fundpress-grid-item-content-v2 .fundpress-post-title:hover {
      color: #1B70F0; }
  .fundpress-grid-item-content-v2 .xs-avatar-title a {
    color: #999999; }
  .fundpress-grid-item-content-v2 .xs-avatar-title span {
    color: #050C24; }
  .fundpress-grid-item-content-v2 .xs-separetor {
    border-color: #EEEEEE;
    margin-bottom: 16px;
    margin-top: 30px; }
  .fundpress-grid-item-content-v2 .fundpress-list-cat i,
  .fundpress-grid-item-content-v2 .fundpress-list-cat a {
    color: #666666;
    font-size: 0.85714em;
    line-height: 1; }
  .fundpress-grid-item-content-v2 .fundpress-list-cat i {
    font-size: 1em;
    padding-right: 8px; }
  .fundpress-grid-item-content-v2 .fundpress-list-cat span {
    margin-right: 12px; }
    .fundpress-grid-item-content-v2 .fundpress-list-cat span:last-child {
      margin-right: 0; }
  .fundpress-grid-item-content-v2 .border {
    border-color: #EEEEEE !important; }
  .fundpress-grid-item-content-v2:hover {
    -webkit-box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); }
   .fundpress-grid-item-content-v2 .fundpress-item-header{
            overflow: hidden;
   }         
    .fundpress-grid-item-content-v2 .fundpress-item-header img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.give-wrap .give-card:hover .fundpress-item-header > img {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}


 .give-card__progress {
    margin-top: 0;
    width: 100%;
    border-bottom: 1px solid #d7d7d7;
}
 .give-card__progress .raised {
    padding-top: 20px;
    padding-bottom: 20px;
}   

.give-goal-progress .raised {
    margin-bottom: 0;
    display: flex;
    text-align: center;
    -ms-flex-align: stretch;
    align-items: stretch;
}

.give-goal-progress .raised > div {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
.give-goal-progress .raised > div:not(:last-child) {
    border-right: 1px solid #d7d7d7;
}   
.give-goal-progress .raised .label {
    color: #b9b9b9;
    line-height: 1.4;
    display: block;
    font-size: 14px;
    font-size: .875rem;
}
.give-goal-progress .raised .value {
    font-size: 18px;
    font-size: 1.125rem;
    line-height: 1.5;
    color: #000;
}   
.give-goal-progress .percentage {
    color: #000;
    font-size: 30px;
    font-size: 1.875rem;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
}
.give-wrap .give-card:hover .opal-popup-wrapper>div,.give-wrap .give-card:focus .opal-popup-wrapper>div {
    opacity: 1;
    visibility: visible;
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    -moz-transform: translateX(0);
    -webkit-transform: translateX(0);
    transform: translateX(0);
    -ms-transition: all .2s ease 0s;
    -o-transition: all .2s ease 0s;
    -moz-transition: all .2s ease 0s;
    -webkit-transition: all .2s ease 0s;
    transition: all .2s ease 0s
}

.give-wrap .give-card:hover .opal-popup-wrapper>div:last-child,.give-wrap .give-card:focus .opal-popup-wrapper>div:last-child {
    -ms-transition: all .3s ease .1s;
    -o-transition: all .3s ease .1s;
    -moz-transition: all .3s ease .1s;
    -webkit-transition: all .3s ease .1s;
    transition: all .3s ease .1s
}
 .give-wrap .give-card:hover .give-card__progress .raised,.give-wrap .give-card:focus .give-card__progress, .give-wrap .give-card:focus .give-card__progress .raised .percentage {
    background-color: #2a2a2a;
    color: #fff;
}

.give-wrap .give-card:hover .give-card__progress .raised .label,.give-wrap .give-card:hover .give-card__progress .raised .value,.give-wrap .give-card:focus .give-card__progress .raised .label,.give-wrap .give-card:focus .give-card__progress .raised .value {
    color: #fff;
}

#banner {
  width: 100%;
  height: 100vh;
  background: url("../img/hero-bg.jpg") top center;
  background-size: cover;
  position: relative;
  padding: 0;
}

.brandImage {

}


/* ----- brand image section -----*/
.elementor-brand-item {
    text-align: center;
    padding: 30px 0;
}


.elementor-brand-item img {
    -webkit-filter: contrast(0);
    filter: contrast(0);
    opacity: .6;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -webkit-transition: all .3s ease;
    transition: all .3s ease
}

.elementor-brand-item:hover img {
    -webkit-filter: contrast(1);
    filter: contrast(1);
    opacity: 1
}

#banner3{
color:#333;
}
#banner3 .card{
    background-color: transparent;
    border: none;
    padding: 30px 0;
    
}
#banner3 .card .card-body{
    text-align: center;
}
.image-box-decor{
background-color: #fed857;
margin :20px 0 10px;
display: inline-block;
    width: 60px;
    height: 3px;
}
#banner4{
    background-color: #fed857;
    background-image: url(<?php echo base_url('themes/unity/img/about_img2.png')?>);
    background-position: center center;
    background-repeat: no-repeat;
    transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
    margin: 0;
    margin-top:20px;
    padding: 40px 0 75px;
    text-align:center;
}
#banner4 .elementor-background-overlay{
    background-color: #fed857;
    opacity: .3;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    position: absolute;
}

 #banner4 h1{
        font-family:'Edo SZ';font-weight:normal;font-size:80px;
        color: #000;
        z-index:1
}
#banner4 p{
    color: #000;
}

.opal-shape-arrow {
    clip-path: polygon(0 0,100% 0,100% calc(100% - 15px),calc(50% + 15px) calc(100% - 15px),50% 100%,calc(50% - 15px) calc(100% - 15px),0 calc(100% - 15px));
}

</style>
<section id="hero" class="d-flex align-items-center">
	<div class="container position-relative text-center text-lg-left"
		data-aos="zoom-in" data-aos-delay="100">
		<div class="row">
			<div class="col-lg-8">
				<h1>
					Welcome to <span>OUM</span>
				</h1>
				<h2>Better world for Children!</h2>

				<div class="btns">
					<a href="#menu" class="btn-menu animated fadeInUp scrollto">camapign</a> <a href="#book-a-table"
						class="btn-book animated fadeInUp scrollto">Donate</a>
				</div>
			</div>
			<div
				class="col-lg-4 d-flex align-items-center justify-content-center"
				data-aos="zoom-in" data-aos-delay="200">
				<a href="https://www.youtube.com/watch?v=GlrxcuEDyF8"
					class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div id="banner3">
        <div class="row">
        	<div class="col-lg-4">
                <div class="card">
                  <img class="card-img-top" src="<?php echo base_url('themes/unity/img/story/h1_our-event.jpg')?>" alt="Card image cap">
                  <div class="card-body">
                  	<h5 class="card-title">Our stories</h5>
                  	<span class="image-box-decor"></span>
                    <p class="card-text">We do believe that every family has the potential to contribute to improvements in their own lives</p>
                  </div>
                </div>
        	</div>
        	<div class="col-lg-4">
                <div class="card">
                  <img class="card-img-top" src="<?php echo base_url('themes/unity/img/story/h1_our-story.jpg')?>" alt="Card image cap">
                  <div class="card-body">
                  	<h5 class="card-title">Our events & programs</h5>
                  	<span class="image-box-decor"></span>
                    <p class="card-text">We now runs a number of programmes in Africa to address a broad range of issues.</p>
                  </div>
                </div>
        	</div>
        	<div class="col-lg-4">
                <div class="card">
                  <img class="card-img-top" src="<?php echo base_url('themes/unity/img/story/h1_our-team.jpg')?>" alt="Card image cap">
                  <div class="card-body">
                  	<h5 class="card-title">Our team</h5>
                  	<span class="image-box-decor"></span>
                    <p class="card-text">We pays special attention to reducing marginalisation in its partner countries and to documenting</p>
                  </div>
                </div>
        	</div>
        </div>
	</div>
</div>

<div class="container">
<div class="row">
<?php
foreach($campaign_item as $row)
{
?>	
	<div class="col-lg-4 give-wrap">
		<div class="fundpress-grid-item-content-v2 give-card">
			<div class="fundpress-item-header">
				<img src="<?php echo base_url('assets/Campaign/'.$row->image.'')?>"
					class="img-thumbnail" />
			</div>
			<!-- .fundpress-item-header END -->

			<div class="fundpress-item-content text-center">
				<a href="<?php echo base_url('Campaign/view/'.$row->slug.'')?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row->title;?></a>
				<p><?php echo $row->description;?></p>
				<span class="xs-separetor"></span>
				<div class="give-card__progress">
					<div class="give-goal-progress">
						<div class="raised">
							<div class="income">
								<span class="label">Current</span><span class="value">$4,090</span>
							</div>
							<div class="percentage">41%</div>
							<div class="goal">
								<span class="label">Target</span> <span class="value"><?php echo $row->goal;?></span>
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
      
 <section id="banner2" class="d-flex align-items-center">
	<div class="container position-relative text-center text-lg-left"
		data-aos="zoom-in" data-aos-delay="100">
		<div class="row">
			<div class="col-lg-4">
			</div>
			<div class="col-lg-8">
				<h1>We always see hope</h1>
				<h2>To contribute to the structural improvement of the health of disadvantaged groups in South East Asia</h2>

			</div>
		</div>
	</div>
</section>


<div class="container">
  <div class="col-sm-12">
    <div class="text-center"><h1>Last Campaigns</h1></div> 
  </div>
<div class="row">
<?php
foreach($campaign_item as $row)
{
?>  
  <div class="col-lg-4 give-wrap">
    <div class="fundpress-grid-item-content-v2 give-card">
      <div class="fundpress-item-header">
        <img src="<?php echo base_url('assets/Campaign/'.$row->image.'')?>"
          class="img-thumbnail" />
      </div>
      <!-- .fundpress-item-header END -->

      <div class="fundpress-item-content text-center">
        <a href="<?php echo base_url('Campaign/view/'.$row->slug.'')?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row->title;?></a>
        <p><?php echo $row->description;?></p>
        <span class="xs-separetor"></span>
        <div class="give-card__progress">
          <div class="give-goal-progress">
            <div class="raised">
              <div class="income">
                <span class="label">Current</span><span class="value">$4,090</span>
              </div>
              <div class="percentage">41%</div>
              <div class="goal">
                <span class="label">Target</span> <span class="value"><?php echo $row->goal;?></span>
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




<!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/owlcarousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/owlcarousel/owl.theme.default.min.css">
  <!-- Yeah i know js should not be in header. Its required for demos.-->
  <!-- javascript -->
    <script src="<?php echo base_url();?>assets/owlcarousel/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/owlcarousel/owl.carousel.js"></script> 
<!--slider end-->
<style>
  .owl-carousel{color: #000;}
  .owl-carousel.owl-loading{opacity: 1;}
  .owl-carousel .owl-item
   {
    position: relative;
    min-height: 1px;
    float: left;
    -webkit-backface-visibility: hidden;
    -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none;
  }
  .feature-campaign__item {margin-bottom: 30px;}
  .feature-campaign__item .campaign-item-wrap {align-items: flex-start;}
  .row, body.opal-content-layout-2cl #content .wrap, body.opal-content-layout-2cr #content .wrap, [data-opal-columns], .opal-default-content-layout-2cr .site-content .wrap, .site-footer .widget-area, .comment-form, .widget .gallery, .elementor-element .gallery, .entry-gallery .gallery, .single .gallery, [data-elementor-columns], .feature-campaign__item .campaign-item-wrap, .elementor-widget-opal-schedules .schedules-style-2 .elementor-schedules-item, .give-wrap-inner>.give_forms {display: flex;  flex-wrap: wrap;}
  .campaign-body {margin-left: -25%;}
.feature-campaign__item .campaign-body .campaign-body-wrap {
    background-color: #fff;
    padding: 60px;
}
.d-flex, .pagination .nav-links, .comments-pagination .nav-links {
    display: flex;
}
.feature-campaign__item .campaign-body .campaign-head {
    margin-right: 50px;
    width: 50%;
}
.feature-campaign__item .campaign-body .give-card__progress {
    border-bottom: 0;
    width: 50%;
}
.give-wrap .give-card__progress {
    margin-top: 0;
    width: 100%;
    border-bottom: 1px solid #d7d7d7;
}
.feature-campaign__item .campaign-body .campaign-head .give-card__title {
    font-size: 30px;
    font-size: 1.875rem;
    font-family: "DM Serif Display";
    margin-bottom: 20px;
    margin-top: 0;
}
.give-wrap .give-card__title {
    line-height: 1.3;
    margin: 1.9rem 0 .6rem;
    padding: 0;
    font-size: 24px;
    font-size: 1.5rem;
}
.give-wrap .give-card__title {
    line-height: 1.3;
    margin: 0 0 .75rem;
    padding: 0;
}
.give-wrap .give-card__text {
    margin: 0 0 30px;
    padding: 0;
}
.give-wrap .give-card__text {
    margin: 0 0 1.5rem;
    padding: 0;
}
.feature-campaign__item .campaign-body .campaign-head .give-card__title a {
    color: #000;
}
.feature-campaign__item .campaign-body .give-card__progress {
    border-bottom: 0;
    width: 50%;
}
.give-wrap .give-card__progress {
    margin-top: 0;
    width: 100%;
    border-bottom: 1px solid #d7d7d7;
}
.give-wrap .give-card__progress>:last-child {
    margin-bottom: 0;
}
.give-wrap .give-card__progress .raised, .give-wrap .give-card__progress>:last-child {
    margin-bottom: 0;
}
.feature-campaign__item .give-goal-progress {
    display: flex;
    flex-wrap: wrap;
}
.give-goal-progress {
    margin-bottom: 40px;
    clear: both;
}
.feature-campaign__item .give-goal-progress .barometer-wrap {
    margin-right: 30px;
}
.campaign-feature-wrapper .give-wrap .barometer {
    width: 160px;
    height: 160px;
}
.give-wrap .barometer {
    position: relative;
    max-width: 160px;
}
.feature-campaign__item .give-goal-progress .time-left {
    text-align: center;
    margin-top: 5px;
}
.give-goal-progress .percentage, .give-goal-progress .goal, .give-goal-progress .income, .give-goal-progress .donors, .give-goal-progress .time-left {
    font-size: 14px;
    font-size: .875rem;
    line-height: inherit;
    letter-spacing: 0;
    font-weight: 700;
}
.give-wrap .give-card__progress .raised {
    padding-top: 20px;
    padding-bottom: 20px;
}
.feature-campaign__item .give-goal-progress .raised {
    flex-direction: column;
    text-align: left;
}
.give-wrap .give-card__progress .raised, .give-wrap .give-card__progress>:last-child {
    margin-bottom: 0;
}
.give-goal-progress .raised {
    margin-bottom: 0;
    display: flex;
    text-align: center;
    -ms-flex-align: stretch;
    align-items: stretch;
}
.give-goal-progress .raised>div:not(:last-child) {
    border-right: 1px solid #d7d7d7;
}
.feature-campaign__item .give-goal-progress .raised>div {
    border: 0 !important;
    margin-bottom: 15px;
}
.give-wrap .give-card__progress .income {
    font-size: 10px;
    font-size: .625rem;
}
.give-goal-progress .raised>div {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
.give-goal-progress .percentage, .give-goal-progress .goal, .give-goal-progress .income, .give-goal-progress .donors, .give-goal-progress .time-left {
    font-size: 14px;
    font-size: .875rem;
    line-height: inherit;
    letter-spacing: 0;
    font-weight: 700;
}
.give-goal-progress .income {
    font-size: 46px;
    line-height: 48px;
    letter-spacing: -1px;
    color: #333;
}
.give-goal-progress .raised>div:not(:last-child) {
    border-right: 1px solid #d7d7d7;
}
.feature-campaign__item .give-goal-progress .raised>div {
    border: 0 !important;
    margin-bottom: 15px;
}
.give-goal-progress .raised>div {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
.give-goal-progress .percentage, .give-goal-progress .goal, .give-goal-progress .income, .give-goal-progress .donors, .give-goal-progress .time-left {
    font-size: 14px;
    font-size: .875rem;
    line-height: inherit;
    letter-spacing: 0;
    font-weight: 700;
}

.owl-nav {
    bottom: 80px;
}
.feature-campaign__item .give-goal-progress .button-default, .feature-campaign__item .give-goal-progress .sidebar-donor-wall .give-donor__load_more, .sidebar-donor-wall .feature-campaign__item .give-goal-progress .give-donor__load_more {
    background-color: #2a2a2a;
    color: #fff;
}
.button-default, .sidebar-donor-wall .give-donor__load_more {
    color: #000;
    background-color: #f4f4f4;
    border-color: #f4f4f4;
}
#give-card-60{
    padding: 1.065rem 3.4375rem;
    font-size: .75rem;
    line-height: 1.875;
    border-radius: 50px;
    text-transform: uppercase;
    text-align: center;
}
.give-wrap .barometer span span {
    position: static;
    font-size: 50px;
    font-size: 3.125rem;
    font-weight: 700;
    font-style: normal;
    line-height: 1;
    word-wrap: normal;
    text-align: center;
}
.give-wrap .barometer span {
    position: absolute;
    left: 0;
    top: calc(50% - 25px);
    width: 100%;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    font-style: italic;
    opacity: 0;
}
.owl-nav {
    margin-top: 10px;
    position: absolute;
    right: 6%;
}
.owl-nav i{font-size: 32px; color:#000;}
.owl-nav i:hover{font-size: 32px; color: #000; border-radius: 100%; background-color: #FED857;}
.owl-nav [class*=owl-]{padding: 0px !important; background-color: transparent !important;}
@media (min-width: 992px)
{
  .campaign-body {
    flex: 0 0 58.33333%;
    max-width: 58.33333%;
   }
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<section class="container-fluid" style="padding: 40px;">
  <div class="row">
    <div class="owl-carousel owl-theme camapignslider">
          <?php
            foreach($campaign_item as $row)
            {
            ?>  
            <div class="item cloned" style="width: 1290px; margin-right: 30px;">
              <div class="feature-campaign__item column-item give-wrap">
                <div class="campaign-item-wrap">  
                  <div class="campaign-thumbnail">
                    <img class="img-fluid" src="<?php echo base_url('assets/Campaign/'.$row->image.'')?>" >
                  </div>
                  <div class="campaign-body">
                    <div class="campaign-body-wrap d-flex">
                      <div class="campaign-head">
                        <h3 class="give-card__title">
                          <a href="https://demo2.wpopal.com/unity/donations/minivan-build-match-double-your-gift/"><?php echo $row->title;?></a>
                        </h3>
                        <p class="give-card__text"><?php echo $row->description;?></p>
                      </div>
                      <div class="give-card__progress">
                        <div class="give-goal-progress">
                          <div class="barometer-wrap barometer-added">
                            <div class="barometer" data-progress="53" data-width="160" data-height="160" data-strokewidth="10" data-stroke="#2a2a2a" data-progress-stroke="#fed857"><svg height="160" version="1.1" width="160" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.484375px; top: -0.75px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#2a2a2a" d="M80,8A72,72,0,1,1,79.99,8" stroke-width="10" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#fed857" d="M80,8A72,72,0,1,1,66.50854534982781,150.7246820524656" stroke-width="11" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path></svg> <span style="opacity: 1;"><span class="funded" style="opacity: 1;">53<sup>%</sup></span></span></div>
                            <div class="time-left"><span class="value">459 days ago</span></div>
                          </div>
                          <div class="raised">
                            <div class="income"><span class="label">Current</span><span class="value">$4,260</span></div>
                            <div class="goal"><span class="label">Taget</span><span class="value"><?php echo $row->goal;?></span></div>
                            <div class="donors"><span class="label">Donors</span><span class="value">44</span></div>
                          </div>
                          <a id="give-card-60" class="js-give-grid-modal-launcher button-default mt-3 d-block w-100" data-effect="mfp-zoom-out" href="#give-modal-form-60">donate now</a>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>  
            </div>
           <?php
           }
           ?> 
    </div>  
  </div>
</section>
<script>
            $(document).ready(function() {
              $('.camapignslider').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
                    dots:false,
                    loop:false,
                    autoplay:true, 
                    autoplayTimeout:3500                          
                  },
                  600: {
                    items: 1,
                    nav: true,
                    dots:false,
                    animateIn:true,
                    loop:false,
                    autoplay:true, 
                    navText: ['<div aria-label="' + 'Previous' + '"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></div>',
                              '<div aria-label="' + 'Next' + '"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>'],
                    navElement: 'div role="presentation"',
                    autoplayTimeout:3500      

                    
                  },
                  1000: {
                    items: 1,
                    nav: true,
                    dots:false,
                    navText: ['<div aria-label="' + 'Previous' + '"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></div>',
                              '<div aria-label="' + 'Next' + '"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>'],
                    navElement: 'div role="presentation"',
                    animateIn:true,
                    loop:false,
                    margin: 20
                  }
                }
              });
            });
 </script>  





<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="banner4" class="opal-shape-arrow">
				<div class="elementor-background-overlay"></div>
				<h1>Unity Makes Strength</h1>
				<p>Our partners are from all over the world</p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-1.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-2.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-3.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-4.png')?>"></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-5.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-6.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-7.png')?>"></a>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="elementor-brand-item">
				<a><img alt="brand1" src="<?php echo base_url('themes/unity/img/brand_image/brand-8.png')?>"></a>
			</div>
		</div>
	</div>
</div>
