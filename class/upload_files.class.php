<?php

class Upload{

    private $_upload_max_filesize = 1024*10*1024;
    private $_files_directories = "/upload/projects/";
    public function __construct($directories = null, $size = null)
    {
        if ($size!=null)
            $this->_upload_max_filesize = $size;
        if ($directories!=null)
            $this->_files_directories = $directories;

    }

    public function upload_files($fileName){
        var_dump($_FILES);
        if($_FILES["image"]["size"] >$this->_upload_max_filesize)
        {
            echo  ("Размер файла превышает $this->_upload_max_filesize байтов");
        }
        // Проверяем загружен ли файл
        if(isset($_FILES['image']['tmp_name']))
        {
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную
            move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$this->_files_directories.$_FILES["image"]["name"]);
        } else {
            echo  ("Файл не был загружен");
        }

    }

    private function error_window($error){
        

    }

}