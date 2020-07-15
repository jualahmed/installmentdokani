
<div class="content-wrapper" id="vuejsapp">
	<section class="content text-right">
		<!-- Button trigger modal -->
		<div class="text-left">
		<?php if($this->session->flashdata('success')){ ?>
		   <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
		<?php } ?>
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  <i class="fa fa-plus"></i> Create a new category
		</button>
		<br>
		<br>
		<table class="table table-bordred table-striped" align="left">
			<tr align="left">
				<th>No.</th>
				<th>Category name</th>
				<th>Category description</th>
				<th align="center">Action</th>
			</tr>
			<tr v-for="(r,index) in result[0]" align="left"> 
				<td>{{ row+index+1 }}</td>
				<td>{{ r.catagory_name }}</td>
				<td>{{ r.catagory_description }}</td>
				<td>
					<?php if($user_type=='superadmin'){ ?>
						<a data-toggle="modal" :catagory_id="r.catagory_id" data-target="#EditModel" class="btn edit btn-sm btn-success" ><i class="fa fa-edit"></i> Edit</a>
						<a onclick="return confirm('Are you sure your want to delete?')" :href="base_url+'category/destroy/'+r.catagory_id" class="btn btn-sm btn-danger" >
							<i class="fa fa-trash"></i> Delete
						</a>
					<?php } ?>
				</td>
			</tr>
		</table>
		<div id='pagination' v-html="pagination[0]"></div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="category" action="<?php echo base_url();?>category/create" method="post" class="form-horizontal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <div class="row">
	        	<div class="col-md-6">
	        		<h3 class="modal-title" id="exampleModalLabel">Create a new category</h3>
	        	</div>
	        	<div class="col-md-6">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-body">
			<div class="box-body">
				<div class="form-group">
					<label class="form-control-label">Category Name</label>
					<?php 
						echo form_input('catagory_name', '','class="form-control" id="catagory_name" placeholder="Category Name" autocomplete="off"');
					?>
				</div>
				<div class="form-group">
					<label class="form-control-label">Category Description</label>
					<?php 
						$catagoryDescription = array(
							'name'	=> 'catagory_description',
							'id'	=> 'catagory_description',
							'class'	=> 'form-control',
							'rows'  => '2',
							'cols'  => '10',
							'maxlength'	=> 100
						);
						 echo form_textarea($catagoryDescription, '', 'class="form-control" rows="4" placeholder="Category Description"');
					?> 
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success" name="search_random" id="submit_btn"><i class="fa fa-fw fa-save"></i> Create</button>
			<button type="reset" id="reset_btn" class="btn btn-warning"><i class="fa fa-fw fa-refresh"></i> Reset</button>
	      </div>
	    </div>
	  </div>
  </form>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="EditModel" tabindex="-1" role="dialog" aria-labelledby="EditModelLabel" aria-hidden="true">
    <form id="categoryupdate" action="<?php echo base_url();?>category/update" method="post" class="form-horizontal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <div class="row">
	        	<div class="col-md-6">
	        		<h3 class="modal-title" id="EditModelLabel">Edit Category</h3>
	        	</div>
	        	<div class="col-md-6">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-body">
			<div class="box-body">
				<input type="hidden" name="catagory_id" class="catagory_id">
 				<div class="form-group">
					<label class="form-control-label">Category Name</label>
					<?php 
						echo form_input('catagory_name', '','class="form-control catagory_name" id="catagory_name" placeholder="Category Name" autocomplete="off"');
					?>
				</div>
				<div class="form-group">
					<label class="form-control-label">Category Description</label>
					<?php 
						$catagoryDescription = array(
							'name'	=> 'catagory_description',
							'id'	=> 'catagory_description',
							'class'	=> 'form-control catagory_description',
							'rows'  => '2',
							'cols'  => '10',
							'maxlength'	=> 100
						);
						 echo form_textarea($catagoryDescription, '', 'class="form-control" rows="4" placeholder="Category Description"');
					?> 
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success" name="search_random" id="submit_btn"><i class="fa fa-fw fa-save"></i> Update</button>
			<button type="reset" id="reset_btn" class="btn btn-warning"><i class="fa fa-fw fa-refresh"></i> Reset</button>
	      </div>
	    </div>
	  </div>
  </form>
</div>


