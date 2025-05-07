<?php
trait Logger {
    protected function log(string $message): void {
        $date = date('Y-m-d H:i:s');
        $line = "[{$date}] {$message}\n";
        file_put_contents(__DIR__ . '/../logs/app.log', $line, FILE_APPEND);
    }
}