<?php
namespace Application;
class View {
    
    protected $body;
    protected $variables = array();
     
    function __construct() {

    }
    
    // Set variables
    function set($name,$value) {
        $this->variables[$name] = $value;
    }

    // Set title
    function title($title) {
        $title = empty($title) ? $title : $title . ' - ';
        $this->variables['title'] = $title . WEBSITE_TITLE;
    }
     
    function render($view_name, $layout = true, $title = '', $val = null) {
        extract($this->variables);
		$urls = explode(('\\'), $view_name);

        $viewLoc = '';
        $fileLoc = '';
        if($urls[0] == 'area') {
            if(file_exists(ROOT . DS . app_name . DS .
                            'application' . DS . 'areas' . DS .
                            $urls[1] . DS . 'views' . DS . $urls[2] . DS . $urls[3] . '.php')) 
                $viewLoc = ROOT . DS . app_name . DS .
                            'application' . DS . 'areas' . DS . $urls[1] .
                            DS . 'views' . DS;
                $fileLoc = $urls[2] . DS . $urls[3] . '.php';
        } elseif(file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'views' . DS . $urls[0] . DS . $urls[1] . '.php') ) {
			$viewLoc = ROOT . DS . app_name . DS .
                        'application' . DS . 'views' . DS;
            $fileLoc = $urls[0] . DS . $urls[1] . '.php';
		}

        if(empty($viewLoc)) {
            throw new \Application\MeException('Me4V4');
        } else {
            if ($layout)
            {
                // Body layout
                $this->variables['view_location'] = $viewLoc;
                $this->body = $viewLoc . $fileLoc;

                // Main layout
                require_once($viewLoc . 'shared' . DS . 'main.php');
            } else {

                // Body layout only
                require_once($viewLoc . $fileLoc);
            }
        }
    }

    function include_view($fileName) {
        if(!empty($fileName))
            require_once($fileName);
    }
}
