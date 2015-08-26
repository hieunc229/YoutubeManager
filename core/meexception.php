<?php
namespace Application;
class MeException extends \Exception {
	protected $mess;
	protected $code;
	protected $advice;

	public function __construct($code = 'Me000') {
		$this->code = $code;
		parent::__construct($this->me_exception_list($code));
	}

	private function me_exception_list($code) {
		$MeExpectionObj = array(
							'Me000' => 'Default Exception',
							'Me001' => 'Invalid role access',
							'Me002' => 'Value provided is not a number',
							'Me003' => 'Value is invalid',
							'Me404' => 'URL not found',
							'Me4C4' => 'Class not found',
							'Me4V4' => 'View not found',
							'Me4O4' => 'Object empty');

		return $MeExpectionObj[$code];
	}

	public static function handler($ex) {
		//echo "<b>Exception:</b> ". $ex->getMessage();
		$view = new \Application\View();
		$view->set('message', $ex->getMessage());
		$view->title($ex->getMessage());
		$view->render('shared\exception',$ex->getMessage());
		
	}
}
?>