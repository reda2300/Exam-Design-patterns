<?php

require_once 'utils.php';

class ReportGenerator {
    private $dataSource;

    public function __construct($dataSource) {
        $this->dataSource = $dataSource;
    }

    public function generateReport($options) {
        $data = $this->dataSource->fetchData();
        $report = new Report($options['title'], $options['author'], $data, $options['references'], $options['recipients']);

        switch ($options['format']) {
            case 'JSON':
                $reportContent = $report->toJSON();
                writeToFile('reports/json', "{$report->date}-{$options['title']}.json", $reportContent);
                break;

            case 'CSV':
                $reportContent = $report->toCSV();
                foreach ($reportContent as $type => $content) {
                    writeToFile('reports/csv', "{$report->date}-{$options['title']}_{$type}.csv", $content);
                }
                break;

            default:
                throw new Exception("Format non supporté");
        }

        return $reportContent;
    }
}
