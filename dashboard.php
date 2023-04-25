<?php

//require '../btminer-mvc/includes/autoloader.inc.php';
session_start();
$_SESSION['id'] = "45231";
include './includes/dashboard.includes.php';

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

    .on { display: unset; }
    .off { display: none; }

    .smpl-crd {
        flex: 40%;
        width: 300px;
        height: fit-content;
        min-height: 250px;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        background-color: white;
        border-radius: 30px;
    }
        .smpl-crd h5:nth-child(3) { margin: 0 auto; width: max-content; border-top: 3px solid black; }
        
        .smpl-crd button:nth-child(1),
        .smpl-crd button:nth-child(2) { outline-style: solid; }

        .smpl-crd button:nth-child(1) { outline-color: red; background-color: lightgray; }
            .smpl-crd button:nth-child(1):hover { 
                outline-style: none;
                border: 3px solid crimson; 
                background-color: crimson;
                cursor: pointer;
            }

        .smpl-crd button:nth-child(2) { outline-color: green; background-color: lightgray; }
            .smpl-crd button:nth-child(2):hover {
                    outline-style: none;
                    border: 3px solid greenyellow; 
                    background-color: greenyellow;
                    cursor: pointer;
                }

        .smpl-crd button:nth-child(3) { color: black; outline-color: black; outline-style: solid; background-color: lightgray; }
            .smpl-crd button:nth-child(3):hover {
                outline-style: none;
                color: white;
                border: 3px solid dimgray;
                background-color: dimgray;
                cursor: pointer;
            }

    .dtls { width: 100%; border-top: 3px solid black; }
        .dtls h5 { font-size: 20px; }
        .dtls h4 { margin-top: 20px;}
    
    #lgOut, button { width: 110px; height: 40px; }
    #lgOut {
        width: 70px;
        position: absolute;
        top: 10px;
        right: 10px;
        outline-style: solid;
        outline-color: red;
        background-color: lightgray;
    }

        #lgOut:hover { outline-style: none; border: 1px solid crimson; background-color: crimson; cursor: pointer; }
</style>
<script>
    let parent;
    let child;
    function evntRun(e) {
        parent = document.getElementById(e.target.closest('section').id);
        switch (this.id) {
            case "offMchn":
                child = parent.querySelector("#onMchn");
                child.className = "on";
                child = parent.querySelector("#" + this.id);
                child.className = "off";

                child = document.getElementById("stId" + this.id)
                break;

            case "onMchn":
                child = parent.querySelector("#offMchn");
                child.className = "on";
                child = parent.querySelector("#" + this.id);
                child.className = "off";
                break;

            case "accsTmps":
                window.location.href = './mchnPge.php?sample=' + parent.id;
                break;

            default:
                break;
        }
    }
</script>
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
        <?php foreach($dtArray as $record): 
            $stId = $record['wmosID'] ?>
        <div class="smpl-crd">
            <?php echo $record['wmosName']; ?>
            <div class="dtls">
                <h5><?php echo $record['wmosID'] ?></h5>
                <h4 id="stId-<?php echo $stId  ?>"><?php echo $record['dt_mine'] ?></h4>
                <h5>Data Mined</h5>
            </div>
            <section id="<?php echo $record['wmosID'] ?>">
                <button id="offMchn" class="off">Toggle Machine</button>
                <button id="onMchn">Toggle Machine</button>
                <button id="accsTmps">Machine Temps</button>
                <script>
                    parent = document.getElementById("<?php echo $record['wmosID'] ?>")
                    parent.querySelector("#offMchn").addEventListener('click', evntRun);
                    parent.querySelector("#onMchn").addEventListener('click', evntRun);
                    parent.querySelector("#accsTmps").addEventListener('click', evntRun);
                </script>
            </section>
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