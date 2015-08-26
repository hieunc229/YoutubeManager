
<?php

	echo '<div class="row">';
	foreach ($this->variables['Categories'] as $v) {
		echo '<div class="col-xs-6 col-md-3 text-center">
			    <a href="category/view/' . $v->id . '" class="thumbnail">
			      <img src="' . WEBSITE_URL . '/images/categories/'. $v->img . '" alt="' . $v->name . '">
			      <div class="caption">
			        <h3>' . $v->name . '</h3> 
			        <p>' . $v->des . '<p>
			     
			    </div>
			     </a>
			  </div>
			';
	}
	echo '</div>';

?>