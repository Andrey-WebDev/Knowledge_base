<?php
    $upload_dir = $_SERVER["DOCUMENT_ROOT"]."/knowledge_base/brand_surveys/fiat/fiat_kc/"; // Папка для загрузки файла
        $upload_file = $_FILES['upload_file']; // Загружаемый через форму файл
        $smb_upload = $_POST['smb_upload']; // Кнопка "Загрузить"
        $name_file = trim($_POST['name_file']); // Имя файла
        
        // Массив с расширениями для файлов (нужно будет дописать, если будут загружаться файлы не только графические)
        $expansion = array("application/pdf"=>".pdf");
        
        if(isset($smb_upload))
        {
                if(!empty($upload_file['name'])&!empty($name_file))
                {
                        if(file_exists($upload_dir.$name_file.$expansion[$upload_file['type']]))
                        {
                                move_uploaded_file($upload_file['tmp_name'], $upload_dir.$name_file.$expansion[$upload_file['type']]);
                                echo "Файл был перезаписан";
                        }
                        else
                        {
                                move_uploaded_file($upload_file['tmp_name'], $upload_dir.$name_file.$expansion[$upload_file['type']]);
                                echo "Файл был загружен";
                        }
                }
                else
                {
                    echo "Укажите файл на вашем компьютере! Укажите название файла!";
                }
        }
 
?>

<br><a href="http://knowledge-base.avilon-nymm.ru/knowledge_base/pools/">Назад</a>