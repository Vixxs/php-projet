<?php

final class Excel
{
    const PATH_EXCEL = "./Vues/excel/files/liste.csv";

    public function getStudent()
    {
        return $this->_S_message ;
    }

    public function parseExcel($path)
    {  
        $handle = fopen($path , "r");
        $list = [];
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $list[] = $data;
        }
        $students = [];
        foreach($list as $row){
            $students[]=  explode(';',$row[0]);
        }
        array_splice($students,0,3);

        $tab = [];
        $i = 0;
        foreach($students as $student){
            $tab[$i]['civilite'] = $student[0];
            $tab[$i]['nom'] = $student[1];
            $tab[$i]['prenom'] = $student[2];
            $i++;
        }
        return $tab;
    }

    public function shuffleTab($tab)
    {
        return shuffle($tab);  
    }

    public function chunckTab($tab,$length)
    {
        return array_chunk($tab,$length);
    }

}