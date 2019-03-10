<?php

use Subapp\Orm\Common\Configuration;

include_once __DIR__ . '/../vendor/autoload.php';

$configuration = Configuration::createFromFile(__DIR__ . '/config/Orm.php');

\Subapp\Orm\Orm::initialize($configuration);

$repository = new \IdPorn\Dbl\StarRepository();

$star = $repository->findOneById(2);

$star->setName("MissAlice18!");

$star->setCreatedAt(new DateTime());

$repository->persist($star);

$miss = new \IdPorn\Dbl\Star();

$miss->setName('Alice18 #' . rand(1, 1000));
$miss->setCreatedAt(new DateTime());

$repository->persist($miss);

$repository->remove($miss);

var_dump($star, $miss);
