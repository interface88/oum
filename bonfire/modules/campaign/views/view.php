<main id="main">
<section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>My Campaign</h2>
          <ol>
            <li><a href="<?php echo base_url('');?>">Home</a></li>
            <li>My Campaign</li>
          </ol>
        </div>
      </div>
    </section>
<section class="inner-page">
<div class="container">
    <div class="table-responsive-sm">
    	<div class="page-container row">
    		<div class="col-lg-12">
                <table class="table table-hover table-bordered table-sm">
                  <caption>My Campaign</caption>
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Sub Title</th>
                      <th scope="col">category</th>
                      <th scope="col">launched</th>
                      <th scope="col">Exipre date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    $statusArr = array("D"=>"Draft", "A"=>"Approval", "R"=>"Reject", "P"=>"Pending");
                    foreach ($list_item as $row) {
                    ?>
                    	<tr>
                        <td scope="row"><?php echo $i++;?></td>
              			<td><?php echo $row->title;?></td>
              			<td><?php echo $row->subtitle;?></td>
              			<td><?php echo $row->category;?></td>
              			<td><?php echo date("d-M-Y", strtotime($row->launched));?></td>
              			<td><?php echo date("d-M-Y", strtotime($row->deadline));?></td>
              			<td><?php echo $statusArr[$row->status];?></td>
                      	<td>
                      		<div class="btn-group btn-group-sm" role="group" aria-label="action button">
                     			<?php echo anchor(base_url('Campaign/Edit/'.$row->campaign_id), '<i class="btn bx bx-edit-alt"></i>', 'class="btn btn-secondary btn-sm" title="Edit"'); ?>
                     			<?php echo anchor(base_url('campaign_view/'.$row->slug), '<i class="btn bx bx-show-alt"></i>', 'class="btn btn-secondary btn-sm" title="View"'); ?>
                            </div>
                      	</td>
                      	</tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
             </div>
          </div>
    </div>        
</div>
</section>
</main>