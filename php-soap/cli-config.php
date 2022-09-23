<?php  

use Doctrine\ORM\Tools\Console\ConsoleRunner;

//$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->safeLoad();
//$dotenv->load();
$dotenv->required([
    'DATABASE_HOST',
    'DATABASE_NAME',
    'DATABASE_USER',
    'DATABASE_PASSWD',
    'DATABASE_DRIVER'
]);

require_once __DIR__ . '/bootstrap.php';

$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);