<?php
    require 'person.php';

    class professor extends Person implements JsonSerializable {
        private $years_experience;
        private $salary;

        //v aqui creamos el constructor del la clase professor que hereda/extiende atributos de la clase person.php
        // en este caso agramos los atributos years_experience y salary

        public function __construct($firstName, $lastName, $city, $years_experience, $salary,  $id = null) {
            parent::__construct($id, $firstName, $lastName, $city);
            $this->years_experience = $years_experience;
            $this->salary = $salary;
        }

        // Luego agregamos el get/set para salary y years_experience

        public function getsalary() {
            return $this->salary;
        }

        public function setmoredata($salary) {
            $this->salary = $salary;
        }

        public function getyears_experience() {
            return $this->years_experience;
        }

        public function setyears_experience($years_experience) {
            $this->years_experience = $years_experience;
        }

        public function jsonSerialize() {
            return [
                'id' => $this->id,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'city' => $this->city,
                'salary' => $this->salary,
                'years_experience' => $this->years_experience
            ];
        }
    }