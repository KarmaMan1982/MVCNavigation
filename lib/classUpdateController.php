<?php
class UpdateController {
    private $data;
    private $dataConverted;
    public function __construct($data) {
        $this->data = $data;
    }
    private function receiveTimeFromServer($timeServer,$socket){
        $fp = fsockopen($timeserver,$socket,$err,$errstr,5) or $fp = fsockopen($timeserver,123,$err,$errstr,5) or $err = "FSOCKOPEN FAILED";
        if ($fp) {
            fputs($fp,"\n");
            $timevalue = fread($fp,49);
            fclose($fp); // close the connection
        } else {
            $timevalue = " ";
        }
        $ret = array();

          $ret['success']=false;
          $ret['serverName'] = $timeserver;
          $ret['serverText'] = $timevalue;
          $ret['utcTime'] = '';  
          $ret['acstTime'] = '';
          $ret['errorCode'] = $err;     # error code
          $ret['errorText'] = $errstr;  # error text

          if($timevalue != " "){
            $timeElements = explode(" ",$timevalue);
            #var_dump($timeElements);
            $utc_date = DateTime::createFromFormat(
              'Y-m-d H:i:s',
              $timeElements[1].' '.$timeElements[2],
              new DateTimeZone('UTC')
            );
              $acst_date = clone $utc_date; // we don't want PHP's default pass object by reference here
              $acst_date->setTimeZone(new DateTimeZone('Europe/Berlin'));

              #echo 'UTC:  ' . $utc_date->format('H:i:s d.m.Y') . '<br>';  // UTC:  2011-04-27 2:45 AM
              #echo 'ACST: ' . $acst_date->format('H:i:s d.m.Y') . '<br>'; // ACST: 2011-04-27 12:15 PM  


            $ret['success']=true;
            $ret['serverName'] = $timeserver;
            $ret['serverText'] = $timevalue;
            $ret['utcTime'] = $utc_date->format('H:i:s d.m.Y');  
            $ret['acstTime'] = $acst_date->format('H:i:s d.m.Y');
            $ret['errorCode'] = $err;     # error code
            $ret['errorText'] = $errstr;  # error text
          }
          return($ret);        
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
    public function tmUpdateTime(){
        $server='time.nist.gov';
        $serverTime = $this->receiveTimeFromServer($server,13);
    }
    public function Output(){
        echo $this->dataConverted;
    }
}
?>