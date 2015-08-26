<?php
namespace Application;
class HTMLHelper {

	public static $errors = array();
	public static $scripts = array();
	public static $txtScripts = array();
	public static $css = array();

	public static function partial_view($name)
	{
		if(!empty($name))
			require_once($name);
	}

	public static function AddError($msg)
	{
		\Application\HTMLHelper::$errors[] = $msg;
	}

	public static function DisplayError()
	{
		$err = \Application\HTMLHelper::$errors;
		if(count($err) > 0)
		{
			echo '<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>';
			foreach ($err as $val) {
				echo $val . '<br/>';
			}
			echo '</div>';
		}
	}

	public static function IsLogin() {
		return isset($_SESSION['isLogin']);
	}

	public static function DisplayTopNav($items) {
		echo '<div class="btn-group pull-right">';
		foreach ($items as $item)
		{
			if($item['signIn'] == true)
			{
				if(\Application\HTMLHelper::IsLogin() == false) continue;
			}

			echo '<a href="'.$item['url'].'">"'.$item['name'].'</a>';
		}
	    echo '</div>';
	}

	/*	Insert Hyperlink Text HTMLHelper
	*	$link : destination link
	*	$name : hyperlink text
	*	Optional
	*		$class : class  of image
	*	Usage example 
	*		ActionLink('http://google.com','Search Google')
	*		ActionLink('http://google.com','Search Google', 'btn btn-default')
	*/
	public static function ActionLink($link, $name, $class = null)
	{
		if($class != null)
		{
			echo ' <a class="'.$class.'" href="'.$link.'">'.$name.'</a> ';
		} else
			echo ' <a href="'.$link.'">'.$name.'</a> ';
	}

	/*	Insert Image HTMLHelper
	*	$url : path link to image
	*	$alt : image description if image does not show 
	*	Optional
	*		$class : class  of image
	*		$height: height of image
	*		$width : width  of image
	*	Usage example 
	*		InsertImage('image/logo.png', 'Website Logo')
	*		InsertImage('image/no1.png', 'Number one', 'margin-10', 20, 20)
	*/
	public static function InsertImage($url, $alt, $class = null, $height = null, $width = null) {
		$print = '<img src="'.$url.'" alt="'.$alt.'"';
		if($height != null) { $print .= ' height='.$height; }
		if($width != null) { $print .= ' width='.$width; }
		if($class != null) { $print .= ' class="'.$class.'"'; }
		$print .= '>';
		echo $print;
	}

	/*	Insert hidden value for form HTMLHelper
	*	$name : name of hidden value
	*	$val  : value of hidden attribute
	*	Usage example
	*	InsertHiddenValue('id', $id); 
	*	InsetHiddenValue('name', 'Jone');
	*/
	public static function InsertHiddenValue($name, $val) {
		echo '<input value="'.$val.'" name="'.$name.'" type="hidden" />';
	}

	public static function DropdownSelectList($name, $list, $id, $val, $selected = 0, $class = '') {
		$print = '<select name="'.$name.'" class="form-control '.$class.'">';

		for ($i = 0; $i < count($list); $i++){
			$print .= '<option value="'.$list[$i]->{$id}.'"';
			if($i == $selected) $print .= ' selected';
			$print .= '>'.$list[$i]->{$val}.'</option>';
		}
		
		$print .= '</select>';
		echo $print;
	}

	public static function AddJSScripts($file)
	{
		\Application\HTMLHelper::$scripts[] = $file;
	}

	public static function AddJSTxtScript($script) {
		\Application\HTMLHelper::$txtScripts[] = $script;
	}

	public static function JSScripts() {
		$scripts = \Application\HTMLHelper::$scripts;
		if(count($scripts) > 0)
		{
			foreach ($scripts as $script) {
				echo "<script src='/scripts/".$script."' type='text/javascript'></script>";
			}
		}

		$txtScripts = \Application\HTMLHelper::$txtScripts;
		if(count($txtScripts) > 0) {
			foreach ($txtScripts as $script) {
				echo $script;
			}
		}
		
	}

	public static function AddCSS($file)
	{
		\Application\HTMLHelper::$css[] = $file;
	}

	public static function CSS() {
		$csses = \Application\HTMLHelper::$css;
		if(count($csses) > 0)
		{
			foreach (\Application\HTMLHelper::$csses as $css) {
				if($css['direct'] == true)
					echo "<link href='/styles/".$css."' type='text/javascript'></script>";
				else echo "<link href='".$css."' type='text/javascript'></script>";
			}
		}
		
	}
}
?>