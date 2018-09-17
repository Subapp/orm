<?php

use Subapp\Orm\Subapp\OrmORM;
use Subapp\Orm\Generator\Application;
use Symfony\Component\Console\Command\Command;

include_once __DIR__ . '/../vendor/autoload.php';

$application = new Application('Subapp\OrmORM', Subapp\OrmORM::versionName());

$iterator = new DirectoryIterator(sprintf('glob://%s/../src/Subapp\Orm/Generator/Commands/*.php', __DIR__));
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

