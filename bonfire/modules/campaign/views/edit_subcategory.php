<main id="main">
  <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Inner Page</h2>
            <ol>
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li>Create Category</li>
            </ol>
          </div>
        </div>
  </section>
  <section class="inner-page">
   <div class="container">
     <div class="card col-sm-6">
       <div class="card-body">
          <?php
          $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                    echo form_open_multipart('campaign/edit_subcategory/'.$list_item->subcategory_id.'', $attributes);
          ?> 
                     <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label">Sub Category Name</label>
                        <div class="col-sm-6">
                             <?php echo form_input(array('class' =>'form-control', 'id'=>'category', 'name'=>'category', 'type'=>'text', 'value'=>$list_item->subcategory_name,)); echo '<div class="error">'.form_error('category').'</div>';?>    
                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label">Category Name</label>
                        <div class="col-sm-6">
                             <?php
                              echo form_dropdown('category_name',$category_item,$list_item->category_id,'','class="form-control"'); echo '<div class="error">'.form_error('category').'</div>';
                              ?>   
                         </div>
                      </div>
                       <div class="form-group row">
                         <div class="col-sm-6">
                           <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>    
                         </div>
                      </div>
          <?php
          echo form_close();
          ?>
      </div>
    </div>
   </div> 
 </section>
</main>