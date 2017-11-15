<?php
class Model {
    public $text;
    private $navigation;
    
    public function __construct() {
        $this->text = 'Hello world!';
        $this->navigation = array(
            array(
                'id' => 'pageWorkingHours',
                'title' => 'Betriebsstunden Zählerstand',
                'content' => $this->loadPage('pageWorkingHours')
            ),
            array(
                'id' => 'pageReadValues',
                'title' => 'Werte auslesen',
                'content' => $this->loadPage('pageReadValues')
            ),
            array(
                'id' => 'pageDateClock',
                'title' => 'Datum / Uhrzeit anzeigen und einstellen',
                'content' => $this->loadPage('pageDateClock')
            ),
            array(
                'id' => 'pageHoliday',
                'title' => 'Feriendatum einstellen',
                'content' => $this->loadPage('pageHoliday')
            ),
            array(
                'id' => 'pageOldAlerts',
                'title' => 'Protokoll',
                'content' => $this->loadPage('pageOldAlerts')
            ),
            array(
                'id' => 'pageSettings',
                'title' => 'Einstellungen anzeigen',
                'content' => $this->loadPage('pageSettings')
            ),
            array(
                'id' => 'pageActionCode',
                'title' => 'Aktions-Code',
                'content' => $this->loadPage('pageActionCode')
            )             
        );
    }
    private function loadPage($Page){
        ob_start();
        include './pages/'.$Page.'.php';
        $globalContent = ob_get_clean();
        #$globalContent .= 'Test: '.$Page;
        return $globalContent;
    }
    public function getNavigation(){
        return $this->navigation;
    }
}

class View {
    private $model;
    private $header;
    private $navigation;
    private $softwareType;
    public function __construct(Model $model) {
        $this->model = $model;
        $this->softwareType='premium';
        $this->createNavigation("testtabs");
        $this->createHeader();
    }
    private function createHeader(){
        $this->header = '<div class="klaroHeader"><div class="klaroTitle"><span class="firstLetters">KL</span><span class="klaroType">'.$this->softwareType.'</span></div><img class="klaroLogo" src="./img/KLARO-Logo.png"></div>';
    }
    private function createNavigation($navigationID){
        $tabs = '<ul>';
        $content = '';
            foreach ($this->model->getNavigation() AS $tab){
                $tabs .= '<li><a href="#'.$tab["id"].'">'.$tab["title"].'</a></li>';
                $content .= '<div id="'.$tab["id"].'">'.$tab["content"].'</div>';
            }
        $content .= '';
        $tabs .= '</ul>';
        $this->navigation = '<div id="'.$navigationID.'">';
        $this->navigation .= $tabs;
        $this->navigation .= $content;
        $this->navigation .= '</div>';
        $this->navigation .= '<script type="text/javascript" language="JavaScript"> $( "#'.$navigationID.'" ).tabs(); </script>';
    }
    public function setSoftwareType($type){
        $this->softwareType = $type;
    }
    public function output() {
        #$main = '<h1>' . $this->model->text .'</h1>';
        #$main .= '<a href="index.php?action=textclicked">' . $this->model->text . '</a>';
        $main = $this->header;
        $main .= $this->navigation;
        return $main;
    }
}

class Controller {
    private $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }
    public function textClicked() {
        $this->model->text = 'Text Updated';
    }    
}
?>