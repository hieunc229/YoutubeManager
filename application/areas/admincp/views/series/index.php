<?php \Application\HTMLHelper::ActionLink('series/add', 'Thêm Series', 'btn btn-info margin-10'); ?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Series</div>
<!--   <div class="panel-body">
    <p>...</p>
  </div> -->

  <!-- Table -->
  <table class="table">
    <thead>
    	<tr><th>Tên</th><th>Category</th><th>Thao Tác</th></tr>
    </thead>
    <tbody>

    <?php

    	foreach ($this->variables['series'] as $ser)
		{
			echo '<tr><td>';
      \Application\HTMLHelper::ActionLink('link/index/'.$ser->id, $ser->name);
      echo '</td>';
      echo '<td>';
      \Application\HTMLHelper::ActionLink('category/edit/'.$ser->cat_id, $ser->cat_name);
      echo '</td><td>';
			\Application\HTMLHelper::ActionLink('series/edit/'.$ser->id, 'Sửa', 'btn btn-info');
			\Application\HTMLHelper::ActionLink('series/remove/'.$ser->id, 'Xóa','btn btn-danger');
			echo '</td></tr>';
		}
	?>
    </tbody>
  </table>
</div>