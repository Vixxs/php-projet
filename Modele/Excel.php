<?php

final class Excel
{
    const PATH_EXCEL = "./Vues/excel/files/liste.csv";

    public function getStudent()
    {
        return $this->_S_message ;
    }

    public function getExcel()
    {  
        $handle = fopen(self::PATH_EXCEL , "r");
        $list = [];
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $list[] = $data;
            var_dump($list);
        }
        return $list;
    }

}