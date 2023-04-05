<?php

class MediaController
{
  private function getErrorResponse($message)
  {
    http_response_code(404);
    print_r(json_encode([
      'status' => false,
      'message' => $message
    ]));
  }

  private function deleteDir($dirPath)
  {
    if (!is_dir($dirPath)) {
      throw new InvalidArgumentException("$dirPath must be a directory");
    }

    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
      $dirPath .= '/';
    }

    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
      if (is_dir($file)) {
        $this->deleteDir($file);
      } else {
        unlink($file);
      }
    }

    rmdir($dirPath);
  }

  public function uploadAction()
  {
    if (!isset($_FILES['file'])) {
      return $this->getErrorResponse('File is required!');
    }

    $maxsize = 102400;
    if (($_FILES['file']['size'] >= $maxsize) || !$_FILES["file"]["size"]) {
      return $this->getErrorResponse('File too large. File must be less than 100k');
    }

    $filename = $_FILES['file']['name'];
    $uploadDirectory = __DIR__ . '/../../../public_html/uploads';

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Use session id to allow one file per session
    $filename = md5(session_id());
    if ($ext) {
      $filename = $filename . '.' . $ext;
    }

    $filename = [
      date('Y'),
      date('m'),
      date('d'),
      $filename
    ];

    $filename = implode(DIRECTORY_SEPARATOR, $filename);

    $destinationTokens = [
      $uploadDirectory,
      $filename
    ];

    $destination = implode(DIRECTORY_SEPARATOR, $destinationTokens);

    clearstatcache();
    if (!file_exists(dirname($destination)) && !is_dir(dirname($destination))) {
      mkdir(dirname($destination), 0777, true);
    }

    foreach (glob($uploadDirectory . "/*", GLOB_ONLYDIR) as $year) {
      $onlyYear = basename($year);

      // Delete old years
      if (intval($onlyYear) < intval(date('Y'))) {
        $this->deleteDir($year);
      }

      foreach (glob($year . "/*", GLOB_ONLYDIR) as $month) {
        $onlyMonth = basename($month);

        // Delete old months
        if ($onlyYear == date('Y') && intval($onlyMonth) < intval(date('m'))) {
          $this->deleteDir($month);
        }

        foreach (glob($month . "/*", GLOB_ONLYDIR) as $day) {
          $onlyDay = basename($day);

          // Delete old days
          if ($onlyYear == date('Y') && $onlyMonth == date('m') && intval($onlyDay) < intval(date('d'))) {
            $this->deleteDir($day);
          }

          foreach (glob($day . "/*") as $userUploadedFile) {
            if (file_exists($userUploadedFile)) {

              // Delete hour old files
              if (time() > filemtime($userUploadedFile) + (60 * 60)) {
                unlink($userUploadedFile);
              }
            }
          }
        }
      }
    }

    $tmpname = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmpname, $destination);

    print_r(json_encode([
      'path' => 'uploads/' . $filename
    ]));
  }
}