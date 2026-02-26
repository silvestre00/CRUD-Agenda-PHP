<?php

require_once 'Pessoa.php';

class DataManager {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function getAll() {
        $json = file_get_contents($this->filePath);
        // error_log("File path: " . $this->filePath);
        // error_log("JSON content: " . $json);
        return json_decode($json, true) ?: [];
    }

    public function save($data) {
        $allData = $this->getAll();
        $found = false;

        foreach ($allData as $key => $item) {
            if ($item['id'] === $data['id']) {
                $allData[$key] = $data;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $allData[] = $data;
        }

        file_put_contents($this->filePath, json_encode($allData, JSON_PRETTY_PRINT));
        return true;
    }

    public function delete($id) {
        $allData = $this->getAll();
        $newData = array_filter($allData, function($item) use ($id) {
            return $item['id'] !== $id;
        });

        file_put_contents($this->filePath, json_encode(array_values($newData), JSON_PRETTY_PRINT));
        return true;
    }

    public function getById($id) {
        $allData = $this->getAll();
        foreach ($allData as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
}
