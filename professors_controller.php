<?php
    header("Content-Type: application/json");

    require 'professorDao.php';
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $professorDao = new professorDao();

    switch ($requestMethod) {
        /** Aqui realizamos el llamado de las operaciones
         * en el caso del llamado GET, en este si obtiene una id, llamaria ala funcion findProfessorById, y si no recibie el parametro id entonces llama a la funcionfindProfessor
         */
        case 'GET':
            if (empty($_GET['id'])) {
                echo json_encode($professorDao->findProfessor());
            } else {
                echo json_encode($professorDao->findProfessorById($_GET['id']));
            }
            break;
        case 'POST':
            /** En el caso del llamado POST llamamos a la funcion de Insert para poder insertar un nuevo profesor con datos nuevos */
            $jsonProfessor = json_decode(file_get_contents("php://input"), true);
            $professor = new professor(
                $jsonProfessor['firstName'],
                $jsonProfessor['lastName'],
                $jsonProfessor['city'],
                $jsonProfessor['salary'],
                $jsonProfessor['years_experience']
            );
            echo json_encode(['result' => $professorDao->Insert($professor)]);
            break;
        case 'PUT':
            /** En el caso del llamado PUT llamamos a la funcion de update para poder Actualizar al profesor con la seleccion de datos a actulizar */
            $jsonProfessor = json_decode(file_get_contents("php://input"), true);
            $professor = new professor(
                $jsonProfessor['firstName'],
                $jsonProfessor['lastName'],
                $jsonProfessor['city'],
                $jsonProfessor['salary'],
                $jsonProfessor['years_experience'],
                $jsonProfessor['id']
            );
            echo json_encode(['result' => $professorDao->update($professor)]);
            break;
        case 'DELETE':
            /** En el caso del llamado de DELETE llamamos a la funcion de delete para Eliminar un profesor con sus datos correspondientes con el parametro de id insertado*/
            $query = $_SERVER['QUERY_STRING'];
            list($key, $value) = explode('=', $query);
            echo json_encode(['result' => $professorDao->delete($value)]);
            break;
    }