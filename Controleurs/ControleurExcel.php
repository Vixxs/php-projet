<?php

final class ControleurExcel
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        $excel =  new Excel();
        Vue::montrer('excel/form');
    }
    
    /**
     * Action pour envoyer le fichier à traiter
     *
     * @return void
     */
    public function postAction()
    {
        $excel =  new Excel();
        $tab = [];
        if (isset($_FILES['excel']) && !empty($_FILES['excel']) && pathinfo($_FILES['excel']['name'],PATHINFO_EXTENSION) == 'csv'){
            $tab = $excel->parseExcel($_FILES['excel']['tmp_name']);
            Vue::montrer('excel/liste', array('excel'=> $tab, 'test'=> $excel->chunckTab($tab,4)));
        }
        else{
            Vue::montrer('excel/form');
        }
    }
    
    /**
     * Action pour générer la liste des groupes
     *
     * @return void
     */
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