<?php

function prd($arr){
    echo "<pre>";
    print_r($arr);
    exit();

}

function delete_directory($dirname) {
    
    $dir_handle = 0;
    if (is_dir($dirname)){
        $dir_handle = opendir($dirname);
    }
    
    if (!$dir_handle) {
        return false;
     }

    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file)){
                unlink($dirname."/".$file);
            } else {
                delete_directory($dirname.'/'.$file);
            }
        }
    }

    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

function getProcessIDsForRunningScript($filename_string)
{
    $tmparr = array();

    ob_start();
    system(" ps ax|grep '".trim($filename_string)."'| grep -v 'grep' | awk '{print$1}'");
    $cmdoutput = ob_get_contents();
    ob_end_clean();

    $cmdoutput = trim($cmdoutput);
    if (empty($cmdoutput)) {
        return $tmparr;
    }

    $cmdoutput = preg_replace("#\n#", ",", trim($cmdoutput));
    $tmparr = explode(",", $cmdoutput);

    return $tmparr;
}


function writelogsinfile($log_files_name, $msg_arra)
{
    $date = date("Y-m-d");
    $file_name = public_path().DIRECTORY_SEPARATOR."tmp/".$log_files_name."_".$date.".log";
    if(file_exists($file_name))
    {
        file_put_contents($file_name, print_r($msg_arra, TRUE), FILE_APPEND);
    }else
    {
        $fp = fopen($file_name, 'w');
        file_put_contents($file_name, print_r($msg_arra, TRUE), FILE_APPEND);
    }
}

function getFilename($fullpath, $uploaded_filename) {
    $count = 1;
    $new_filename = $uploaded_filename;
    $firstinfo = pathinfo($fullpath);

    while (file_exists($fullpath)) {
        $info = pathinfo($fullpath);
        $count++;
        $new_filename = $firstinfo['filename'] . '(' . $count . ')' . '.' . $info['extension'];
        $fullpath = $info['dirname'] . '/' . $new_filename;
    }

    return $new_filename;
}

function humanTiming($time) {

    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;

    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
}

function removeDir($dir) {
    foreach (glob($dir . "/*.*") as $filename) {
        if (is_file($filename)) {
            unlink($filename);
        }
    }

    if (is_dir($dir . "feature")) {

        foreach (glob($dir . "feature/*.*") as $filename) {
            if (is_file($filename)) {
                unlink($filename);
            }
        }

        rmdir($dir . "feature");
    }

    rmdir($dir);
}

function getRandomNum($len = 6) {    
    $chars = "0123456789";
    $r_str = "";
    for ($i = 0; $i < $len; $i++)
        $r_str .= substr($chars, rand(0, strlen($chars)), 1);

    if (strlen($r_str) != $len) {
        $r_str .= getRandomNum($len - strlen($r_str));
    }

    return $r_str;
}


function getRandomStringNumber($len = 30) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";    
    $r_str = "";
    for ($i = 0; $i < $len; $i++)
        $r_str .= substr($chars, rand(0, strlen($chars)), 1);

    if (strlen($r_str) != $len) {
        $r_str .= getRandomStringNumber($len - strlen($r_str));
    }

    return $r_str;
}

function downloadFile($filename, $filepath) {
    $fsize = filesize($filepath);
    header('Pragma: public');
    header('Cache-Control: public, no-cache');
    header('Content-Type: ' . mime_content_type($filepath));
    header('Content-Length: ' . $fsize);
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    readfile($filepath);
    exit;
}

function isDigits($quantity) {
    return preg_match("/[^0-9]/", $quantity);
}

function makeDir($path) {
    if (!is_dir($path)) {
        mkdir($path);
        chmod($path, 0777);
    }
}

function getUserIp() {    

    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    
    return $ipaddress;
}
/**
 * Website General Model Functions
 *
 */
function getRecordsFromSQL($sql, $returnType = "array") {
    $result = \DB::select($sql);

    if ($returnType == "array") {
        $result = json_decode(json_encode($result), true);
    } else {
        return $result;
    }
}

function getRecords($table, $whereArr, $returnType = "array") {
    $result = \DB::table($table)->from($table);

    if (is_array($whereArr) && count($whereArr) > 0) {
        foreach ($whereArr as $field => $value) {
            $result->where($field, $value);
        }
    }

    $result = $result->get();


    if ($returnType == "array") {
        $result = json_decode(json_encode($result), true);
    } else {
        return $result;
    }
}

function customDatatble($module)
{
    $orderArr = request()->get("order");
    \session()->put([$module.'_orderClm' => $orderArr[0]['column']]);
    \session()->put([$module.'_orderDir' => $orderArr[0]['dir']]);
    \session()->put([$module.'_length' => \request()->get("length")]);
    \session()->put([$module.'_start' => \request()->get("start")]);
}
function customIndexAttr($module, $data)
{
    $data['orderClm'] = session()->get($module.'_orderClm');
    $data['orderDir'] =  session()->get($module.'_orderDir');
    $data['length'] =  session()->get($module.'_length');
    $data['start'] =  session()->get($module.'_start');
    return $data;
}
function customSession($module,$data,$length = 25)
{
    $goto = session()->get($module.'_goto');
    $data['orderClm'] = '0';
    $data['orderDir'] = "desc";
    $data['length'] = $length;
    $data['start'] = 0;

    if(!empty($goto))
    {
        $data = customIndexAttr($module, $data);
    }
    return $data;
}
function customBackUrl($module, $list_url, $data)
{
    $goto = session()->get($module.'_goto');
    if(empty($goto))
    {
        $goto = $list_url;
    }
    $data["back_url"] = $goto;
    return $data;
}


function ApiCAllCURL($strRequestURL = '', $method = '')
{
    $result = array();

    if(!empty($strRequestURL))
    {
        $conn = curl_init($strRequestURL);
        curl_setopt( $conn, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $conn, CURLOPT_URL, $strRequestURL);

        // curl_setopt( $conn, CURLOPT_CONNECTTIMEOUT, 30 );
        // curl_setopt( $conn, CURLOPT_SSL_VERIFYPEER, false );
        // curl_setopt( $conn, CURLOPT_SSL_VERIFYHOST, 2 );
        // curl_setopt( $conn, CURLOPT_SSLVERSION, 1 );

        $output = curl_exec($conn);
        
        // $result = json_decode($output);
        // $result = object_to_array($result);
        if(is_object($output)) {
            $result =  object_to_array($output);
        } else if(isJson($output)) {
            $result =  json_decode($output, true);
        }
        // echo "\r\n==============Result=========";
        // print_r($result);
        // echo "\r\n==============Result=====End";
        // $info    = curl_getinfo($conn);
        // echo "\r\n==============Information =========";
        // print_r($info);
        // echo "\r\n==============Information End=========";
        // die();
    }
    return $result;
}

function isJson($string) 
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}


function DownloadImageByCURL($url='', $username='', $password='')
{
    $result = array();
    if(!empty($url))
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        if(!empty($username) && !empty($password))
        {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        }
        $result = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        curl_close ($ch);
    }
    return $result;
}



function BridgeApiCAllCURL($strRequestURL = '', $method = '')
{
    $result = array();

    if(!empty($strRequestURL))
    {
        $conn = curl_init($strRequestURL);
        curl_setopt( $conn, CURLOPT_URL, $strRequestURL);
        curl_setopt( $conn, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $conn, CURLOPT_ENCODING, "" );
        curl_setopt( $conn, CURLOPT_MAXREDIRS, 10 );
        curl_setopt( $conn, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1 );
        curl_setopt($conn, CURLOPT_CUSTOMREQUEST, "GET");

        $output = curl_exec($conn);
        // $result = json_decode($output);
        // $result = object_to_array($result);
        if(is_object($output)) {
            $result =  object_to_array($output);
        } else if(isJson($output)) {
            $result =  json_decode($output, true);
        }
        // echo "\r\n==============Result=========";
        // print_r($result);
        // echo "\r\n==============Result=====End";
        // $info    = curl_getinfo($conn);
        // echo "\r\n==============Information =========";
        // print_r($info);
        // echo "\r\n==============Information End=========";
        // die();
    }
    return $result;
}

function getCategories()
{
    $categoryList = \App\Models\Categories::orderBy("category_name")->pluck("category_name","id")->all();
    return $categoryList;
}