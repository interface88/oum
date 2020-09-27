<main id="main">
  <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Category</h2>
          <ol>
            <li><a href="<?php echo base_url('');?>">Home</a></li>
            <li>Category List</li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
          <div class="page-container row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?php echo anchor(base_url('campaign/category'), '<i class="bx bx-plus"></i> New', 'class="btn btn-secondary btn-sm"'); ?>
                        <table class="table table-hover table-bordered  table-sm">
                          <caption>List of Category</caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Category Name</th>
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
                                  <td><?php echo $row->category_name;?></td>
                                <td>
                                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <?php echo anchor(base_url('campaign/edit_category/'.$row->category_id), '<i class="btn bx bx-edit-alt"></i>', 'class="btn btn-secondary btn-sm"'); ?>
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->category_id.'" title="Delete"><i class="btn bx bx-trash-alt"></i></button>
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
