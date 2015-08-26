<form class="form-horizontal" method="post" action="/admincp/<?php echo $this->variables['controller']; ?>/actionadd" role="form">
  <?php \Application\HTMLHelper::DisplayError(); ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
    <input type="text" value="" class="form-control" name="name" id="name" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Description:</label>
      <div class="col-sm-10">          
        <input type="text" value="" class="form-control" name="des" id="des" >
      </div>
    </div>



    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>