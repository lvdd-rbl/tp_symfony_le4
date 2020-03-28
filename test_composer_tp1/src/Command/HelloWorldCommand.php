<?php
namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command {
    protected static $defaultName = 'hello:world';

    protected function configure()
    {
        $this
            ->setDescription("Prints Hello World!")
            ->addArgument('name',  InputArgument::OPTIONAL, 'The name of the person you want',
                'World')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln("Hello $name!");

        return 0;
    }
}