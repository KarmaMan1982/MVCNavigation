            <?php
                require_once('./scripts/getZyklus.php');
                #echo $ZyklusObject->outputHTML();
                require_once('./scripts/getZyklusCollection.php');
                #$ZyklusCollection->printNames();
            ?>
            <!--
            <div id="ActiveProgressName">&nbsp;</div>
            -->
            <?php
                $testFile = 'output.json';
                if(isset($_REQUEST)){
                    #var_dump($_REQUEST);
                    if(isset($_REQUEST['CollectionName']) && isset($_REQUEST['ZyklusField'])){
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
                $ZyklusTable->loadJSON($testFile);
                $ZyklusTable->outputTable();

            ?>
        <br>
        <a href="indexPDF.php">PDF erstellen</a> <a href="indexCSV.php">CSV erstellen</a>