<main id="main">
	<section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>User</h2>
          <ol>
            <li><a href="<?php echo base_url('');?>">Home</a></li>
            <li>User List</li>
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
                          <caption>List of User</caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Username</th>
                              <th scope="col">Display Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Last Login</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i=1;
                            foreach ($users_list as $row) {
                            ?>
                              <tr>
                              		<td scope="row"><?php echo $i++;?></td>
                              		<td scope="row"><?php echo $row->username;?></td>
                              		<td scope="row"><?php echo $row->display_name;?></td>
                              		<td scope="row"><?php echo $row->email;?></td>
                              		<td scope="row"><?php echo $row->role_name;?></td>
                              		<td scope="row"><?php echo $row->last_login;?></td>
                            		<td scope="row">
                            		<?php 
                            		if(1==$row->active)
                            		{
                            		   echo '<span class="p-1 mb-2 bg-success text-white">Active</span>';
                            		}
                            		else{
                            		    echo '<span class="p-1 mb-2 bg-warning text-white">Inactive</span>';
                            		}
                            		?>
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