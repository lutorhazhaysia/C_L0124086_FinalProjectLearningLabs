<?php
    include 'database.php';

    // Proses update data
    if(isset($_POST['update'])) {  // Check for 'update' button
        $new_label = $_POST['todos'];
        $task_id = $_GET['id'];

        // Update query
        $q_update = "UPDATE todos SET label = '$new_label' WHERE id = '$task_id'";
        $run_q_update = mysqli_query($conn, $q_update);

        if($run_q_update) {
            header('Location: index.php');  // Redirect back to index
        } else {
            echo "Error updating task";
        }
    }

    // Task to edit
    if (isset($_GET['id'])) {
        $task_id = $_GET['id'];
        $q_select = "SELECT * FROM todos WHERE id = '$task_id'";
        $run_q_select = mysqli_query($conn, $q_select);
        $task = mysqli_fetch_assoc($run_q_select);
    } else {
        // Redirect to index if no id provided
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
        body {
            font-family: "Roboto", sans-serif;
            background: #4568DC;
            background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);
            background: linear-gradient(to right, #B06AB3, #4568DC);
        }
        .container {
            width: 590px;
            height: 100vh;
            margin: 0 auto;
        }
        .header {
            padding: 15px;
            color: #fff;
        }
        .header .title {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
        }
        .header .title i {
            font-size: 24px;
            margin-right: 10px;
        }
        .header .title span {
            font-size: 18px;
        }
        .header .description {
            font-size: 13px;
        }
        .content {
            padding: 15px;
        }
        .card {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .input-control {
            width: 100%;
            display: block;
            padding: 0.5rem;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .text-right {
            text-align: right;
        }
        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            background: #4568DC;
            background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);
            background: linear-gradient(to right, #B06AB3, #4568DC);
            color: #fff;
            border: 1px solid;
            border-radius: 3px;
        }
        @media (max-width: 768px){
            .container {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="header">
            <div class="title">
                <a href="index.php"><i class='bx bx-chevron-left'></i>
                <span>Back</span></a>
            </div>
        </div>

        <div class="content">
            
            <div class="card">
                
                <form action="" method="post">
                    
                    <input type="text" name="todos" class="input-control" value="<?= $task['label'] ?>" required>

                    <div class="text-right">
                        <button type="submit" name="update">Update</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
    
</body>
</html>
