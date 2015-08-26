<form class="form-horizontal" method="post" action="/admincp/category/actionedit" role="form">
  <?php \Application\HTMLHelper::DisplayError();
        \Application\HTMLHelper::InsertHiddenValue('id',$this->variables['category']->id);
  ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
    <input type="text" value="<?php echo $this->variables['category']->name;?>" class="form-control" name="name" id="name" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Description:</label>
      <div class="col-sm-10">          
        <input type="text" value="<?php echo $this->variables['category']->des;?>" class="form-control" name="des" id="des" placeholder="Enter descritpion">
      </div>
    </div>



    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>