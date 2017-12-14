<?php
    require_once('globalFunctions.php');

    function cleanData(&$str){
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
    }
    
    class ZyklusEditor{
        private $columns;
        private $headerElements;
        private $printHeaderElements;
        private $bodyElements;
        private $printBodyElements;
        private $header;
        private $printHeader;
        private $body;
        private $printBody;
        private $footer;
        private $printFooter;
        private $printCellWidth;
        private $name;
        private $CSVField;
        private $createNewZyklus;
        private $zyklusDeleteElements;
        
        private function createHeaderElementWithClass($class,$name){
            $this->headerElements[] = '<th class="'.$class.'">'.$name.'</th>';
        }
        private function createPrintHeaderElementWithClass($class,$name){
            $this->printHeaderElements[] = '<td width="'.$this->printCellWidth.'" height="85" class="'.$class.'">'.$name.'</td>';
        }        
        private function createHeaderElement($name){
            $this->headerElements[] = '<th>'.$name.'</th>';
        }
        private function createPrintHeaderElement($name){
            $this->printHeaderElements[] = '<td width="'.$this->printCellWidth.'" height="85">'.$name.'</td>';
        }        
        private function createHeader(){
            $this->header = '<thead><tr>';
            foreach ($this->headerElements AS $Element){
                $this->header .= $Element;
            }
            $this->header .= '</tr></thead>';
        }
        private function createPrintHeader(){
            $this->printHeader = '<tr style="font-weight: bold;">';
            foreach ($this->printHeaderElements AS $Element){
                $this->printHeader .= $Element;
            }
            $this->printHeader .= '</tr>';
        }        
        private function createBodyElement($zeilenNummer,$position,$name,$value){
            if($name == 'ZyklusName'){
                $inputElement = '<input type="text" class="editText" name="ZyklusField['.$zeilenNummer.']['.$name.']" value="'.$value.'" >';
            } else {
                $position--;
                $inputElement = '<input type="hidden" name="ZyklusField['.$zeilenNummer.'][ProgressField]['.$position.'][ProgressName]" value="'.$name.'" >';
                $inputElement .= '<input type="text" class="editText" name="ZyklusField['.$zeilenNummer.'][ProgressField]['.$position.'][ProgressTime]" value="'.$value.'" >';
            }

            return '<td>'.$inputElement.'</td>';
        }
        private function createPrintBodyElement($zeilenNummer,$position,$name,$value){
            if($name == 'ZyklusName'){
                $inputElement = '<span id="ZyklusField['.$zeilenNummer.']['.$name.']">'.$value.'</span>';
            } else {
                $position--;
                $inputElement = '<span id="ZyklusField['.$zeilenNummer.'][ProgressField]['.$position.'][ProgressTime]">'.$value.'</span>';
            }
            
            return '<td width="'.$this->printCellWidth.'">'.$inputElement.'</td>';
        }
        private function createCSVElement($zeilenNummer,$position,$name,$value){
            $value = str_replace(".",",",$value);
            $name = utf8_decode($name);
            $this->CSVField[$zeilenNummer][$name] = $value;
        }
       
        private function createBodyRow($zeilenNummer,$zeile){
            $rowPosition = 0;
            $row = '<tr>';
            $printRow = '<tr>';
            foreach ($this->columns As $Column){
                if(isset($zeile[$rowPosition])){
                    if(isset($zeile[$rowPosition]['ZyklusName'])){ 
                        $row .= $this->createBodyElement($zeilenNummer,$rowPosition,'ZyklusName', $zeile[$rowPosition]['ZyklusName']); 
                        $printRow .= $this->createPrintBodyElement($zeilenNummer,$rowPosition,'ZyklusName', $zeile[$rowPosition]['ZyklusName']);
                        $this->createCSVElement($zeilenNummer,$rowPosition,'ZyklusName', $zeile[$rowPosition]['ZyklusName']);
                    }
                    if(isset($zeile[$rowPosition]['ProgressName'])){ 
                        $row .= $this->createBodyElement($zeilenNummer,$rowPosition,$zeile[$rowPosition]['ProgressName'], $zeile[$rowPosition]['ProgressTime']); 
                        $printRow .= $this->createPrintBodyElement($zeilenNummer,$rowPosition,$zeile[$rowPosition]['ProgressName'], $zeile[$rowPosition]['ProgressTime']);
                        $this->createCSVElement($zeilenNummer,$rowPosition,$zeile[$rowPosition]['ProgressName'], $zeile[$rowPosition]['ProgressTime']);
                    }
                } else {
                    $row .= $this->createBodyElement($zeilenNummer,$rowPosition,$Column, 0);
                    $printRow .= $this->createPrintBodyElement($zeilenNummer,$rowPosition,$Column, 0);
                    $this->createCSVElement($zeilenNummer,$rowPosition,$Column, 0);
                }
            $rowPosition++;    
            }
            $row .= '</tr>';
            $printRow .= '</tr>';
            $this->bodyElements[] = $row; 
            $this->printBodyElements[] = $printRow;
        }
        private function createFooter(){
            $colspan = sizeof($this->columns) - 2;
            if($this->zyklusDeleteElements != ''){
                $this->zyklusDeleteElements .= '<input id="btDeleteZyklus" type="submit" name="btEditorAction" value="'.loadString('pageZyklusEditorBTEditorActionDelete').'">';
            }
            $this->footer = '<tfoot><tr>';
            $this->footer .= '<td><label for="CollectionName">Modell-Typ</label></td><td><input type="text" class="editText" name="CollectionName" id="CollectionName" value="'.$this->name.'"></td>';
            $this->footer .= '<td colspan="'.$colspan.'" class="buttonCell"><input id="btSaveZyklus" type="submit" name="btEditorAction" value="'.loadString('pageZyklusEditorBTEditorAction').'"><input id="btNewZyklus" type="submit" name="btEditorAction" value="'.loadString('pageZyklusEditorBTEditorActionNew').'">'.$this->zyklusDeleteElements.'</td>';
            $this->footer .= '</tr></tfoot>';
        }
        private function createPrintFooter(){
            $colspan = sizeof($this->columns) - 1;
            $this->printFooter = '<tfoot><tr>';
            $this->printFooter .= '<td><label for="CollectionName">Modell-Typ: </label><span id="CollectionName">'.$this->name.'</span></td>';
            $this->printFooter .= '</tr></tfoot>';
        }        
        private function createBody(){
            $this->body = '<tbody>';
            foreach ($this->bodyElements AS $Element){
                $this->body .= $Element;
            }
            $this->body .= '</tbody>';
        }
        private function createPrintBody(){
            $this->printBody = '';
            foreach ($this->printBodyElements AS $Element){
                $this->printBody .= $Element;
            }
            $this->printBody .= '';
        }        
        private function getPositionFromColumn($searchElement){
            $Position = 0;
            $searchPosition = null;
            foreach ($this->columns AS $Column){
                if($Column == $searchElement){
                    $searchPosition = $Position;
                }
                $Position++;
            }
            return $searchPosition;
        }
        public function __construct($columns) {
            $this->columns = $columns;
            $this->printCellWidth = 225;
            $this->CSVField = array();
            $wrapLength = 15;
            foreach ($this->columns AS $Column){
                $Column = iconv(mb_detect_encoding($Column), "UTF-8", $Column);
                if($Column == 'Name'){ 
                    $this->createHeaderElementWithClass('ZyklusName', $Column); 
                    $this->createPrintHeaderElementWithClass('ZyklusName', wordwrap( $Column, $wrapLength, " \n" ));
                } else { 
                    $this->createHeaderElement($Column); 
                    $this->createPrintHeaderElement(wordwrap( $Column, $wrapLength, " \n" ));
                }
            }
            $this->createHeader();
            $this->createPrintHeader();
            $this->zyklusDeleteElements = '';
        }
        public function insertNewZyklus($insertZyklus){
            $this->createNewZyklus = $insertZyklus;
        }
        public function loadJSON($jsonFile){
            if(file_exists($jsonFile)){
                $inputObject = json_decode(file_get_contents($jsonFile));
                $this->name = $inputObject->CollectionName;
                #var_dump($inputObject->ZyklusField);
                $zeilenNummer = 0;
                $this->zyklusDeleteElements = '<select id="sbDeleteZyklus" name="sbDeleteZyklus">';
                foreach($inputObject->ZyklusField AS $ZyklusElement){
                    #$inputZyklus = new ZyklusController($ZyklusElement->ZyklusName);
                    $zeile = array();
                    $zeile[0] = array(
                        'ZyklusName' => $ZyklusElement->ZyklusName
                    );
                    $this->zyklusDeleteElements .= '<option value="'.$ZyklusElement->ZyklusName.'">'.$ZyklusElement->ZyklusName.'</option>';
                    #$zeile[0] = $ZyklusElement->ZyklusName;
                    foreach ($ZyklusElement->ProgressField AS $Progress){
                        #var_dump($Progress);
                        $searchPosition = $this->getPositionFromColumn($Progress->ProgressName);
                        if($searchPosition != null){$zeile[$searchPosition]=array(
                            'ProgressName' => $Progress->ProgressName,
                            'ProgressTime' => $Progress->ProgressTime
                        );}
                        #$inputZyklus->addProgress($Progress->ProgressName, $Progress->ProgressTime);
                    }
                    #var_dump($zeile);
                    $this->createBodyRow($zeilenNummer,$zeile);
                    $this->createBody();
                    $this->createPrintBody();
                    #var_dump($ZyklusElement);
                    #echo 'Zeilen-Nummer: '.$zeilenNummer;
                    $zeilenNummer++;
                    if($this->createNewZyklus == 'true' && $zeilenNummer == sizeof($inputObject->ZyklusField)){
                        $zeile = array();
                        $zeile[0] = array(
                            'ZyklusName' => ''
                        );
                        foreach ($ZyklusElement->ProgressField AS $Progress){
                            $searchPosition = $this->getPositionFromColumn($Progress->ProgressName);
                            if($searchPosition != null){$zeile[$searchPosition]=array(
                                'ProgressName' => $Progress->ProgressName,
                                'ProgressTime' => ''
                            );}
                        }
                        $this->createBodyRow($zeilenNummer,$zeile);
                        $this->createBody();
                        $_SESSION['displayNewRow'] = true;
                    }                    
                }
                $this->zyklusDeleteElements .= '</select>';
                #echo 'Letzte Zeilen-Nummer: '.$zeilenNummer;
                $this->createFooter();
                $this->createPrintFooter();
            }            
        }
        public function outputTable(){
            echo '<form id="ZyklusEditForm" method="POST" action="'.$_SERVER['PHP_SELF'].'">';
            echo '<table id="ZyklusEditTable" class="controlgroup">';
            echo $this->header;
            echo $this->body;
            echo $this->footer;
            echo '</table>';
            echo '</form>';
        }
        public function returnTable(){
            $table = '<table id="ZyklusEditTable" border="1">';
            $table .= $this->printHeader;
            $table .= $this->printBody;
            $table .= $this->printFooter;
            $table .= '</table>';
            return $table;
        }
        public function outputCSV(){
            // http://www.the-art-of-web.com/php/dataexport/#csv_download
            // filename for download
            $filename = "website_data_" . date('Ymd') . ".xls";

            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");

            $flag = false;
            foreach($this->CSVField as $row) {
              if(!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
              }
              array_walk($row, __NAMESPACE__ . '\cleanData');
              echo implode("\t", array_values($row)) . "\r\n";
            }
            exit;            
        }
        
    }
?>