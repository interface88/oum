<main id="main">
  <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Donation list</h2>
          <ol>
              <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li><a href="<?php echo base_url('donation/lists');?>">Donation List</a></li>
              <li>Donation</li>
          </ol>
        </div>
      </div>
    </section>
    <section class="inner-page">
        <div class="container">
          <div class="page-container row">
            <div class="col-lg-12">
                <div class="table-responsive">
                        <table class="table table-hover table-bordered  table-sm">
                          <caption>List of Donation</caption>
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Campaign Name</th>
                              <th scope="col">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php
                            $i=1;
                            foreach ($donation_list as $row) {
                            ?>
                         	   <tr>
                                <td scope="row"><?php echo $i++;?></td>
                                <td><?php echo $row->firstname;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->productInfo;?></td>
                                <td><?php echo $row->amount;?></td>
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
