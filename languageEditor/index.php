<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>KLARO Language - Editor</title>
        <link href="../lib/jquery-ui-themes-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-themes-1.12.1/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-themes-1.12.1/themes/excite-bike/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-themes-1.12.1/themes/excite-bike/theme.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/switchBox/jquerysctipttop.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/switchBox/bootstrap.min.css" rel="stylesheet" type="text/css"/>        
        <link href="../style/header.css" rel="stylesheet" type="text/css"/>
        <!--
        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
        <link href="lib/uploader/css/style.css" rel="stylesheet" />
        -->
        <script src="../lib/jquery-ui-1.12.1/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="../lib/jquery-ui-1.12.1/jquery-ui.js" type="text/javascript"></script>
        <script src="../lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="../lib/switchBox/jquery.twbs-toggle-buttons.min.js" type="text/javascript"></script>        
        <script src="./js/index.js" type="text/javascript"></script>
    </head>
    <body>
<?php
if(isset($_REQUEST['editField'])){    file_put_contents('./languages.json', json_encode($_REQUEST['editField'])); }
$languageRegister = array();
$languageBlock = json_decode(file_get_contents('./languages.json'));
foreach($languageBlock AS $Block => $Languages){
    #var_dump('Block: '.$Block);
    foreach ($Languages AS $Language => $Element){
        if(!in_array($Language, $languageRegister)) { array_push($languageRegister, $Language); }
        #var_dump('Sprache: '.$Language);
        #var_dump('Element: '.$Element);
    }
}
#var_dump($languageRegister);
#$jsonLanguages = json_encode($languageBlock);
#if(isset($_REQUEST['editField'])){ var_dump($_REQUEST['editField']); }
var_dump($_REQUEST);
?>        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="frmLanguages">
        <table>
            <thead>
                <tr>
                  <th>Element</th>
                  <?php 
                  foreach ($languageRegister AS $Sprache){
                  echo '<th>'.$Sprache.'</th>';
                  }
                  ?>
                </tr>
            </thead>
            <tbody>
                  <?php
                  
                    foreach($languageBlock AS $Block => $Languages){
                        echo '<tr>';
                        echo '<td>'.$Block.'</td>';
                        foreach ($languageRegister AS $Sprache){
                            $editField = '<input type="text" name="editField['.$Block.']['.$Sprache.']" value="'.$Languages->$Sprache.'">';
                            #echo '<td>'.$Languages->$Sprache.'</td>';
                            echo '<td>'.$editField.'</td>';
                        }
                        echo '</tr>';
                    }                  
                  
                  ?>
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="<?php echo sizeof($languageRegister) + 1; ?>">
                      <input type="submit" name="btSave" id="btSave" value="Texte speichern!">
                      <label for="tbNewElement">Neues Element hinzufügen:</label>
                      <input type="text" name="tbNewElement" id="tbNewElement">
                      <input type="submit" name="btSave" id="btSaveNewElement" value="Element speichern!">
                  </td>
                </tr>
            </tfoot>
        </table>
        </form>
        
    </body>
</html>