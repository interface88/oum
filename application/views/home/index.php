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
