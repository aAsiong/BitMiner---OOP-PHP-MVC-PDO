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
    <title>BitMiner Dashboard</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body { height: 100vh; background: linear-gradient(0deg, rgba(255,225,143,1) -20%, rgba(201,100,237,1) 100%); }

    header { margin: 20px; }
    .ttl-Cntr {
        width: 100%;
        height: 150px;
        padding: 10px 20px;
        position: relative;
        background-color: dimgray;
    }
        .ttl-Cntr img { background-color: white; }
        .ttl-Cntr div { display: inline-block; }
            .ttl-Cntr div span { font-size: 30px; }
            .ttl-Cntr div p { font-style: italic; font-weight: bold; color: white; }

    main {
        min-height: 500px;
        margin: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .smpl-crd {
        flex: 40%;
        width: 300px;
        height: 250px;
        padding: 20px;
        text-align: center;
        background-color: white;
        border-radius: 30px;
    }
        .smpl-crd { font-size: 30px; }

    .dtls { width: 100%; border-top: 3px solid black; }
        .dtls h5 { font-size: 20px; }
        .dtls h4 { margin-top: 20px;}
    
    #lgOut {
        width: 70px;
        height: 50px;
        position: absolute;
        top: 10px;
        right: 10px;
        outline-style: solid;
        outline-color: red;
        background-color: lightgray;
    }

        #lgOut:hover { outline-style: none; border: 1px solid crimson; background-color: crimson; cursor: pointer; }
</style>
<body>
    <header>
        <nav class="ttl-Cntr">
            <img src="./images/bit-miner.png" width="150px" height="100%"/>
            <div>
                <span>BitMiner</span>
                <p>Made by Jonas and Eldrin</p>
            </div>

            <button id="lgOut">Logout</button>
        </nav>
    </header>

    <main>
        <?php foreach($dtArray as $record): ?>
        <div class="smpl-crd">
            <?php echo $record['wmosName']; ?>
            <div class="dtls">
                <h5><?php echo $record['wmosID'] ?></h5>
                <h4><?php echo $record['dt_mine'] ?></h4>
                <h5>Data Mined</h5>
            </div>
        </div>
        <?php endforeach; ?>
    </main>
</body>
<script>
    document.getElementById('lgOut').addEventListener('click', lgOut);
    function lgOut() {
        <?php 
            session_unset();
            session_destroy();
        ?>
        window.location.href = './index.php?scc=Logout_Successful';
    }
</script>
</html>