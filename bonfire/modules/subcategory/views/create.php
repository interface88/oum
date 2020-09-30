<main id="main">
  <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Sub Category</h2>
            <ol>
          	  <li><a href="<?php echo base_url('');?>">Home</a></li>
              <li><a href="<?php echo base_url('subcategory/list');?>">Sub Category List</a></li>
              <li>Create Category</li>
            </ol>
          </div>
        </div>
  </section>
  <section class="inner-page">
   <div class="container">
     <div class="card col-sm-12">
       <div class="card-body">
          <?php
          $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'myform', 'accept-charset'=>'utf-8');
                    echo form_open_multipart('subcategory/create', $attributes);
          ?> 
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sub Category Name</label>
                        <div class="col-sm-6">
                             <?php echo form_input(array('class' =>'form-control', 'id'=>'category', 'name'=>'category', 'type'=>'text', 'value'=>set_value('category'),)); echo '<div class="error">'.form_error('category').'</div>';?>    
                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-6">
                             <?php
                              echo form_dropdown('category_name',$category_list,set_value('category'),'class="form-control"'); echo '<div class="error">'.form_error('category').'</div>';
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