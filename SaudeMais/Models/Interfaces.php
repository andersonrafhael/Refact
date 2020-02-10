<?php

require_once "Connection.php";

interface Interfaces {
    function db_save();
    function db_delete($attribute);
    function db_update($usr_cod);
    function find_user_data($attribute);
}