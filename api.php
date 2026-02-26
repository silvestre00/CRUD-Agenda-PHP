<?php

header('Content-Type: application/json');
require_once 'classes/DataManager.php';

$dataManager = new DataManager(__DIR__ . '/data.json');
$action = $_GET['action'] ?? '';
// error_log("Action: " . $action);

switch ($action) {
    case 'list':
        echo json_encode($dataManager->getAll());
        break;

    case 'save':
        $input = json_decode(file_get_contents('php://input'), true);
        if ($input) {
            $pessoa = new Pessoa($input);
            $dataManager->save($pessoa->toArray());
            echo json_encode(['status' => 'success', 'message' => 'Dados salvos com sucesso!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dados inválidos!']);
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? '';
        if ($id) {
            $dataManager->delete($id);
            echo json_encode(['status' => 'success', 'message' => 'Registro excluído com sucesso!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID não fornecido!']);
        }
        break;

    case 'get':
        $id = $_GET['id'] ?? '';
        if ($id) {
            $data = $dataManager->getById($id);
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID não fornecido!']);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Ação inválida!']);
        break;
}
