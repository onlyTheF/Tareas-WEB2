<?php
    require 'dbutil.php';
    require 'professor.php';

    /** La clase professorDao, en aqui insertamos las operaciones para ser llamadas para el modificado y lectura de datos */

    class professorDao {
        private $pdo;

        public function __construct() {
            $this->pdo = DBUtil::getConnection();
        }

        /** findProfessor--> nos permite retornar todos los datos de los profesors registrados en la bdd */
        public function findProfessor() {
            $result = $this->pdo->query("SELECT id, first_name, last_name, city, salary, years_experience  FROM professor");
            $professors = [];

            while ($row = $result->fetch()) {
                array_push($professors, new Professor(
                    $row['first_name'],
                    $row['last_name'],
                    $row['city'],
                    $row['salary'],
                    $row['years_experience'],
                    $row['id']
                ));
            }

            return $professors;
        }
        /** findProfessorById--> nos permite retornar los datos del profesor seleccionado atraves del parametro pedido "$id" */
        public function findProfessorById($id) {
            $stmt = $this->pdo->prepare("SELECT id, first_name, last_name, city, salary, years_experience FROM professor WHERE id = :id");
            $stmt->execute(['id' => $id]);

            if ($row = $stmt->fetch()) {
                $professors = new Professor(
                    $row['first_name'],
                    $row['last_name'],
                    $row['city'],
                    $row['salary'],
                    $row['years_experience'],
                    $row['id']
                );

                return $professors;
            }

            return null;
        }

        /** Insert--> Registra los datos del nuevo profesor, los parametros que se pide seria "$professors" donde se almacena todos los datos del nuevo profesor */
        public function Insert($professors) {
            try {
                $sql = "INSERT INTO professor(first_name, last_name, city, salary, years_experience)" .
                       "VALUES (:firstName, :lastName, :city, :salary, :years_experience)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    'firstName' => $professors->getFirstName(),
                    'lastName' => $professors->getLastName(),
                    'city' => $professors->getCity(),
                    'salary' => $professors->getsalary(),
                    'years_experience' => $professors->getyears_experience()
                ]);

                return 1;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }

            return 0;
        }
        
        /** update--> Se actualiza los datos del profesor Seleccionado, los parametros que se pide seria "$professors" donde se almacena todos los datos a actulizar*/
        public function update($professors) {
            try {
                $sql = "UPDATE professor SET first_name=:firstName, last_name=:lastName, city=:city, salary=:salary, years_experience=:years_experience" .
                       "WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    'firstName' => $professors->getFirstName(),
                    'lastName' => $professors->getLastName(),
                    'city' => $professors->getCity(),
                    'salary' => $professors->getsalary(),
                    'years_experience' => $professors->getyears_experience(),
                    'id' => $professors->getId()
                ]);

                return 1;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }

            return 0;
        }

        /** delete--> Se elimina los datos del profesor Seleccionado, los parametros que se pide seria "$id" el cual seria el id del profesor a eliminar*/
        public function delete($id) {
            try {
                $sql = "DELETE FROM professor WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    'id' => $id
                ]);

                return 1;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }

            return 0;
        }
    }