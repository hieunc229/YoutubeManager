<?php 
?>
<form class="form-horizontal" method="post" action="/admincp/category/actionadd" role="form" id="form">
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
      <label class="control-label col-sm-2" for="pwd">Upload picture:</label>
      <div class="col-sm-10">
       <div id="fileuploader">Upload</div>

      </div>  


      </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
<a href="../category/upload">aasdf</a>
<?php $string = "
<script>
$(document).ready(function()
{
  function addHidden(theForm, key, value) {
    // Create a hidden input element, and append it to the form:
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = key;'name-as-seen-at-the-server';
    input.value = value;
    theForm.appendChild(input);
}

  var uploadob = $('#fileuploader').uploadFile({
  url:'http://mvideo/admincp/category/upload',
  fileName:'myfile'
  });
  

$('#form').on('submit', function(d) {
    var x = uploadob.getResponses()
    $('#form').append(\"<input type='hidden' name='img' value='\" + eval(x[0]) + \"' />\");

})
});
</script>
"; 
  \Application\HTMLHelper::AddJSTxtScript($string); 
?>