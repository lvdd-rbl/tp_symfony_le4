<?php

require __DIR__.'/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Console\Application;
use App\Command\HelloWorldCommand;

$application = new Application();

// ... register commands
$application->add(new HelloWorldCommand());

$log = new Logger('lucas writes a log');

$log->pushHandler(new StreamHandler('logs/console.log', Logger::WARNING));
$log->warning('Avertissement');
$log->pushHandler(new StreamHandler('logs/console.log', Logger::ERROR));
$log->error('Erreur');

$application->run();



