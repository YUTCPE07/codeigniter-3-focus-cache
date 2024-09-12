<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$status = $this->cache->save('testCache', [
			'name' => 'testCache',
			'timestamp' => date('Y-m-d H:i:s'),
		], 60*60);

		echo "cache save : $status";

		$cache = $this->cache->get('testCache');
		// $root = $_SERVER['DOCUMENT_ROOT'];
		// var_dump("$root/application/cache");
		// $allCache = scandir("$root/application/cache");
		echo '<pre>';
		var_dump($cache);
		echo '</pre>';
		$this->load->view('welcome_message');
	}
}
