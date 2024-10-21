<?php
session_start();
include('../common/db.php');
if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    try {
        // Prepare an SQL statement with placeholders
        $user = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES (?, ?, ?, ?)");

        // Bind the parameters to the SQL query
        $user->bind_param("ssss", $username, $email, $password, $address);

        // Execute the query
        $result = $user->execute();

        if ($result) {
            echo "success";
            $_SESSION["user"] = ["username" => $username, "email" => $email, "password" => $password, "address" => $address, "user_id" => $user->insert_id];

            header("location:/discuss");
        } else {
            echo "New user not registered";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        foreach ($result as $row) {
            $_SESSION["user"] = ["username" => $row["username"], "email" => $row["email"], "password" => $row["password"], "address" => $row["address"], "user_id" => $row["id"]];
        }
        header("location:/discuss");
    } else {
        echo "Invalid email or password";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("location:/discuss");
} else if (isset($_POST['ask'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    try {
        // Prepare an SQL statement with placeholders
        $question = $conn->prepare("INSERT INTO `questions` (`title`, `description`, category_id, user_id) VALUES (?, ?, ?, ?)");

        // Bind the parameters to the SQL query
        $question->bind_param("ssii", $title, $description, $category_id, $user_id);

        // Execute the query
        $result = $question->execute();

        if ($result) {
            header("location:/discuss");
        } else {
            echo "New question not added";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    try {
        // Prepare an SQL statement with placeholders
        $query = $conn->prepare("INSERT INTO `answers` (`answer`, question_id, user_id) VALUES (?, ?, ?)");

        // Bind the parameters to the SQL query
        $query->bind_param("sii", $answer, $question_id, $user_id);

        // Execute the query
        $result = $query->execute();

        if ($result) {
            header("location:/discuss/?q-id=$question_id");
        } else {
            echo "answer not added";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else if (isset($_GET['delete'])) {
    $user_id = $_SESSION['user']['user_id'];
    $question_id = $_GET['delete'];

    $query = "DELETE FROM questions WHERE user_id = '$user_id' AND id = '$question_id'";
    $result = $conn->query($query);

    if ($result) {
        header("location:/discuss");
    } else {
        echo "Question not deleted";
    }
}
