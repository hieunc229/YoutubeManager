<?php

/*foreach ($this->variables['Movies'] as $m) {
		echo '<a href="/link/view/' . $m->id . '">' .
		 $m->name . '</a><br/>';
	}*/
?>


<?php

	echo '<div class="row">';
	foreach ($this->variables['Movies'] as $v) {
		echo '	<div class="col-xs-6 col-md-3 text-center">
			    	<a href="/link/view/' . $v->id . '" class="thumbnail">
				      	<img src="http://i.ytimg.com/vi/' . $v->v . '/0.jpg" alt="' . $v->name . '">
				      	<div class="caption">
				        	<h3>' . $v->name . '</h3> 
				     	</div>
			      	</a>
				</div>
			';
	}
	echo '</div>';

?>