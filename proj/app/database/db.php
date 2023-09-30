<?php
session_start();
require'connect.php';
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

function selectAll($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i===0){
                $sql = $sql . "WHERE $key => $value";
            }
            else{
                $sql = $sql . " AND $key => $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllByOneParamAndMassivValues($table, $parametor, $values){
    global $pdo;
    $sql = "SELECT $parametor FROM $table WHERE Id IN (";
    if(!empty($values) && !empty($parametor)){
        $i=0;

        foreach($values as $key => $value ){
            if($value!==''){
                $value = "'".$value."'";
                if($i===0){
                    $sql = $sql . "$value";
                }
                else{
                    $sql = $sql . ", $value";
                }
            }

            $i++;
        }
        $sql = $sql . ")";
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectOne($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i===0){
                $sql = $sql . " WHERE $key = $value";
            }
            else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();

}

function insert($table, $params){
    global $pdo;
    $i=0;
    $col = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if($i===0){
            $col = $col . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }
        else{
            $col = $col . ", $key";
            $mask = $mask . ", '" ."$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

function update($table, $id, $params){
    global $pdo;
    $i=0;
    $str = '';
    foreach ($params as $key => $value) {
        if($i===0){
            $str = $str . $key . " = '" .$value . "'";
        }
        else{
            $str = $str. ", " . $key . " = '" .$value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

/*
tt(selectAll('projects'));
update('projects', 1, $param);

tt(selectAll('projects'));
delete('projects',3);
tt(selectAll('projects'));*/