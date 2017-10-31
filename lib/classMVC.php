<?php
class Model {
    public $text;
    private $navigation;
    
    public function __construct() {
        $this->text = 'Hello world!';
        $this->navigation = array(
            array(
                'id' => 'pageWorkingHours',
                'title' => 'Betriebsstunden Z&auml;hlerstand',
                'content' => $this->loadPage('pageWorkingHours')
            ),
            array(
                'id' => 'pageManual',
                'title' => 'Handbetreib Funktion',
                'content' => $this->loadPage('pageManual')
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
                'title' => 'alte St&ouml;rungen auslesen',
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
        $globalContent .= 'Test: '.$Page;
        return $globalContent;
    }
    public function getNavigation(){
        return $this->navigation;
    }
}

class View {
    private $model;
    private $navigation;
    public function __construct(Model $model) {
        $this->model = $model;
        $this->createNavigation("testtabs");
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
    public function output() {
        #$main = '<h1>' . $this->model->text .'</h1>';
        #$main .= '<a href="index.php?action=textclicked">' . $this->model->text . '</a>';
        $main = $this->navigation;
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
