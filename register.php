<?php

//require '../btminer-mvc/includes/autoloader.inc.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BitMiner Sign Up</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    
    header, footer {
        width: 100%;
        height: 100px;
        background-color: black;
    }

    main { padding: 20px 0; height: fit-content; }
    .frm-Cntnr {
        width: 500px;
        min-height: 500px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
        background-color: wheat;
    }

        .frm-Cntnr span:first-child { margin-bottom: 30px; font-size: 30px; font-weight: bold; letter-spacing: 3px;}
        .frm-Cntnr button { width: 100px; height: 40px; }

    .form-control {
        margin-bottom: 30px; 
        display: flex;
        align-items: center;
        flex-direction: column;
    }
        .form-control:nth-child(3) { margin-bottom: 20px;}
        .form-control input { width: 200px; height: 30px; padding: 5px; }

    .invld-div { color: red; }
</style>
<body>
    <header></header>

    <main>
        <form method="POST" class="frm-Cntnr"
        action="./includes/register.includes.php">
            <span>BitMiner Register User</span>
            <section>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $unameErr ?>
                    </div>
                    <input type="text" name="username" placeholder="Enter Username">
                    <span>Enter Username</span>
                </div>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $pwdErr ?>
                    </div>
                    <input type="text" name="password" placeholder="Enter Password">
                    <span>Enter Password</span>
                </div>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $rePwdErr ?>
                    </div>
                    <input type="text" name="rpassword" placeholder="Re-Enter Password">
                    <span>Re-Enter Password</span>
                </div>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $wMosIDErr ?>
                    </div>
                    <input type="text" name="wemosID" placeholder="Enter WeMos ID">
                    <span>WeMos ID</span>
                </div>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $wMosNameErr ?>
                    </div>
                    <input type="text" name="wemosName" placeholder="Enter WeMos Name">
                    <span>WeMos Name</span>
                </div>
            </section>
            <button type="submit" name="submit">Submit</button>
        </form>
    </main>

    <footer></footer>
</body>
</html>