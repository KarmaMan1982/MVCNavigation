            <?php
                $_SESSION['displayNewRow'] = false;
                require_once('./scripts/getZyklus.php');
                #echo $ZyklusObject->outputHTML();
                require_once('./scripts/getZyklusCollection.php');
                #$ZyklusCollection->printNames();
                require_once('./lib/globalFunctions.php');
            ?>
            <!--
            <div id="ActiveProgressName">&nbsp;</div>
            -->
            <?php
                $testFile = 'output.json';
                if(isset($_REQUEST)){
                    #var_dump($_REQUEST['btEditorAction']);
                    if(isset($_REQUEST['btEditorAction']) && $_REQUEST['btEditorAction'] == loadString('pageZyklusEditorBTEditorActionDelete')){
                        #var_dump($_REQUEST["sbDeleteZyklus"]);
                        #var_dump($_REQUEST);
                        $elementID = 0;
                        $deleteID = null;
                        foreach($_REQUEST['ZyklusField'] AS $ZyklusElement){
                            #var_dump($ZyklusElement['ZyklusName']);
                            if($_REQUEST["sbDeleteZyklus"] == $ZyklusElement['ZyklusName']){ $deleteID = $elementID; }
                            $elementID++;
                        }
                        #var_dump($_REQUEST['ZyklusField'][$deleteID]);
                        unset($_REQUEST['ZyklusField'][$deleteID]);
                        file_put_contents($testFile, json_encode($_REQUEST));
                    }
                    if(isset($_REQUEST['CollectionName']) && isset($_REQUEST['ZyklusField']) && $_REQUEST['btEditorAction'] == loadString('pageZyklusEditorBTEditorAction')){
                        file_put_contents($testFile, json_encode($_REQUEST));
                    }
                }                
                #file_put_contents($testFile, $ZyklusCollection->outputJSON());
                #echo $ZyklusCollection->outputJSON();
                #$CollectionObject = json_decode(file_get_contents($testFile));
                #var_dump($CollectionObject);
                $ZyklusCollection->inputJSON($testFile);
                #$ZyklusCollection->printNames();
                require_once('lib/classZyklusEditor.php');
                
                $TableElements = array(
                    'Name',
                    'Verdichter 1',
                    'Verdichter 2 / Tauchpumpe',
                    'UV-Ausgang',
                    'Kühlfilter 1',
                    'Kühlfilter 2',
                    'Ausgang frei wählbar',
                    'Ventil 1',
                    'Ventil 2',
                    'Ventil 3',
                    'Ventil 4',
                    'Dosierpumpe 1',
                    'Dosierpumpe 2',
                    'Dosierpumpe 3',
                    'Warnlampe',
                    'Kühlfilter',
                    'Ausgang frei Wählbar bis 6W'
                );
                $ZyklusTable = new ZyklusEditor($TableElements);
                #($_REQUEST['btEditorAction'] === loadString('pageZyklusEditorBTEditorAction')) ? 'true' : 'false'
                $buttonAction = '';
                if(isset($_REQUEST['btEditorAction'])) { $buttonAction = $_REQUEST['btEditorAction']; }
                $ZyklusTable->insertNewZyklus(($buttonAction === loadString('pageZyklusEditorBTEditorActionNew')) ? 'true' : 'false');
                $ZyklusTable->loadJSON($testFile);
                $ZyklusTable->outputTable();

            ?>
        <br>
        <a href="indexPDF.php">PDF erstellen</a> <a href="indexCSV.php">CSV erstellen</a>
        <script type="text/javascript" language="JavaScript">
            $('#btSaveZyklus').addClass('ui-button ui-widget ui-corner-all');
            $('#btNewZyklus').addClass('ui-button ui-widget ui-corner-all');
            $( ".controlgroup" ).controlgroup();
        </script>        
        <?php
        $deleteSubmit = false;
        if(isset($_REQUEST['btEditorAction'])) { $deleteSubmit = true; }
        #if($_SESSION['displayNewRow'] == true) { $deleteSubmit = false; } else { $deleteSubmit = true; }
        if ($deleteSubmit == true && isset($_SERVER['REQUEST_URI']))
        {
            header ('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
        $_SESSION['displayNewRow'] = false;
        ?>