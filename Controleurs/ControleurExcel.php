<?php

final class ControleurExcel
{
    public function defautAction()
    {
        $excel =  new Excel();
        Vue::montrer('excel/main', array('excel' =>  $excel->getExcel()));

    }
}