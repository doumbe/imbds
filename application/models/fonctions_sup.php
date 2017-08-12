<?php
public function error_response($error)
{
switch ($error) {
        case UPLOAD_ERR_OK:
            $response = lang('error_upload_0'); 'There is no error, the file uploaded with success.';
            break;
        case UPLOAD_ERR_INI_SIZE:
            $response = lang('error_upload_1');'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $response = lang('error_upload_2');'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
            break;
        case UPLOAD_ERR_PARTIAL:
            $response = lang('error_upload_3');'The uploaded file was only partially uploaded.';
            break;
        case UPLOAD_ERR_NO_FILE:
            $response = lang('error_upload_4');'No file was uploaded.';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $response = lang('error_upload_5');'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $response = lang('error_upload_6');'Failed to write file to disk. Introduced in PHP 5.1.0.';
            break;
        case UPLOAD_ERR_EXTENSION:
            $response = lang('error_upload_7');'File upload stopped by extension. Introduced in PHP 5.2.0.';
            break;
        default:
            $response = lang('error_upload_8');'Unknown upload error';
            break;
           }
           echo $response;
}

?>