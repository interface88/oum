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
<div class="table-responsive">
        <table class="table table-hover table-sm">
          <caption>List of Project</caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Sub Title</th>
              <th scope="col">category</th>
              <th scope="col">launched</th>
              <th scope="col">Exipre date</th>
              <th scope="col">Status</th>
              <th scope="col">Activate/Deactivate</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;
            foreach ($list_item as $row) 
            {
              echo '<tr><th scope="row">'.$i++.'</th><td>'.$row->title.'</td><td>'.$row->subtitle.'</td><td>'.$row->category.'</td><td>'.$row->launched.'</td><td>'.$row->deadline.'</td><td>';
              echo form_dropdown('status',array('D'=>'Draft','A'=>'Approval','R'=>'Reject','P'=>'Pending'),$row->status,'','class="status_checks form-control" data-id="'.$row->campaign_id.'"');
              echo'</td><td>';
              if($row->is_active == FALSE)
              {
                  echo '<button type="button" class="active btn btn-success" data-id="'.$row->campaign_id.'" status="1">Activate</button>';
              }
              else{
                  echo '<button  type="button" class="active btn btn-danger" data-id="'.$row->campaign_id.'" status="0">Deactivate</button>';
              }
              
              echo '</td><td><a href="'.base_url('Campaign/Edit/'.$row->campaign_id.'').'" title="Edit"><i class="btn bx bx-edit-alt"></i></a> <button type="button" class="delete btn" data-id="'.$row->campaign_id.'" title="Delete"><i class="btn bx bx-trash-alt"></i></button></td></tr>';
            }
            ?>
          </tbody>
        </table>
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
</script>
<script>
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
</script>
<script>
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
