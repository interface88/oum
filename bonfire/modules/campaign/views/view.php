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
<table class="table table-hover">
  <caption>List of Project</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Sub Title</th>
      <th scope="col">category</th>
      <th scope="col">Image</th>
      <th scope="col">launched</th>
      <th scope="col">Exipre date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach ($list_item as $row) 
    {
      echo '<tr><th scope="row">'.$i++.'</th><td>'.$row->title.'</td><td>'.$row->subtitle.'</td><td>'.$row->category.'</td><td><img class="img-thumbnail" src="'.base_url('assets/Campaign/'.$row->image.'').'"></td><td>'.$row->launched.'</td><td>'.$row->deadline.'</td><td>';
        if('D'==$row->status)
        {
          echo 'Draft';
        }
        elseif('A'==$row->status)
        {
            echo 'Approval';
        }
        elseif('R'==$row->status)
        {
            echo 'Reject';
        }
        elseif('P'==$row->status)
        {
            echo 'Pending';
        }
      echo'</td><td><a href="'.base_url('Campaign/Edit/'.$row->campaign_id.'').'">Edit</a></td></tr>';
    }
    ?>
  </tbody>
</table>
</div>
</section>
</main>