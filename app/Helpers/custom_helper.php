<?php
function userLogin(){
    $db = \Config\Database::connect();
    return $db->table('user2')->where('user_id', session('user_id'))->get()->getRow(); 
}
?>