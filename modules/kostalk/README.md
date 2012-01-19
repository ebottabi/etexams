# Kostalk

A Kohana 3.2 module to make it easy to use beanstalkd, it uses Pheanstalk, a comprehensive lib already written in PHP

## Install Beanstalk

	sudo apt-get install beanstalkd
	./beanstalkd
	
## Some Code
```php
// Add something to a queue
$queue = Kostalk::instance('name_of_tube');
$queue->push(array(
	'this' => 'is',
	'some' => 'data',
));
	
// Pull something from the queue, first callback param
// is the data in the job, the class uses JSON to encode
// and decode the data, this is all done for you. The second
// param is the job object from Pheanstalk

$queue = Kostalk::instance('name_of_tube')->pull(function($data, $job){
	print_r($data); // array('this' => 'is', 'some' => 'data');
});

```