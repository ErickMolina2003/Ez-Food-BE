<?php

    class Admin{

        public static function obtenerAdmins(){
            $todosAdmins = file_get_contents('../data/admins.json');

            echo $todosAdmins;
        } 

    }
