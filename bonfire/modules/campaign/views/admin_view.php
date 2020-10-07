<style type="text/css">
  .inner-page{background-color: #fff; color: #000;}
  .img-thumbnail{width: 20%;}
</style>
<main id="main">
	<section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Campaign</h2>
          <ol>
            <li><a href="<?php echo base_url('');?>">Home</a></li>
            <li>Campaign List</li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
        	<div class="page-container row">
        	<div class="col-lg-12">
                <div class="table-responsive">
                        <table class="table table-hover table-bordered  table-sm datatable">
                          <caption>List of Campaign</caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Category</th>
                              <th scope="col">Launched</th>
                              <th scope="col">Exipre date</th>
                              <th scope="col">Feature</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i=1;
                            $statusArr = array("D"=>"Draft", "A"=>"Approved", "R"=>"Reject", "P"=>"Pending");
                            foreach ($list_item as $row) {
                            ?>
                              <tr>
                              		<td scope="row"><?php echo $i++;?></th>
                              		<td><?php echo $row->title;?></td>
                              		<td><?php echo $row->category;?></td>
                              		<td><?php echo date("d-M-Y", strtotime($row->launched));?></td>
                            		<td><?php echo date("d-M-Y", strtotime($row->final_deadline));?></td>
                            		<td>
                              		<?php 
                              		 if($row->feature==true)
                              		 {
                              		     echo '<i class="btn-feature active bx bxs-star" data-value="0" data-id="'.$row->campaign_id.'"></i>';
                              		 }
                              		 else{
                              		  echo '<i class="btn-feature bx bxs-star" data-value="1" data-id="'.$row->campaign_id.'"></i>';                              		 
                              		 }
                              		 ?>
                              		</td>
                              		<td>
                              		<?php echo form_dropdown('status',array('D'=>'Draft','A'=>'Approved','R'=>'Reject','P'=>'Pending'),
                              		    $row->status,'class="status_checks" data-id="'.$row->campaign_id.'"');?>
                              		</td>
                              		<td>
	                             		<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
	                             			<?php
	                             			
	                             			if('Approved'==$statusArr[$row->status])
	                             			{}                                 			
	                             			else
	                             			{
	                             			    echo anchor(base_url('campaign/edit/'.$row->campaign_id), '<i class="btn bx bx-edit-alt"></i>', 'class="btn btn-secondary btn-sm" title="Edit"');
	                             			    echo'<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->campaign_id.'" title="Delete"><i class="btn bx bx-trash-alt"></i></button>';
	                             			}
	                             			echo anchor(base_url('campaign/preview/'.$row->campaign_id), '<i class="btn bx bx-show"></i>', 'class="btn btn-secondary btn-sm" title="View"');
	                             			?>
    									
                                        </div>
									</td>
								</tr>
                           <?php }?>
                          </tbody>
                        </table>
                    </div>
        		</div>
        	</div>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on('click', '.btn-feature', function() {
    var btn = $(this);
    var status = $(this).attr('data-value');
    var id = $(this).attr('data-id');
    url = "<?php echo base_url('campaign/feature_status');?>";
    $.get({
        url: url,
        data: {
            "id": id,
            "status": status
        },
        success: function(response) {
            if (response == true) {
                $(btn).toggleClass('active');
            }
        }
    });
});

$(document).on('change', '.status_checks', function() {
    var status = $(this).val();
    var id = $(this).attr('data-id');
    url = "<?php echo base_url('campaign/status_change');?>";
    $.get({
        url: url,
        data: {
            "id": id,
            "status": status
        },
        success: function(data) {
            location.reload();
        }
    });
});

$(document).on('click', '.delete', function() {
    bootbox.confirm({
        title: "Delete campaign?",
        message: "Do you want to delete campaign? This cannot be undone.",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(result) {
            if (result) {
                var $row = $(this).parent().parent();
                var id = $(this).attr('data-id');
                var url = "<?php echo base_url('campaign/delete');?>";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        if (data == true) {
                            $row.remove();
                        } else {
                            bootbox.alert('Unable to delete');
                        }
                    }
                });
            }
        }
    });
});
</script>