<main id="main">
	<section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Sub Category</h2>
          <ol>              
          	  <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li><a href="<?php echo base_url('subcategory/list');?>">Sub Category List</a></li>
              <li>Sub Category list</li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
        	<div class="page-container row">
        		<div class="col-lg-12">
                <div class="table-responsive">
                  <?php echo anchor(base_url('subcategory/create'), '<i class="bx bx-plus"></i> New', 'class="btn btn-secondary btn-sm"'); ?>
                        <table class="table table-hover table-bordered  table-sm">
                          <caption>List of Sub Category </caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Sub Category Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i=1;
                            foreach ($subcategory_list as $row) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $i++;?></td>
                                    <td><?php echo $row->sub_category_name;?></td>
                                    <td><?php echo $row->category_name;?></td>
                                    <td>
                                    	<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    		<?php echo anchor(base_url('subcategory/edit/'.$row->sub_category_id), '<i class="btn bx bx-edit-alt"></i>', 'class="btn btn-secondary btn-sm"'); ?>
                                    		<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row->sub_category_id; ?>" title="Delete"><i class="btn bx bx-trash-alt"></i></button>
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
<script>
$(document).on('click','.delete',function()
 {
   if(confirm('Are you sure Delete data'))
   {
    $row = $(this).parent().parent().parent();
    var id = $(this).attr('data-id');
    var url ="<?php echo base_url('subcategory/delete');?>";
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
</script>