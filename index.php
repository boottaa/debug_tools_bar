<?php
/**
 * Created by PhpStorm.
 * User: bootta
 * Date: 21.02.18
 * Time: 9:52
 */

use PhpMiddleware\DoublePassDelegate;
use Zend\Diactoros\ServerRequest;

require_once __DIR__.'/loader.php';



use DebugBar\StandardDebugBar;


$adapter = new Zend\Db\Adapter\Adapter([
	'driver'         => 'pdo',
	'dsn'            => 'mysql:dbname=test;host=192.168.33.11',
	'username'       => 'bootta',
	'password'       => '1991',
]);
$pdo = $adapter->getDriver()->getConnection()->getResource();
$tracablePdo = new \DebugBar\DataCollector\PDO\TraceablePDO($pdo);


///////////Для примера генерим запросы/////////////////////////////////////
$x = $adapter->query("SELECT * FROM test.test")->execute()->current();	///
$x = $adapter->query("SELECT * FROM test.test")->execute()->current();	///
$x = $adapter->query("SELECT * FROM test.test")->execute()->current();	///
$x = $adapter->query("SELECT * FROM test.test")->execute()->current();	///
///////////////////////////////////////////////////////////////////////////


$debugbar = new StandardDebugBar();
//Добавляем вкадку TEST (Для примера)
$debugbar->addCollector(new \DebugBar\DataCollector\MessagesCollector('TEST'));

//Добавляем вкадку SQL запросов (Для примера)
$debugbar->addCollector(new \DebugBar\DataCollector\PDO\PDOCollector($tracablePdo, null));
$debugbarRenderer = $debugbar->getJavascriptRenderer();

//Пример отправки сообщейний во вкладку TEST
//$debugbar["TEST"]->addMessage("hello world!");
//Пример отправки сообщейний во вкладку Messages
//$debugbar["messages"]->addMessage("hello world!");


?>
<html>
<head>
	<?php echo $debugbarRenderer->renderHead() ?>
</head>
<body>
<div>

</div>

</body>
</html>

<pre>
<?php echo $debugbarRenderer->render() ?>
</pre>
