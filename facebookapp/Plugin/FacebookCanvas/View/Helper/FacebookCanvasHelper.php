<?php

App::uses('AppHelper', 'View/Helper');

/**
 * @property HtmlHelper $Html
 */
class FacebookCanvasHelper extends AppHelper {
	public $helpers = array('Html');

	public function __construct(\View $View, $settings = array()) {
		parent::__construct($View, $settings);
	}

	public function afterRenderFile($viewfile, $content) {
		//$content .= '<p>BACON!' . $viewfile . '</p>';
		//return $content;
	}
}

