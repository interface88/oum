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
            <li>Project List</li>
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
                              <th scope="col">Status</th>
                              <th scope="col">Activate/Deactivate</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i=1;
                            foreach ($list_item as $row) {
                            ?>
                              <tr>
                              
                              		<td scope="row"><?php echo $i++;?></th>
                              		<td><?php echo $row->title;?></td>
                              		<td><?php echo $row->category;?></td>
                              		<td><?php echo date("d-M-Y", strtotime($row->launched));?></td>
              						<td><?php echo date("d-M-Y", strtotime($row->deadline));?></td>
                              		<td>
                              		<?php echo form_dropdown('status',array('D'=>'Draft','A'=>'Approval','R'=>'Reject','P'=>'Pending'),
                              		    $row->status,'','class="status_checks" data-id="'.$row->campaign_id.'"');?>
                              		</td>
                              		<td> 
                                  		<?php if($row->is_active == FALSE) {?>
                                  			<button type="button" class="active btn btn-success" data-id="'.$row->campaign_id.'" status="1">Activate</button>
                          				<?php }else {?>
                                	      <button  type="button" class="active btn btn-danger btn-sm" data-id="'.$row->campaign_id.'" status="0">Deactivate</button>
                                  		<?php }?>
	                             	</td>
	                             	<td>
	                             		<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
	                             			<?php echo anchor(base_url('Campaign/Edit/'.$row->campaign_id), '<i class="btn bx bx-edit-alt"></i>', 'class="btn btn-secondary btn-sm"'); ?>
    										<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->campaign_id.'" title="Delete"><i class="btn bx bx-trash-alt"></i></button>
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
$(document).on('change', '.status_checks', function() 
{ 
  var status =this.value;
  var id = $(this).attr('data-id');
     url = "<?php echo base_url('index.php/campaign/status_change');?>"; 
     $.ajax({
              type:"GET",
              url: url, 
              data: {"id":id,"status":status}, 
              success: function(data)
              {
               if(data == true)
                {
                alert("Data has been change success");
               }
              }
            });
});
$(document).on('click','.delete',function()
 {
   if(confirm('Are you sure Delete data'))
   {
    $row = $(this).parent().parent();
    var id = $(this).attr('data-id');
    var url ="<?php echo base_url('index.php/campaign/delete');?>";
      $.ajax({
        type:"GET",
        url:url,
        data:{"id":id},
        success: function(data)
          {
            if(data==true)
            {
              $row.remove();
            } 
            else{
                  alert('Unable to delete');
               }
          }
      });
   }
 }
);
  $(document).on('click','.active',function()
 { 
    var $btn =  $(this);
    var status = ($(this).hasClass("btn-success")) ? '0' : '1'; 
    var msg = (status=='0')? 'Deactivate' : 'Activate'; 
    if(confirm("Are you sure to "+ msg))
    { 
        var current_element = $(this); 
        var status =$(current_element).attr('status');
        var id = $(current_element).attr('data-id');
        url = "<?php echo base_url('index.php/campaign/active');?>"; 
            $.ajax({
              type:"GET",
              url: url, 
              data: {"id":id,"status":status}, 
              success: function(data)
              {
                if(data == true)
                {
                  if(status == 1)
                    {
                      $btn.text('Deactivate');
                      $btn.addClass("btn-danger");
                      $btn.removeClass("btn-success");
                      $btn.attr('status', 0);
                    }
                    else{
                        $btn.text('Activate');
                        $btn.addClass("btn-success");
                        $btn.removeClass("btn-danger");
                        $btn.attr('status', 1);
                      }
                } 
             } 
        });
    }  
 });
</script>
