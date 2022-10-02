<?php
require_once "config.php";

$first_name = $last_name = $userId ="";
$title_error = $text_error = $userId_error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = trim($_POST["userId"]);
    if (empty($userId)) {
        $userId_error = "Title is required.";
    }  else {
        $userId = $userId;
    }

    $title = trim($_POST["title"]);
    if (empty($title)) {
        $title_error = "Title is required.";
    } else {
        $title = $title;
    }

    $text = trim($_POST["text"]);

    if (empty($text)) {
        $text_error = "Text is required.";
    } else {
        $text = $text;
    }


    if (empty($title_error_err) && empty($text_error) ) {
        $sql = "INSERT INTO `notes` (`user_id`,`title`,`text`) VALUES ('$userId','$title', '$text')";

        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Note</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Note</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group <?php echo (!empty($userId_error)) ? 'has-error' : ''; ?>">
                        <label>User Id</label>
                        <input type="text" name="userId" class="form-control" value="">
                        <span class="help-block"><?php echo $userId_error;?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($title_error)) ? 'has-error' : ''; ?>">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="">
                        <span class="help-block"><?php echo $title_error;?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($text_error)) ? 'has-error' : ''; ?>">
                        <label>Text</label>
                        <input type="text" name="text" class="form-control" value="">
                        <span class="help-block"><?php echo $text_error;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>