<?php
      //error_reporting(0);
      
      if(!empty($_GET['file']))
      {
            $filename = basename($_GET['file']);
            $filepath = "Resume/".$filename;

            if(!empty($filename) && file_exists($filepath))
            {
                  header("Catche-Control: public");
                  header("Content-Description: File Transfer");
                  header("Content-Disposition: attachment; filename = $filename");
                  header("Content-Type: application/zip");
                  header("Content-Transfer-Encoding: binary");

                  readfile($filepath);
                  exit;

            }
            else
            {
                  echo "file doesn't exist";
            }
      }

?>