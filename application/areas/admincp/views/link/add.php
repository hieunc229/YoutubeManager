<form class="form-horizontal" method="post" action="/admincp/link/actionadd" role="form">
  <?php \Application\HTMLHelper::DisplayError(); ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
    <input type="text" value="" class="form-control" name="li_name" id="name" placeholder="Enter link name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Link:</label>
      <div class="col-sm-10">
    <input type="text" value="" class="form-control" name="li_v" id="v" placeholder="Enter url link">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Description:</label>
      <div class="col-sm-10">
    <input type="text" value="" class="form-control" name="li_des" id="des" placeholder="Enter des name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Category:</label>
      <div class="col-sm-10">
      <?php \Application\HTMLHelper::DropdownSelectList('ser_id',$this->variables['series'], 'id', 'name'); ?>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
  </form>