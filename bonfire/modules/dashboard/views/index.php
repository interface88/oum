<main id="main">
  <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Dashboard</h2>
          <ol>
              <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li><a href="<?php echo base_url('dashboard/index');?>">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
          <div class="page-container row">
            <div class="col-lg-6">
             <canvas id="top-5-categories"></canvas>
            </div>
            <div class="col-lg-6">
             <canvas id="campaign_by_donation"></canvas>
            </div>
          </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script type="text/javascript">
    window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['January', 'Arts', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Campaign',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					100,444,456,566,567,556,336
				]
			}]

		};
		$(function(){
    			var ctx = document.getElementById('top-5-categories').getContext('2d');
    			window.myBar = new Chart(ctx, {
    				type: 'bar',
    				data: barChartData,
    				options: {
    					responsive: true,
    					legend: {
    						position: 'top',
    					},
    					title: {
    						display: true,
    						text: 'Top Categories'
    					}
    				}
    			});
		})
    </script>
</main>
