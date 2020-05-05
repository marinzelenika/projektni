<?php

class Employer{

    public static function find_all_employees(){

        global $database;
        $result_set = $database->query('SELECT * FROM employees LIMIT 30');
        return $result_set;

    }









}