    <div class="row">
        <?php
        foreach($last_campaign_item as $row)
        {
        ?>	
        	<div class="col-lg-4 give-wrap">
        		<div class="fundpress-grid-item-content-v2 give-card">
        			<div class="fundpress-item-header">
        				<img src="<?php echo base_url('assets/campaign/'.$row->image.'')?>" class="img-thumbnail" />
        			</div>
        			<!-- .fundpress-item-header END -->
        			<div class="fundpress-item-content text-center">
        				<a href="<?php echo base_url('campaign_view/'.$row->slug.'')?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row->title;?></a>
        				<p><?php echo $row->description;?></p>
        				<span class="xs-separetor"></span>
        				<div class="give-card__progress">
        					<div class="give-goal-progress">
        						<div class="raised">
        							<div class="income">
        								<span class="label">Current</span><span class="value"><?php echo $row->pledge;?></span>
        							</div>
        							<div class="percentage">
        							<?php
        							$subtract_value=$row->goal-$row->pledge;
        							$add_value=$row->goal+$row->pledge/2;
        							$percentage=$subtract_value/$add_value;
        							echo round($percentage).'%';
        							?>
        							</div>
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