<?php

const DB_HOST = 'db';
const DB_USER = 'root';
const DB_PASSWORD = 'helloworld';
const DB_NAME = 'w';
const AD_TABLE_NAME = 'ad';

function connectToDatabase()
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (mysqli_connect_errno()) {
        throw new Exception('Can not connect to MySQL server. Error code: ' . mysqli_connect_error());
    }

    return $mysqli;
}

function insertAd($email, $title, $description, $category)
{
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("INSERT INTO " . AD_TABLE_NAME . " (email, title, description, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $email, $title, $description, $category);
    $stmt->execute();

    if ($stmt->errno) {
        throw new Exception('Can not insert ad into database. Error code: ' . $stmt->errno);
    }

    $stmt->close();
    $mysqli->close();
}

function getAds()
{
    $mysqli = connectToDatabase();

    $result = $mysqli->query("SELECT * FROM " . AD_TABLE_NAME . " ORDER BY created DESC");

    if (!$result) {
        throw new Exception('Can not get ads from database. Error code: ' . $mysqli->errno);
    }

    $ads = [];

    while ($row = $result->fetch_assoc()) {
        $ads[] = [
            'category' => $row['category'],
            'title' => $row['title'],
            'description' => $row['description'],
            'email' => $row['email'],
        ];
    }

    $result->close();
    $mysqli->close();

    return $ads;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['category'])) {
        $email = $_POST['email'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        try {
            insertAd($email, $title, $description, $category);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

try {
    $ads = getAds();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
