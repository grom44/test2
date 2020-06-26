<?php

namespace App\Command;

use App\Service\CsvParser;
use App\Service\UserImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ImportUserCommand extends Command
{
    private $csvParser;
    private $ui;
    protected static $defaultName = 'crud:import_users';

    public function __construct(CsvParser $csvParser, UserImporter $ui)
    {
        $this->csvParser = $csvParser;
        $this->ui = $ui;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('Import users')
        ->setDescription('Import users from csv file to user table')
        ->addArgument('filename', InputArgument::REQUIRED, 'The filename in Resource directory.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileName = $input->getArgument('filename');
        $parsedData = $this->csvParser->parseCsv($fileName);

        foreach ($parsedData as $data) {
            $info = $this->ui->importUser($data[0]);
            $output->writeln($info);
        }
        
        return Command::SUCCESS;
    }

    

}