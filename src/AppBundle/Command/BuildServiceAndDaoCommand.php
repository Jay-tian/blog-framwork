<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class BuildServiceAndDaoCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('BuildServiceAndDao')
            ->setDescription('快速创建Service，Dao')
            ->addArgument('name', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $biz = $this->getBiz();
        $argument = $input->getArgument('name');
        $output->writeln('开始创建');
        $rootDir = $biz['root_directory'];
        $output->writeln('创建成功');
    }
}
