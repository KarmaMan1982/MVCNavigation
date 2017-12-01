<?php
require_once ('./lib/globalFunctions.php');
class Model {
    public $text;
    private $navigation;
    
    public function __construct() {
        loadString('navigationWorkingHourCount');
        $this->text = 'Hello world!';
        $this->navigation = array(
            array(
                'id' => 'pageWorkingHours',
                'title' => loadString('navigationWorkingHourCount'),
                'content' => $this->loadPage('pageWorkingHours')
            ),
            array(
                'id' => 'pageReadValues',
                'title' => loadString('navigationReadValues'),
                'content' => $this->loadPage('pageReadValues')
            ),
            array(
                'id' => 'pageDateClock',
                'title' => loadString('navigationDateClock'),
                'content' => $this->loadPage('pageDateClock')
            ),
            array(
                'id' => 'pageHoliday',
                'title' => loadString('navigationHoliday'),
                'content' => $this->loadPage('pageHoliday')
            ),
            array(
                'id' => 'pageOldAlerts',
                'title' => loadString('navigationProtocol'),
                'content' => $this->loadPage('pageOldAlerts')
            ),
            array(
                'id' => 'pageSettings',
                'title' => loadString('navigationSettings'),
                'content' => $this->loadPage('pageSettings')
            )/*,
            array(
                'id' => 'pageActionCode',
                'title' => 'Aktions-Code',
                'content' => $this->loadPage('pageActionCode')
            )*/             
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
        switch($_SESSION['rotation']){
            case 'landscape':
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
            break;
            case 'portrait':
                $elements = '';
                    foreach ($this->model->getNavigation() AS $tab){
                        $elements .= '<h3>'.$tab["title"].'</h3>';
                        $elements .= '<div>'.$tab["content"].'</div>';
                    }
                $this->navigation = '<div id="'.$navigationID.'">';
                $this->navigation .= $elements;
                $this->navigation .= '</div>';
                $this->navigation .= '<style type="text/css">'
                        . '.ui-accordion-content-active { height: auto !important; }'
                        . '</style>';
                $this->navigation .= '<script type="text/javascript" language="JavaScript"> $( "#'.$navigationID.'" ).accordion(); </script>';                                
            break;
            default:
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
            break;
        }

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