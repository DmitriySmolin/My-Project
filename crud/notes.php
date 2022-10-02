<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
            <h2 class="text-center">Notes</h2>
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Notes</h2>
                    <div style="display: flex;flex-direction: column;align-items:end;gap: 10px;">
                        <a href="create_note.php" class="btn btn-success pull-right">Add New Note</a>
                    </div>
                </div>
                <?php
                // Include config file
                require_once "config.php";

                // select all users
                $data = "SELECT * FROM notes,users WHERE notes.user_id = users.id";
                if ($notes = mysqli_query($conn, $data)) {
                    if (mysqli_num_rows($notes) > 0) {
                        echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Email</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                        while ($note = mysqli_fetch_array($notes)) {
                            echo "<tr>
                                            <td>" . $note['id'] . "</td>
                                            <td>" . $note['title'] . "</td>
                                            <td>" . $note['text'] . "</td>
                                            <td>
                                              <a href='read.php?id=" . $note['id'] . "' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=" . $note['id'] . "' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=" . $note['id'] . "' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                        }
                        echo "</tbody>
                                </table>";
                        mysqli_free_result($notes);
                    } else {
                        echo "<p class='lead'><em>No records found.</em></p>";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>