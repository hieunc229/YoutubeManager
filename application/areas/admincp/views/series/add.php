<form class="form-horizontal" method="post" action="/admincp/series/actionadd" role="form">
  <?php \Application\HTMLHelper::DisplayError(); ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
    <input type="text" value="" class="form-control" name="name" id="name" placeholder="Enter series name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Category:</label>
      <div class="col-sm-10">
      <?php \Application\HTMLHelper::DropdownSelectList('cat_id',$this->variables['categories'], 'id', 'name'); ?>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
  </form>