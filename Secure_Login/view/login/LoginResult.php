<?php
class LoginResult {
	/**
	 * Holds variables assigned to template
	 */
	private $data;
	
	/**
	 * Holds render status of view
	*/
	private $render = FALSE;
	private $header = FALSE;
	private $footer = FALSE;
	private $nav = FALSE;
	
	public function __construct($template,$header,$footer,$nav) {
		if (file_exists($template)) {
			$this->render = $template;
		}
if (file_exists($header))
{
/**
* trigger render to include file when this model is destroyed
* if we render it now, we wouldn't be able to assign variables
* to the view!
*/
$this->header = $header;
}
if (file_exists($footer))
{
/**
* trigger render to include file when this model is destroyed
* if we render it now, we wouldn't be able to assign variables
* to the view!
*/
$this->footer = $footer;
}
if (file_exists($nav))
{
/**
* trigger render to include file when this model is destroyed
* if we render it now, we wouldn't be able to assign variables
* to the view!
*/
$this->nav = $nav;
}
	}
	
	public function assign($data) {
		$this->data = $data;
	}
	
	public function __destruct() {
		$data = $this->data;
include_once($this->header);
include_once($this->nav);
include_once($this->render);
include_once($this->footer);
	}
}

