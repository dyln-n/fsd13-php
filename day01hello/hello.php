<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function printForm($nameVal = "", $ageVal = "")
    {
        $form = <<< END
<form>
    Name: <input type="text" name="name" value="$nameVal"><br>
    Age: <input type="number" name="age" value="$ageVal"><br>
    <input type="submit" value="Say hello">
</form>
END;
        echo $form;
    }

    if (isset($_GET["name"])) {
        $name = $_GET["name"];
        $age = $_GET["age"];
        $errorList = [];

        // Name must be 2-20 characters long
        if (strlen($name) < 2 || strlen($name) > 20) {
            $errorList[] = "Name must be 2-20 characters long";
        }

        // Age must be an integer between 1-150
        if (!is_numeric($age) || $age < 1 || $age > 150) {
            $errorList[] = "Age must be 1-150";
        }

        if ($errorList) {
            echo "<p>Submission failed, errors found:</p>\n";
            echo "<ul>\n";
            foreach ($errorList as $error) {
                echo "<li>$error</li>\n";
            }
            echo "</ul>\n";
            printForm($name, $age);
        } else {
            echo "<p>Hi $name, you are $age y/o. Nice to meet you.</p>";
        }
    } else {
        printForm();
    }
    ?>

</body>

</html>