<?php \Application\HTMLHelper::ActionLink('category/add', 'Thêm Category', 'btn btn-info margin-10'); ?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Categories</div>
<!--   <div class="panel-body">
    <p>...</p>
  </div> -->

  <!-- Table -->
  <table class="table">
    <thead>
    	<tr><th>Tên</th><th>Miêu Tả</th><th>Thao Tác</th></tr>
    </thead>
    <tbody>

    <?php

    	foreach ($this->variables['categories'] as $cat)
		{
			echo '<tr><td>'.$cat->name.'</td>';
      echo '<td>'.$cat->des.'</td><td>';
			\Application\HTMLHelper::ActionLink('category/edit/'.$cat->id, 'Sửa', 'btn btn-info');
			\Application\HTMLHelper::ActionLink('category/remove/'.$cat->id, 'Xóa','btn btn-danger');
			echo '</td></tr>';
		}
	?>
    </tbody>
  </table>
</div>

<?php
echo '<div class="row">';
  foreach ($this->variables['categories'] as $v) {
    echo '<div class="col-xs-6 col-md-3 text-center">
          <a href="category/view/' . $v->id . '" class="thumbnail">
            <img src="' . WEBSITE_URL . '/images/categories/'. $v->img . '" alt="' . $v->name . '">
            <div class="caption">
              <h3>' . $v->name . '</h3> 
              <p>' . $v->des . '</p></div></a>';
      \Application\HTMLHelper::ActionLink('category/edit/'.$cat->id, 'Sửa', 'btn btn-info');
      \Application\HTMLHelper::ActionLink('category/remove/'.$cat->id, 'Xóa','btn btn-danger');
    echo '
        </div>
      ';
  }
  echo '</div>';
  ?>