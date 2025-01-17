<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $activity = $_POST['activity'];
    $taller = $_POST['taller'];

    try {
        $pdo = new PDO('sqlite:survey.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO survey_results (name, class, activity, taller) VALUES (:name, :class, :activity, :taller)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':activity', $activity);
        $stmt->bindParam(':taller', $taller);

        $stmt->execute();
        echo "Survey submitted successfully!";
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') { // Unique constraint failed
            echo "You have already submitted the survey for this taller.";
        } else {
            echo "An error occurred: " . $e->getMessage();
        }
    }
}
?>