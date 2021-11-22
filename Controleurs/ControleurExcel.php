<?php

final class ControleurExcel
{
    public function defautAction()
    {
        $excel =  new Excel();
        Vue::montrer('excel/form');
    }

    public function postAction()
    {
        $excel =  new Excel();
        $file = [];
        if (isset($_FILES['excel']) && !empty($_FILES['excel']) && pathinfo($_FILES['excel']['name'],PATHINFO_EXTENSION) == 'csv'){
            $file = $excel->parseExcel($_FILES['excel']['tmp_name']);
            Vue::montrer('excel/liste', array('excel'=> $file, 'test'=> $excel->chunckTab($file,4)));
        }
        else{
            Vue::montrer('excel/form');
        }
    }

    public function generateAction(){
        session_start();
        $excel =  new Excel();
        if (isset($_POST['chunck']) && !empty($_POST['chunck'])){
           
            $list = $_SESSION['list'];
            $lenght = $_POST['chunck'];
            $chunckList = $excel->chunckTab($list,$lenght);
            Vue::montrer('excel/liste', array('excel'=> $list, 'group'=> $chunckList));
        }
    }
}