<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kostalk {
	
	public static $instances = array();
	
	protected $_config;
	protected $host;
	protected $port = 11300;
	protected $tube;
	public $pheanstalk;
	
	public static function instance($tube = NULL)
	{
		if($tube === NULL) $tube = 'default';
		
		if( ! isset(Kostalk::$instances[$tube]))
		{
			Kostalk::$instances[$tube] = new Kostalk($tube);
		}
		
		return Kostalk::$instances[$tube];
	}
	
	public function __construct($tube)
	{
		$this->_config = Kohana::$config->load('pheanstalk');
		$this->host = ($this->_config['host']) ? $this->_config['host'] : '127.0.0.1';
		$this->port = ($this->_config['port']) ? $this->_config['port'] : $this->port;
		$this->tube = $tube;
		
		$this->pheanstalk =  new Pheanstalk($this->host, $this->port);
		$this->pheanstalk->useTube($this->tube);
	}
	
	public function push(
		$data = FALSE, 
		$priority = Pheanstalk::DEFAULT_PRIORITY, 
		$delay = Pheanstalk::DEFAULT_DELAY, 
		$ttr = Pheanstalk::DEFAULT_TTR
	)
	{
		if($data)
		{
			return $this->pheanstalk->put(json_encode($data), $priority, $delay, $ttr);
		}
		
		return FALSE;
	}
	
	public function pull($callback)
	{
		$job = $this->pheanstalk->watch($this->tube)->reserve();
		$data = json_decode($job->getData(), TRUE);
		$this->pheanstalk->delete($job);
		$callback($data, $job);
	}
	
}