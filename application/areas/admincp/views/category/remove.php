<form class="form-horizontal text-center" method="post" action="/admincp/category/actionremove" role="form">
	<?php 	\Application\HTMLHelper::DisplayError();
			\Application\HTMLHelper::InsertHiddenValue('id',$this->variables['category']->id);
	?>
	<h3>Do you want to delete this category?</h3>
	 <div class="form-group">
      <label class="control-label col-sm-5">Name:</label>
      <lable class="col-sm-5 text-left">
      <?php echo $this->variables['category']->name; ?>
      </lable>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5" for="des">Description:</label>
      <lable class="col-sm-5 text-left">          
       <?php echo $this->variables['category']->des; ?>
      </lable>
    </div>
	<div class="form-group">        
        <button type="submit" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default">Cancel</button>
    </div>
  </form>