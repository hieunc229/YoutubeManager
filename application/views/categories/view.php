<?php

	echo '<div class="row">';
	foreach ($this->variables['Series'] as $s) {
		if(empty($s->v)) break;
		echo '	<div class="col-xs-6 col-md-3 text-center">
			    	<a href="/series/view/' . $s->id . '" class="thumbnail">
				      	<img src="http://i.ytimg.com/vi/' . $s->v . '/0.jpg" alt="' . $s->name . '">
				      	<div class="caption">
				        	<h3>' . $s->name . '</h3> 
				     	</div>
			      	</a>
				</div>
			';
	}
	echo '</div>';
?>