<?php

/*
 * jQuery File Upload Plugin PHP Example 5.7
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);

//require('upload.class.php');
//$upload_handler = new UploadHandler($options = array('image_versions' => array()));

header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Content-Disposition: inline; filename="files.json"');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Methods: OPTIONS, POST');
header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

function validate($uploaded_file, $file, $error, $index) {
    if ($error) {
        $file->error = $error;
        return false;
    }
    if (!$file->name) {
        $file->error = 'missingFileName';
        return false;
    }
    /* if (!preg_match($this->options['accept_file_types'], $file->name)) {
      $file->error = 'acceptFileTypes';
      return false;
      } */
    /* if ($uploaded_file && is_uploaded_file($uploaded_file)) {
      $file_size = filesize($uploaded_file);
      } else {
      $file_size = $_SERVER['CONTENT_LENGTH'];
      }
      if ($this->options['max_file_size'] && (
      $file_size > $this->options['max_file_size'] ||
      $file->size > $this->options['max_file_size'])
      ) {
      $file->error = 'maxFileSize';
      return false;
      }
      if ($this->options['min_file_size'] &&
      $file_size < $this->options['min_file_size']) {
      $file->error = 'minFileSize';
      return false;
      }
      if (is_int($this->options['max_number_of_files']) && (
      count($this->get_file_objects()) >= $this->options['max_number_of_files'])
      ) {
      $file->error = 'maxNumberOfFiles';
      return false;
      }
      list($img_width, $img_height) = @getimagesize($uploaded_file);
      if (is_int($img_width)) {
      if ($this->options['max_width'] && $img_width > $this->options['max_width'] ||
      $this->options['max_height'] && $img_height > $this->options['max_height']) {
      $file->error = 'maxResolution';
      return false;
      }
      if ($this->options['min_width'] && $img_width < $this->options['min_width'] ||
      $this->options['min_height'] && $img_height < $this->options['min_height']) {
      $file->error = 'minResolution';
      return false;
      }
      } */
    return true;
}

function handle_form_data($file, $index) {
    // Handle form data, e.g. $_REQUEST['description'][$index]
}

function trim_file_name($name, $type, $index) {
    // Remove path information and dots around the filename, to prevent uploading
    // into different directories or replacing hidden system files.
    // Also remove control characters and spaces (\x00..\x20) around the filename:
    $file_name = trim(basename(stripslashes($name)), ".\x00..\x20");
    // Add missing file extension for known image types:
    if (strpos($file_name, '.') === false &&
            preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
        $file_name .= '.' . $matches[1];
    }
    return $file_name;
}

function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null) {
    $file = new stdClass();
    $file->name = trim_file_name($name, $type, $index);
    $file->size = intval($size);
    $file->type = $type;
    if (validate($uploaded_file, $file, $error, $index)) {
        handle_form_data($file, $index);

        // !!
        $file_path = dirname($_SERVER['SCRIPT_FILENAME']).'/files/' . $file->name;

        clearstatcache();
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            // multipart/formdata uploads (POST method uploads)

            move_uploaded_file($uploaded_file, $file_path);
        } else {
            // Non-multipart uploads (PUT method support)
            file_put_contents(
                    $file_path, fopen('php://input', 'r'), $append_file ? FILE_APPEND : 0
            );
        }
        $file_size = filesize($file_path);
        if ($file_size === $file->size) {
            
        } else {
            unlink($file_path);
            $file->error = 'abort';
        }
        $file->size = $file_size;
    }
    return $file;
}

$options['param_name'] = "files";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
        break;
    /* case 'HEAD':
      case 'GET':
      $upload_handler->get();
      break; */
    case 'POST': {
            $upload = isset($_FILES[$options['param_name']]) ?
                    $_FILES[$options['param_name']] : null;
            $info = array();
            if ($upload && is_array($upload['tmp_name'])) {
                // param_name is an array identifier like "files[]",
                // $_FILES is a multi-dimensional array:
                foreach ($upload['tmp_name'] as $index => $value) {
                    $info[] = handle_file_upload(
                            $upload['tmp_name'][$index], isset($_SERVER['HTTP_X_FILE_NAME']) ?
                                    $_SERVER['HTTP_X_FILE_NAME'] : $upload['name'][$index], isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                                    $_SERVER['HTTP_X_FILE_SIZE'] : $upload['size'][$index], isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                                    $_SERVER['HTTP_X_FILE_TYPE'] : $upload['type'][$index], $upload['error'][$index], $index
                    );
                }
            } elseif ($upload || isset($_SERVER['HTTP_X_FILE_NAME'])) {
                // param_name is a single object identifier like "file",
                // $_FILES is a one-dimensional array:
                $info[] = handle_file_upload(
                        isset($upload['tmp_name']) ? $upload['tmp_name'] : null, isset($_SERVER['HTTP_X_FILE_NAME']) ?
                                $_SERVER['HTTP_X_FILE_NAME'] : (isset($upload['name']) ?
                                        $upload['name'] : null), isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                                $_SERVER['HTTP_X_FILE_SIZE'] : (isset($upload['size']) ?
                                        $upload['size'] : null), isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                                $_SERVER['HTTP_X_FILE_TYPE'] : (isset($upload['type']) ?
                                        $upload['type'] : null), isset($upload['error']) ? $upload['error'] : null
                );
            }
            header('Vary: Accept');
            $json = json_encode($info);
            $redirect = isset($_REQUEST['redirect']) ?
                    stripslashes($_REQUEST['redirect']) : null;
            if ($redirect) {
                header('Location: ' . sprintf($redirect, rawurlencode($json)));
                return;
            }
            if (isset($_SERVER['HTTP_ACCEPT']) &&
                    (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
                header('Content-type: application/json');
            } else {
                header('Content-type: text/plain');
            }
            echo $json;
        }
        break;
    /* case 'DELETE':
      $upload_handler->delete();
      break; */
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}
