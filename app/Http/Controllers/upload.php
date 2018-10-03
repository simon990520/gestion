<?php

error_reporting(E_ALL ^ E_NOTICE);
use \setasign\Fpdi\Fpdi;


define('UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);

processRequest();

// Front controller
function processRequest() {
    if(isset($_GET['delay']) && is_numeric($_GET['delay'])) {
        sleep($_GET['delay']);
    }


    $fileNames = handleUploadedFiles();
    if(is_array($fileNames) && count($fileNames) > 0) {
        foreach($fileNames as $index => $filename) {
            if(strpos($filename, 'ERROR:') === 0) {
                print("<p>$filename</p>");
            } else {
                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $targetUrl = dirname(getCurrentPageURL()) . str_replace(DIRECTORY_SEPARATOR, "/", substr(UPLOAD_DIR, strlen(__DIR__))) . $filename;
                print('<a href="' . $targetUrl . '" target="_blank">');
                if (strpos($filename, 'ERROR:') !== 0 && in_array($extension, array('jpg', 'jpeg', 'gif', 'png'))) {
                    $imgAnchor = '<img src="' . $targetUrl . '" height="160">';
                } else if (strpos($filename, 'ERROR:') !== 0 && in_array($extension, array('tif', 'tiff'))) {
                    $imgAnchor = '<img src="' . dirname(getCurrentPageURL()) . '/icon-tif.png">';
                } else if (strpos($filename, 'ERROR:') !== 0 && $extension == 'pdf') {
                    $imgAnchor = '<img src="' . dirname(getCurrentPageURL()) . '/icon-pdf.png">';
                } else {
                    $imgAnchor = '<img src="' . dirname(getCurrentPageURL()) . '/icon-others.png">';
                }

                print("<p>$filename</p>");
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "admin";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    /*$ruta = $fileNames;*/
                    $ruta = substr($filename, 0, -4);
                    $id = $_REQUEST['id'];
                    $sql = "INSERT INTO archivos (ruta, stores_id)VALUES ($ruta, $id)";
                    // use exec() because no results are returned
                    $conn->exec($sql);

                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

                $conn = null;
            }
        }
    }




    $imgArray = array(); // print POST values pointing to image URL
    foreach($_POST as $paramKey => $paramValue) {
        if(strlen($paramValue) < 6) {
            continue;
        }
        if(strtolower(substr(trim($paramValue), 0, 4)) == 'http' && in_array(strtolower(pathinfo($paramValue, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff')) )  {
            array_push($imgArray, $paramValue);
        }
    }

    if(is_array($imgArray) && count($imgArray) > 0) {
        print('<br>');
        foreach($imgArray as $imgSrc) {

        }
    }




}



/**
 * @return an array of mixing simple names of the files uploaded into UPLOAD_DIR and error strings starting with 'ERROR: ' or empty array if there is no uploaded file.
 */
function handleUploadedFiles() {
    $fileNames = array();
    if(is_array($_FILES)) {
        foreach($_FILES as $name => $fileSpec) {
            if(! is_array($fileSpec)) {
                continue;
            }

            if(is_array($fileSpec['tmp_name'])) { // multiple files with same name
                foreach($fileSpec['tmp_name'] as $index => $value) {
                    if($fileSpec['error'][$index] == UPLOAD_ERR_OK) {
                        array_push($fileNames, doHandleUploadedFile($fileSpec['name'][$index], $fileSpec['type'][$index], $fileSpec['tmp_name'][$index], $fileSpec['error'][$index], $fileSpec['size'][$index]));
                    }
                }
            } else {
                if($fileSpec['error'] == UPLOAD_ERR_OK) {
                    array_push($fileNames, doHandleUploadedFile($fileSpec['name'], $fileSpec['type'], $fileSpec['tmp_name'], $fileSpec['error'], $fileSpec['size']));
                }
            }
        }
    }

    return $fileNames;
}


/**
 * @return simple name of the file in the UPLOAD_DIR or an error string starting with 'ERROR: '.
 */
function doHandleUploadedFile($name, $type, $tmp_name, $error, $size) {
    if($error != UPLOAD_ERR_OK) {
        return 'ERROR: upload error code: ' . $error . ' for file ' . $name;
    }

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    if($extension == null || strlen($extension) == 0) {
        $extension = getImageExtensionByMimeType($type);
        if($extension != null) {
            $name .= '.' . $extension;
        }
    }

    if($extension == null || strlen($extension) == 0 ||  (strlen($extension) > 0 && (!in_array(strtolower($extension), array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'pdf'))))) {
        return 'ERROR: extension not allowed: ' . $extension . ' for file ' . $name;
    }

    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $name);
    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    if(! file_exists(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR); // try to mkedir
    }

    $moved = move_uploaded_file($tmp_name, UPLOAD_DIR . $name);
    if($moved) {
        chmod(UPLOAD_DIR . $name, 0644);
    } else {
        return 'ERROR: moving uploaded file failed' . ' for file ' . $name;
    }

    return $name;
}

function getCurrentPageURL() {
    $defaultPort = "80";
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
        $defaultPort = "443";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != $defaultPort) {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function getImageExtensionByMimeType($mimeType) {
    $mimeType = strtolower($mimeType);
    switch($mimeType) {
        case 'image/jpeg': return "jpg";
        case 'image/pjpeg': return 'jpg';
        case 'image/png': return 'png';
        case 'image/gif': return 'gif';
        case 'image/tiff': return 'tif';
        case 'image/x-tiff': return 'tif';
        case 'application/pdf': return 'pdf';
        default: return '';
    }
}

echo '<meta http-equiv="REFRESH" content="1">';

?>

