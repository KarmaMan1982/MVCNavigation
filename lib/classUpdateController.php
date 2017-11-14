<?php
class UpdateController {
    private $data;
    private $dataConverted;
    private $configHolidayFile;
    public function __construct($data) {
        $this->data = $data;
        $this->configHolidayFile='../config/Holiday.json';
    }
    private function receiveTimeFromServer(){
    $ret = array();
    $waste = array("jsont( ", " ) ", ")");
    $good = array("", "", "");

    $newphrase = str_replace($waste, $good, file_get_contents("http://ntp-a1.nict.go.jp/cgi-bin/jsont"));
    $timeFromServer=json_decode($newphrase);
    $serverTime = new DateTime();
    $serverTime->setTimestamp((int)$timeFromServer->st);
    $statusUNIXTime = new DateTime();
    $statusMCTime = new DateTime();
    $intervallTest = new DateInterval('PT10H30S');
    $statusMCTime->add($intervallTest);
    
    $ret['statusINTERNETTime']=$serverTime->format('H:i:s d.m.Y');
    $ret['statusUNIXTime']=$statusUNIXTime->format('H:i:s d.m.Y');
    $ret['statusMCTime']=$statusMCTime->format('H:i:s d.m.Y');
    return($ret);        
    }
    private function saveHolidayStart($date){
        if (file_exists($this->configHolidayFile)){
            $configField = json_decode(file_get_contents($this->configHolidayFile));
            $configField->startHoliday = $date;
        } else {
            $configField = array();
            $configField['startHoliday']=$date;
        }
            
        file_put_contents($this->configHolidayFile, json_encode($configField));
    }
    private function saveHolidayStop($date){
        if (file_exists($this->configHolidayFile)){
            $configField = json_decode(file_get_contents($this->configHolidayFile));
            $configField->stopHoliday = $date;
        } else {
            $configField = array();
            $configField['stopHoliday']=$date;
        }
            
        file_put_contents($this->configHolidayFile, json_encode($configField));
    }    
    private function loadHolidayStart(){
        if (file_exists($this->configHolidayFile)){
            $configField = json_decode(file_get_contents($this->configHolidayFile));
        } else {
            $configField = (object) [
                'startHoliday' => ''
            ];
        }
        if(isset($configField->startHoliday)) { return $configField->startHoliday; }
        else { return ''; }
    }
    private function loadHolidayStop(){
        if (file_exists($this->configHolidayFile)){
            $configField = json_decode(file_get_contents($this->configHolidayFile));
        } else {
            $configField = (object) [
                'stopHoliday' => ''
            ];
        }
        if(isset($configField->stopHoliday)) { return $configField->stopHoliday; }
        else { return ''; }
    }      
    public function btUpdateMotor() {
        #var_dump($this->data);
        $Motoren = array();
        foreach ($this->data AS $Motor => $Wert){
            $NewMotor = array();
            $NewMotor['Name'] = $Motor;
            switch ($Wert){
                case 'Offen':
                    $NewMotor['Wert'] = 'Geschlossen';
                    $NewMotor['Class'] = 'motorClose';                    
                break;
                case 'Geschlossen':
                    $NewMotor['Wert'] = 'Offen';
                    $NewMotor['Class'] = 'motorOpen';                    
                break;
                default:
                    $NewMotor['Wert'] = 'Undefiniert';
                    $NewMotor['Class'] = 'motorUndefined';                    
                break;
            }
            $Motoren[]=$NewMotor;
        }
        $this->dataConverted = json_encode($Motoren);
    }
    public function btUpdateSensor() {
        #var_dump($this->data);
        $Sensoren = array();
        $Element = 1;
        foreach ($this->data AS $Sensor => $Attribut){
            $NewSensor = array();
            
            foreach($Attribut AS $Typ => $Wert){
                if($Typ == 'valueSensor'.$Element){
                    $NewSensor[$Typ] = (int) $Wert + 10;
                }else{
                    $NewSensor[$Typ] = $Wert;
                }
            }
            $Element++;
            $Sensoren[]=$NewSensor;
        }
        $this->dataConverted = json_encode($Sensoren);
    }
    public function btUpdateInput() {
        #var_dump($this->data);
        $Inputs = array();
        $Element = 1;
        foreach ($this->data AS $Input => $Attribut){
            $NewInput = array();
            
            foreach($Attribut AS $Typ => $Wert){
                if($Typ == 'valueInput'.$Element){
                    switch($Wert){
                        case 'belegt': $NewInput[$Typ] = 'nicht belegt'; break;
                        case 'nicht belegt': $NewInput[$Typ] = 'belegt'; break;
                        case 'Schütz geschaltet': $NewInput[$Typ] = 'Verdichter angeschlossen'; break;
                        case 'Verdichter angeschlossen': $NewInput[$Typ] = 'Schütz geschaltet'; break;
                        case 'An': $NewInput[$Typ] = 'Aus'; break;
                        case 'Aus': $NewInput[$Typ] = 'An'; break;
                        default: $NewInput[$Typ] = 'undefiniert'; break;
                    }
                }
            }
            $Element++;
            $Inputs[]=$NewInput;
        }
        $this->dataConverted = json_encode($Inputs);
    }
    public function btSetStartHoliday(){
        $this->saveHolidayStart($this->data['startHoliday']);
        $configField = array();
        $configField['startHoliday']=$this->loadHolidayStart();
        $configField['stopHoliday']=$this->loadHolidayStop();
        $this->dataConverted = json_encode($configField);        
    }
    public function btSetStopHoliday(){
        $this->saveHolidayStop($this->data['stopHoliday']);
        $configField = array();
        $configField['startHoliday']=$this->loadHolidayStart();
        $configField['stopHoliday']=$this->loadHolidayStop();
        $this->dataConverted = json_encode($configField);        
    }
    public function tmUpdateTime(){
        $serverTime = $this->receiveTimeFromServer();
        $this->dataConverted = json_encode($serverTime);
    }
    public function tmUpdateHoliday(){
        $configField = array();
        $configField['startHoliday']=$this->loadHolidayStart();
        $configField['stopHoliday']=$this->loadHolidayStop();
        $this->dataConverted = json_encode($configField);
    }
    public function Output(){
        echo $this->dataConverted;
    }
}
?>