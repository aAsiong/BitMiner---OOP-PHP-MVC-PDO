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
    <title>BitMiner Login</title>
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

        .frm-Cntnr span:first-child { margin-bottom: 10px; font-size: 30px; font-weight: bold; letter-spacing: 3px;}
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
    .vld-div { color: green; }
</style>
<body>
    <header></header>

    <main>
        <form method="POST" class="frm-Cntnr"
        action="./includes/login.includes.php">
            <span>BitMiner Login</span>
            <div id="dvMsg">

            </div>
            <section>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $unameErr ?>
                    </div>
                    <input type="text" name="username" placeholder="username">
                    <span>Username</span>
                </div>
                <div class="form-control">
                    <div class="invld-div">
                        <?php echo $pwdErr ?>
                    </div>
                    <input type="text" name="password" placeholder="password">
                    <span>Password</span>
                </div>
            </section>
            <section class="bttn-Cntnr">
                <button type="submit" name="submit">Submit</button>
                <button><a href="./register.php">Sign Up</a></button>
            </section>
        </form>
    </main>

    <footer></footer>
</body>
<script>
    // Get URL Params
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var getKeys = urlParams.keys();
    var keyArray = [];

    for (var gotKey of getKeys)
        keyArray.push(gotKey);
    
    let dvMsg = '';
    if (keyArray.includes('err')) {
        dvMsg = keyArray[keyArray.indexOf("err") + 1];
        document.getElementById("dvMsg").className = "invld-div";
        document.getElementById("dvMsg").innerHTML = dvMsg.replace("_", / /g);
    } else if (keyArray.includes('scc')) {
        dvMsg = keyArray[keyArray.indexOf("scc") + 1];
        document.getElementById("dvMsg").className = "vld-div";
        document.getElementById("dvMsg").innerHTML = dvMsg.replace("_", / /g);
    }
</script>
</html>