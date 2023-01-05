<?php

include("conn.php");

function product_add() {
    global $db;
    if($_POST){
        $title = $_POST["title"];
        $price = $_POST["price"];
        $body = $_POST["body"];

        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

        $query = $db->prepare("INSERT INTO product (title, price, quantity, body) VALUES (:title, :price, 1, :body)");
        try {
            $query->execute(array(
                "title" => $title,
                "price" => number_format((float)$price, 2, '.', ''),
                "body" => $body,
            ));
            return $query;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    return null;
}
function product_update() {
    global $db;
    if($_POST){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $price = $_POST["price"];
        $body = $_POST["body"];

        $query = $db->prepare("UPDATE product SET title=:title, price=:price, body=:body WHERE id=:id");

        try {
            $res = $query->execute(array(
                "title" => $title,
                "price" => $price,
                "body" => $body,
                "id" => $id,
            ));
            return $res;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    return null;
}
function product_delete() {
    global $db;
    if($_POST){
        $id = $_POST["id"];
        $query = $db->prepare("DELETE FROM product WHERE id=:id");

        try {
            $delete = $query->execute(array(
                "id" => $id,
            ));
            return $delete;
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    return null;
}
function product_read() {
    global $db;
    $id = $_POST["id"];
    $query = $db->prepare("SELECT * FROM product WHERE id=? LIMIT 1");
    try {
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    return null;
}

function product_read_all() {
    global $db;
    $query = $db->query("SELECT * FROM product ORDER BY id desc");

    try {
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    return null;
}

function is_autheniticated(){
    session_start();
    return isset($_SESSION["is_authenticated"])?true:false;
}

if(isset($_POST["type"]) && $_POST["type"] == "product") {
    header("Content-Type: application/json");
    if (isset($_POST["action"])) {
        if($_POST["action"] == "delete") {
            $result = product_delete();
            if ($result) {
                echo '{"status": "OK", "msg": "Item has been deleted successfully"}';
            } else {
                echo '{"status": "ERROR", "msg": "An error occured"}';
            }
        } else if($_POST["action"] == "read") {
            $result = product_read();
            if ($result) {
                echo json_encode($result);
            } else {
                echo '{"status": "ERROR", "msg": "An error occured"}';
            }
        } else if($_POST["action"] == "add") {
            $result = product_add();
            if ($result) {
                echo json_encode($result);
            } else {
                echo '{"status": "ERROR", "msg": "An error occured"}';
            }
        } else if($_POST["action"] == "update") {
            $result = product_update();
            if ($result) {
                echo json_encode($result);
            } else {
                echo '{"status": "ERROR", "msg": "An error occured"}';
            }
        } else {
            echo '{"status": "ERROR", "msg": "An error occured, action unknown!"}';
        }
    } else {
        echo '{"status": "ERROR", "msg": "An error occured, action unsetted!"}';
    }
}