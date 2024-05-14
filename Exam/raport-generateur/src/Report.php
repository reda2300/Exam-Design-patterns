<?php

class Report {
    private $title;
    private $author;
    private $date;
    private $data;
    private $references;
    private $recipients;

    public function __construct($title, $author, $data, $references = [], $recipients = []) {
        $this->title = $title;
        $this->author = $author;
        $this->date = date('Ymd_His');
        $this->data = $data;
        $this->references = $references;
        $this->recipients = $recipients;
    }

    public function toJSON() {
        return json_encode([
            'title' => $this->title,
            'author' => $this->author,
            'date' => $this->date,
            'data' => $this->data,
            'references' => $this->references,
            'recipients' => $this->recipients
        ], JSON_PRETTY_PRINT);
    }

    public function toCSV() {
        $dataCsv = "Data\n";
        foreach ($this->data as $row) {
            $dataCsv .= implode(',', $row) . "\n";
        }
        
        $referencesCsv = "References\n";
        foreach ($this->references as $reference) {
            $referencesCsv .= $reference . "\n";
        }

        $recipientsCsv = "Recipients\n";
        foreach ($this->recipients as $recipient) {
            $recipientsCsv .= $recipient . "\n";
        }

        $metaCsv = "Meta\nTitle,{$this->title}\nAuthor,{$this->author}\nDate,{$this->date}\n";

        return [
            'meta' => $metaCsv,
            'data' => $dataCsv,
            'references' => $referencesCsv,
            'recipients' => $recipientsCsv
        ];
    }
}
