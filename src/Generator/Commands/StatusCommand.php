<?php

namespace Subapp\Orm\Generator\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class StatusCommand
 * @package Subapp\Orm\Generator\Commands
 */
class StatusCommand extends AbstractCommand
{
    
    /**
     *
     */
    protected function configure()
    {
        parent::configure();
        
        $this
            ->setName('app:status')->setAliases(['status'])
            ->setDescription('Check application status for currently directory');
    }
    
    
    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Application not initialized yet.</comment>');
        $output->writeln('For initialization run <info>app:init</info>');
    }
    
}