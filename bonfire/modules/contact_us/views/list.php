<main id="main">
  <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact us list</h2>
          <ol>
              <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li><a href="<?php echo base_url('contact_us/lists');?>">Contact us List</a></li>
            </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
          <div class="page-container row">
            <div class="col-lg-12">
                <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm datatable">
                          <caption>List of Contact</caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                             <th scope="col">Phone</th>
                             <th scope="col">subject</th>
                             <th scope="col">message</th>
                             <th scope="col">Date/Time</th>
                             <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i=1;
                            foreach ($contact_list as $row) {
                            ?>
                                <tr>
                                <td scope="row"><?php echo $i++;?></td>
                                <td><?php echo $row->name;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->phone;?></td>
                                <td><?php echo $row->subject;?></td>
                                <td><?php echo $string = word_limiter($row->message, 20);?></td>
                                <td><?php echo $row->date_time;?></td>
                                <td><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row->id;?>" title="Delete"><i class="btn bx bx-trash-alt"></i></button>
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
    var url ="<?php echo base_url('contact_us/delete');?>";
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
