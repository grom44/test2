<?php

namespace App\Service;

use Symfony\Component\Finder\Finder;

class CsvParser
{
    private $finder;

    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    public function parseCsv(string $fileName): array
    {
        $this->finder->files()
            ->in('src/Resources')
            ->name($fileName)
        ;

        $csv = null; 
        foreach ($this->finder as $file) { $csv = $file; }

        $rows = array();
        if (($csv && $handle = fopen($csv->getRealPath(), "r")) !== FALSE) {
            $i = 0;
            while (($data = fgetcsv($handle, null, ";")) !== FALSE) {
                $i++;
                if ($i == 1) { continue; }
                $rows[] = $data;
            }
            fclose($handle);
        }

        return $rows;
    }

}