<?php
const VF = 'Views/';
const MD = 'Models/';
const CN = 'Controllers/';
const CN_FO = 'Controllers/Form/';
const HP = 'Helpers/';
const MD_MA = 'Models/Manager/';



foreach (array_merge(
    glob(MD . "*.php"),
    glob(CN . "*.php"),
    glob(CN_FO . "*.php"),
    glob(HP . "*.php"),
    glob(MD_MA . "*.php")
)
    as $filename) {
        if(ctype_upper($filename{0})){
            print_r($filename);
            require_once $filename;
        }
}

