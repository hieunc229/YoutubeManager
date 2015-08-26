<?php \Application\HTMLHelper::ActionLink('link/add', 'Thêm Link', 'btn btn-info margin-10'); ?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Links</div>
<!--   <div class="panel-body">
    <p>...</p>
  </div> -->

  <!-- Table -->
  <table class="table">
    <thead>
    	<tr><th>Tên</th><th>Series</th><th>Thao Tác</th></tr>
    </thead>
    <tbody>

    <?php

    	foreach ($this->variables['links'] as $li)
		{
			echo '<tr><td>';
      \Application\HTMLHelper::ActionLink('link/edit/'.$li->id, $li->name);
      echo '</td>';
      echo '<td>';
      \Application\HTMLHelper::ActionLink('series/edit/'.$li->ser_id, $li->ser_name);
      echo '</td><td>';
			\Application\HTMLHelper::ActionLink('link/edit/'.$li->id, 'Sửa', 'btn btn-info');
			\Application\HTMLHelper::ActionLink('link/remove/'.$li->id, 'Xóa','btn btn-danger');
			echo '</td></tr>';
		}
	?>
    </tbody>
  </table>
</div>