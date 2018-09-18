<?php

use Subapp\Orm\Orm;
use Subapp\Orm\Generator\Application;
use Symfony\Component\Console\Command\Command;

include_once __DIR__ . '/../vendor/autoload.php';

$application = new Application('subapp-orm', Orm::versionName());

$iterator = new DirectoryIterator(sprintf('glob://%s/../src/Generator/Commands/*.php', __DIR__));
$namespace = '\\Subapp\Orm\\Generator\\Commands\\';

foreach ($iterator as $file) {
  $class = sprintf('%s%s', $namespace, $file->getBasename('.php'));
  $reflection = new ReflectionClass($class);

  if(false === $reflection->isAbstract() && $reflection->isSubclassOf(Command::class)) {
    /** @var Command $command */
    $command = $reflection->newInstance();
    $application->add($command);
  }
}

$application->run();

