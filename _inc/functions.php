<?php /*
* Project Name: Workspace
* Author: Minan
* Version: 1.0
* Description: Open Source Workspace
*/

/*
@name: get_url
@description: This function will give the URL of the site URL
@developer: Minan
@date: 28-12-2015
@update_date: NULL
*/

function get_url()
{
  $url = 'http://'.$_SERVER['SERVER_NAME'].'/space';
  return $url;
}

/*
@name: note_upload
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function note_upload($file_name, $description)
{
  $file = @fopen($file_name.'.txt', 'w');
  chmod($file_name.'.txt', 0777);
  $description_trim = trim($description);
  fwrite($file, $description_trim);
}

/*
@name: note_upload
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function note_update($file_name, $description)
{
  $file = @fopen('note/'.$file_name, 'w');
  $description_trim = trim($description);
  fwrite($file, $description_trim);
}

/*
@name: note_install
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function note_install($file)
{
  $read = @file('note/'.$file);
  for($i = 0; $i < count($read); $i++){
    echo $read[$i];
  }
}

/*
@name: code_install
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function code_install($file)
{
  $read = @file($file);
  for($i = 0; $i < count($read); $i++){
    echo $read[$i];
  }
}

/*
@name: code_update
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function code_update($file_name, $description)
{
  $file = @fopen($file_name, 'w');
  fwrite($file, $description);
}

/*
@name: extension
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/
function extension($file)
{
  $i = pathinfo($file);
  return $i['extension'];
}

/*
@name: file
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/

function file_save($file_name, $dir){
  if($file_name)
  {
    $file_name == mysql_escape_string(strip_tags(trim($file_name)));
    if($file = @fopen($dir.'/'.$file_name, 'w'))
    {
      if(chmod($dir.'/'.$file_name, 0777))
      {
        return 'true';
      }
      else
      {
        return 'Dosya izinleri verilemedi!';
      }
    }
    else
    {
      return 'Ana Dizinde Erişim Yok!';
    }
  }
  else
  {
    return 'Dosya adını Boş Bırakmayınız';
  }
}


/*
@name: folder_save
@developer: Minan
@date: 31-12-2015
@update_date: NULL
*/

function folder_save($dir){
  if($dir)
  {
    if(mkdir($dir, 0777))
    {
      if(chmod($dir, 0777))
      {
        return $dir;
      }
      else
      {
        return 'Klasör izni Verilemedi!';
      }
    }
    else
    {
      return 'Ana Dizinde Erişim Yok!';
    }
  }
  else
  {
    return 'Klasör adını Boş Bırakmayınız';
  }
}

/*
@name: extension_search
@developer: Minan
@date: 26-04-2016
@update_date: NULL
*/
function codeMirror_script($file)
{
  $extension = end(explode('.',$file));
  if($extension == 'html')
  {
    return "htmlmixed";
  }
  elseif($extension == 'css')
  {
    return "css";
  }
  elseif($extension == 'php')
  {
    return "php";
  }
  else
  {
    return "javascript";
  }
}


/*
@name: get_alert
@developer: Minan
@date: 09-02-2016
@update_date: NULL
*/

function get_alert($message, $type)
{
  echo "<div id='alert' class='alert ". $type."'>". $message ."</div>";
}


/*
@name: get_editor_script
@developer: Minan
@date: 24-03-2016
@update_date: NULL
*/
function get_editor_script()
{
  return '<link rel="stylesheet" href="lib/codemirror.css">
  <script src="lib/codemirror.js"></script>
  <script src="addon/selection/selection-pointer.js"></script>
  <script src="mode/xml/xml.js"></script>
  <script src="mode/javascript/javascript.js"></script>
  <script src="mode/htmlmixed/htmlmixed.js"></script>
  <script src="mode/css/css.js"></script>
  <script src="mode/clike/clike.js"></script>
  <script src="mode/php/php.js"></script>
  <script src="mode/vbscript/vbscript.js"></script>
  <script src="mode/htmlmixed/htmlmixed.js"></script>
  <script src="keymap/sublime.js"></script>
  <link rel="stylesheet" href="theme/monokai.css">
  <link rel="stylesheet" href="'.get_url()  .'/theme/css/panel.css">';
}


function get_file_css()
{
  return '<link rel="stylesheet" href="'. get_url()  .'/theme/css/file.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="'.get_url()  .'/theme/css/bootstrap.css">';
}
/*
@name: get_calendar_script
@developer: Minan
@date: 24-03-2016
@update_date: NULL
*/
function get_calendar_script()
{
  return '<!-- calendar css -->
  <link rel="stylesheet" href="'.get_url()  .'/theme/css/fullcalendar.min.css">
  <!-- calendar css -->
  <link rel="stylesheet" href="'.get_url()  .'/theme/css/fullcalendar.print.css" media="print">
  <script src="'.get_url()  .'/theme/js/moment.min.js"></script>
  <script src="'.get_url()  .'/theme/js/fullcalendar.min.js"></script>';
}


/*
@name: is_login
@developer: Minan
@date: 24-03-2016
@update_date: NULL
*/

function is_login()
{
  if($_SESSION['login'] == true)
  {

  }else
  {
    header("Location: ". get_url() ."/lockscreen.php");
  }
}


class DirectoryListing {
  /*
  ====================================================================================================
  Evoluted Directory Listing Script - Version 4
  www.evoluted.net / info@evoluted.net
  ====================================================================================================

  SYSTEM REQUIREMENTS
  ====================================================================================================
  This script requires a PHP version 5.3 or above (5.6 is the recommended minimum) along with the GD
  library if you wish to use the thumbnail/image preview functionality. For (optional) unzip
  functionality, you'll need the ZipArchive php extension.

  HOW TO USE
  ====================================================================================================
  1) Unzip the provided files.
  2) Upload the index.php file to the directory you wish to use the script on
  3) Browse to the directory to see the script in action
  4) Optionally change any of the settings below

  CONFIGURATION
  ====================================================================================================
  You may edit any of the variables in this section to alter how the directory listing script will
  function. Please read the notes above each variable for details on what they change.
  */

  // The top level directory where this script is located, or alternatively one of it's sub-directories
  public $startDirectory = '../.././';

  // An optional title to show in the address bar and at the top of your page (set to null to leave blank)
  public $pageTitle = 'Evoluted Directory Listing Script';

  // The URL of this script. Optionally set if your server is unable to detect the paths of files
  public $includeUrl = false;

  // If you've enabled the includeUrl parameter above, enter the full url to the directory the index.php file
  // is located in here, followed by a forward slash.
  public $directoryUrl = '';

  // Set to true to list all sub-directories and allow them to be browsed
  public $showSubDirectories = true;

  // Set to true to open all file links in a new browser tab
  public $openLinksInNewTab = true;

  // Set to true to show thumbnail previews of any images
  public $showThumbnails = true;

  // Set to true to allow new directories to be created.
  public $enableDirectoryCreation = true;

  // Set to true to allow file uploads (NOTE: you should set a password if you enable this!)
  public $enableUploads = true;

  // Enable multi-file uploads (NOTE: This makes use of javascript libraries hosted by Google so an internet connection is required.)
  public $enableMultiFileUploads = true;

  // Set to true to overwrite files on the server if they have the same name as a file being uploaded
  public $overwriteOnUpload = false;

  // Set to true to enable file deletion options
  public $enableFileDeletion = true;

  // Set to true to enable directory deletion options (only available when the directory is empty)
  public $enableDirectoryDeletion = true;

  // List of all mime types that can be uploaded. Full list of mime types: http://www.iana.org/assignments/media-types/media-types.xhtml
  public $allowedUploadMimeTypes = array(
    'image/jpeg',
    'image/gif',
    'image/png',
    'image/bmp',
    'audio/mpeg',
    'audio/mp3',
    'audio/mp4',
    'audio/x-aac',
    'audio/x-aiff',
    'audio/x-ms-wma',
    'audio/midi',
    'audio/ogg',
    'video/ogg',
    'video/webm',
    'video/quicktime',
    'video/x-msvideo',
    'video/x-flv',
    'video/h261',
    'video/h263',
    'video/h264',
    'video/jpeg',
    'text/plain',
    'text/html',
    'text/css',
    'text/csv',
    'text/calendar',
    'application/pdf',
    'application/x-pdf',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // MS Word (modern)
    'application/msword',
    'application/vnd.ms-excel',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // MS Excel (modern)
    'application/zip',
    'application/x-tar',
    'text/php',
    'text/x-php',
    'application/php',
    'application/x-php',
    'application/x-httpd-php',
    'application/x-httpd-php-source',

  );

  // Set to true to unzip any zip files that are uploaded (note - will overwrite files of the same name!)
  public $enableUnzipping = true;

  // If you've enabled unzipping, you can optionally delete the original zip file after its uploaded by setting this to true.
  public $deleteZipAfterUploading = false;

  // The Evoluted Directory Listing Script uses Bootstrap. By setting this value to true, a nicer theme will be loaded remotely.
  // Setting this to false will make the directory listing script use the default bootstrap style, loaded locally.
  public $enableTheme = true;

  // Set to true to require a password be entered before being able to use the script
  public $passwordProtect = false;

  // The password to require to use this script (only used if $passwordProtect is set to true)
  public $password = 'password';

  // Optional. Allow restricted access only to whitelisted IP addresses
  public $enableIpWhitelist = false;

  // List of IP's to allow access to the script (only used if $enableIpWhitelist is true)
  public $ipWhitelist = array(
    '127.0.0.1'
  );

  // File extensions to block from showing in the directory listing
  public $ignoredFileExtensions = array(
    'ini',
  );

  // File names to block from showing in the directory listing
  public $ignoredFileNames = array(
    '.htaccess',
    '.DS_Store',
    'Thumbs.db',
  );

  // Directories to block from showing in the directory listing
  public $ignoredDirectories = array(

  );

  // Files that begin with a dot are usually hidden files. Set this to false if you wish to show these hiden files.
  public $ignoreDotFiles = true;

  // Works the same way as $ignoreDotFiles but with directories.
  public $ignoreDotDirectories = true;

  /*
  ====================================================================================================
  You shouldn't need to edit anything below this line unless you wish to add functionality to the
  script. You should only edit this area if you know what you are doing!
  ====================================================================================================
  */
  private $__previewMimeTypes = array(
    'image/gif',
    'image/jpeg',
    'image/png',
    'image/bmp'
  );

  private $__currentDirectory = null;

  private $__fileList = array();

  private $__directoryList = array();

  private $__debug = true;

  public $sortBy = 'name';

  public $sortableFields = array(
    'name',
    'size',
    'modified'
  );

  private $__sortOrder = 'asc';

  public function __construct() {
    define('DS', '/');
  }

  public function run() {
    if ($this->enableIpWhitelist) {
      $this->__ipWhitelistCheck();
    }

    $this->__currentDirectory = $this->startDirectory;

    // Sorting
    if (isset($_GET['order']) && in_array($_GET['order'], $this->sortableFields)) {
      $this->sortBy = $_GET['order'];
    }

    if (isset($_GET['sort']) && ($_GET['sort'] == 'asc' || $_GET['sort'] == 'desc')) {
      $this->__sortOrder = $_GET['sort'];
    }

    if (isset($_GET['dir'])) {
      if (isset($_GET['delete']) && $this->enableDirectoryDeletion) {
        $this->deleteDirectory();
      }

      $this->__currentDirectory = $_GET['dir'];
      return $this->__display();
    } elseif (isset($_GET['preview'])) {
      $this->__generatePreview($_GET['preview']);
    } else {
      return $this->__display();
    }
  }

  public function login() {
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if ($password === $this->password) {
      $_SESSION['evdir_loggedin'] = true;
      unset($_SESSION['evdir_loginfail']);
    } else {
      $_SESSION['evdir_loginfail'] = true;
      unset($_SESSION['evdir_loggedin']);

    }
  }

  public function upload() {
    $files = $this->__formatUploadArray($_FILES['upload']);

    if ($this->enableUploads) {
      if ($this->enableMultiFileUploads) {
        foreach ($files as $file) {
          $status = $this->__processUpload($file);
        }
      } else {
        $file = $files[0];
        $status = $this->__processUpload($file);
      }

      return $status;
    }
    return false;
  }

  private function __formatUploadArray($files) {
    $fileAry = array();
    $fileCount = count($files['name']);
    $fileKeys = array_keys($files);

    for ($i = 0; $i < $fileCount; $i++) {
      foreach ($fileKeys as $key) {
        $fileAry[$i][$key] = $files[$key][$i];
      }
    }

    return $fileAry;
  }

  private function __processUpload($file) {
    if (isset($_GET['dir'])) {
      $this->__currentDirectory = $_GET['dir'];
    }

    if (! $this->__currentDirectory) {
      $filePath = realpath($this->startDirectory);
    } else {
      $this->__currentDirectory = str_replace('..', '', $this->__currentDirectory);
      $this->__currentDirectory = ltrim($this->__currentDirectory, "/");
      $filePath = realpath($this->__currentDirectory);
    }

    $filePath = $filePath . DS . $file['name'];

    if (! empty($file)) {

      if (! $this->overwriteOnUpload) {
        if (file_exists($filePath)) {
          return 2;
        }
      }

      if (! in_array(mime_content_type($file['tmp_name']), $this->allowedUploadMimeTypes)) {
        return 3;
      }

      move_uploaded_file($file['tmp_name'], $filePath);

      if (mime_content_type($filePath) == 'application/zip' && $this->enableUnzipping && class_exists('ZipArchive')) {

        $zip = new ZipArchive;
        $result = $zip->open($filePath);
        $zip->extractTo(realpath($this->__currentDirectory));
        $zip->close();

        if ($this->deleteZipAfterUploading) {
          // Delete the zip file
          unlink($filePath);
        }


      }

      return true;
    }
  }

  public function deleteFile() {
    if (isset($_GET['deleteFile'])) {
      $file = $_GET['deleteFile'];

      // Clean file path
      $file = str_replace('..', '', $file);
      $file = ltrim($file, "/");

      // Work out full file path
      $filePath = __DIR__ . $this->__currentDirectory . '/' . $file;

      if (file_exists($filePath) && is_file($filePath)) {
        return unlink($filePath);
      }
      return false;
    }
  }

  public function deleteDirectory() {
    if (isset($_GET['dir'])) {
      $dir = $_GET['dir'];
      // Clean dir path
      $dir = str_replace('..', '', $dir);
      $dir = ltrim($dir, "/");

      // Work out full directory path
      $dirPath = __DIR__ . '/' . $dir;

      if (file_exists($dirPath) && is_dir($dirPath)) {

        $iterator = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
          if ($file->isDir()) {
            rmdir($file->getRealPath());
          } else {
            unlink($file->getRealPath());
          }
        }
        return rmdir($dir);
      }
    }
    return false;
  }

  public function createDirectory() {
    if ($this->enableDirectoryCreation) {
      $directoryName = $_POST['directory'];

      // Convert spaces
      $directoryName = str_replace(' ', '_', $directoryName);

      // Clean up formatting
      $directoryName = preg_replace('/[^\w-_]/', '', $directoryName);

      if (isset($_GET['dir'])) {
        $this->__currentDirectory = $_GET['dir'];
      }

      if (! $this->__currentDirectory) {
        $filePath = realpath($this->startDirectory);
      } else {
        $this->__currentDirectory = str_replace('..', '', $this->__currentDirectory);
        $filePath = realpath($this->__currentDirectory);
      }

      $filePath = $filePath . DS . strtolower($directoryName);

      if (file_exists($filePath)) {
        return false;
      }

      return mkdir($filePath, 0755);

    }
    return false;
  }

  public function sortUrl($sort) {

    // Get current URL parts
    $urlParts = parse_url($_SERVER['REQUEST_URI']);

    $url = '';

    if (isset($urlParts['scheme'])) {
      $url = $urlParts['scheme'] . '://';
    }

    if (isset($urlParts['host'])) {
      $url .= $urlParts['host'];
    }

    if (isset($urlParts['path'])) {
      $url .= $urlParts['path'];
    }


    // Extract query string
    if (isset($urlParts['query'])) {
      $queryString = $urlParts['query'];

      parse_str($queryString, $queryParts);

      // work out if we're already sorting by the current heading
      if (isset($queryParts['order']) && $queryParts['order'] == $sort) {
        // Yes we are, just switch the sort option!
        if (isset($queryParts['sort'])) {
          if ($queryParts['sort'] == 'asc') {
            $queryParts['sort'] = 'desc';
          } else {
            $queryParts['sort'] = 'asc';
          }
        }
      } else {
        $queryParts['order'] = $sort;
        $queryParts['sort'] = 'asc';
      }

      // Now convert back to a string
      $queryString = http_build_query($queryParts);

      $url .= '?' . $queryString;
    } else {
      $order = 'asc';
      if ($sort == $this->sortBy) {
        $order = 'desc';
      }
      $queryString = 'order=' . $sort . '&sort=' . $order;
      $url .= '?' . $queryString;
    }

    return $url;
  }

  public function sortClass($sort) {
    $class = $sort . '_';

    if ($this->sortBy == $sort) {
      if ($this->__sortOrder == 'desc') {
        $class .= 'desc sort_desc';
      } else {
        $class .= 'asc sort_asc';
      }
    } else {
      $class = '';
    }
    return $class;
  }

  private function __ipWhitelistCheck() {
    // Get the users ip
    $userIp = $_SERVER['REMOTE_ADDR'];

    if (! in_array($userIp, $this->ipWhitelist)) {
      header('HTTP/1.0 403 Forbidden');
      die('Your IP address (' . $userIp . ') is not authorized to access this file.');
    }
  }

  private function __display() {
    if ($this->__currentDirectory != '.' && !$this->__endsWith($this->__currentDirectory, DS)) {
      $this->__currentDirectory = $this->__currentDirectory . DS;
    }

    return $this->__loadDirectory($this->__currentDirectory);
  }

  private function __loadDirectory($path) {
    $files = $this->__scanDir($path);

    if (! empty($files)) {
      // Strip excludes files, directories and filetypes
      $files = $this->__cleanFileList($files);
      foreach ($files as $file) {
        $filePath = realpath($this->__currentDirectory . DS . $file);

        if ($this->__isDirectory($filePath)) {

          if (! $this->includeUrl) {
            $urlParts = parse_url($_SERVER['REQUEST_URI']);

            $dirUrl = '';

            if (isset($urlParts['scheme'])) {
              $dirUrl = $urlParts['scheme'] . '://';
            }

            if (isset($urlParts['host'])) {
              $dirUrl .= $urlParts['host'];
            }

            if (isset($urlParts['path'])) {
              $dirUrl .= $urlParts['path'];
            }
          } else {
            $dirUrl = $this->directoryUrl;
          }

          if ($this->__currentDirectory != '' && $this->__currentDirectory != '.') {
            $dirUrl .= '?dir=' . rawurlencode($this->__currentDirectory) . rawurlencode($file);
          } else {
            $dirUrl .= '?dir=' . rawurlencode($file);
          }

          $this->__directoryList[$file] = array(
            'name' => rawurldecode($file),
            'path' => $filePath,
            'type' => 'dir',
            'url' => $dirUrl
          );
        } else {
          $this->__fileList[$file] = $this->__getFileType($filePath, $this->__currentDirectory . DS . $file);
        }
      }
    }

    if (! $this->showSubDirectories) {
      $this->__directoryList = null;
    }

    $data = array(
      'currentPath' => $this->__currentDirectory,
      'directoryTree' => $this->__getDirectoryTree(),
      'files' => $this->__setSorting($this->__fileList),
      'directories' => $this->__directoryList,
      'requirePassword' => $this->passwordProtect,
      'enableUploads' => $this->enableUploads
    );

    return $data;
  }

  private function __setSorting($data) {
    $sortOrder = '';
    $sortBy = '';

    // Sort the files
    if ($this->sortBy == 'name') {
      function compareByName($a, $b) {
        return strnatcasecmp($a['name'], $b['name']);
      }

      usort($data, 'compareByName');
      $this->soryBy = 'name';
    } elseif ($this->sortBy == 'size') {
      function compareBySize($a, $b) {
        return strnatcasecmp($a['size_bytes'], $b['size_bytes']);
      }

      usort($data, 'compareBySize');
      $this->soryBy = 'size';
    } elseif ($this->sortBy == 'modified') {
      function compareByModified($a, $b) {
        return strnatcasecmp($a['modified'], $b['modified']);
      }

      usort($data, 'compareByModified');
      $this->soryBy = 'modified';
    }

    if ($this->__sortOrder == 'desc') {
      $data = array_reverse($data);
    }
    return $data;
  }

  private function __scanDir($dir) {
    // Prevent browsing up the directory path.

    if ($dir == '/') {
      $dir = $this->startDirectory;
      $this->__currentDirectory = $dir;
    }

    $strippedDir = str_replace('/', '', $dir);

    $dir = ltrim($dir, "/");

    // Prevent listing blacklisted directories
    if (in_array($strippedDir, $this->ignoredDirectories)) {
      return false;
    }

    if (! file_exists($dir) || !is_dir($dir)) {
      return false;
    }

    return scandir($dir);
  }

  private function __cleanFileList($files) {
    $this->ignoredDirectories[] = '.';
    $this->ignoredDirectories[] = '..';
    foreach ($files as $key => $file) {

      // Remove unwanted directories
      if ($this->__isDirectory(realpath($file)) && in_array($file, $this->ignoredDirectories)) {
        unset($files[$key]);
      }

      // Remove dot directories (if enables)
      if ($this->ignoreDotDirectories && substr($file, 0, 1) === '.') {
        unset($files[$key]);
      }

      // Remove unwanted files
      if (! $this->__isDirectory(realpath($file)) && in_array($file, $this->ignoredFileNames)) {
        unset($files[$key]);
      }
      // Remove unwanted file extensions
      if (! $this->__isDirectory(realpath($file))) {

        $info = pathinfo(mb_convert_encoding($file, 'UTF-8', 'UTF-8'));

        if (isset($info['extension'])) {
          $extension = $info['extension'];

          if (in_array($extension, $this->ignoredFileExtensions)) {
            unset($files[$key]);
          }
        }

        // If dot files want ignoring, do that next
        if ($this->ignoreDotFiles) {

          if (substr($file, 0, 1) == '.') {
            unset($files[$key]);
          }
        }
      }
    }
    return $files;
  }

  private function __isDirectory($file) {
    if ($file == $this->__currentDirectory . DS . '.' || $file == $this->__currentDirectory . DS . '..') {
      return true;
    }
    $file = mb_convert_encoding($file, 'UTF-8', 'UTF-8');

    if (filetype($file) == 'dir') {
      return true;
    }

    return false;
  }

  /**
   * __getFileType
   *
   * Returns the formatted array of file data used for thre directory listing.
   *
   * @param  string $filePath Full path to the file
   * @return array   Array of data for the file
   */
  private function __getFileType($filePath, $relativePath = null) {
    $fi = new finfo(FILEINFO_MIME_TYPE);

    if (! file_exists($filePath)) {
      return false;
    }

    $type = $fi->file($filePath);

    $filePathInfo = pathinfo($filePath);

    $fileSize = filesize($filePath);

    $fileModified = filemtime($filePath);

    $filePreview = false;

    // Check if the file type supports previews
    if ($this->__supportsPreviews($type) && $this->showThumbnails) {
      $filePreview = true;
    }

    return array(
      'name' => $filePathInfo['basename'],
      'extension' => (isset($filePathInfo['extension']) ? $filePathInfo['extension'] : null),
      'dir' => $filePathInfo['dirname'],
      'path' => $filePath,
      'relativePath' => $relativePath,
      'size' => $this->__formatSize($fileSize),
      'size_bytes' => $fileSize,
      'modified' => $fileModified,
      'type' => 'file',
      'mime' => $type,
      'url' => $this->__getUrl($filePathInfo['basename']),
      'preview' => $filePreview,
      'target' => ($this->openLinksInNewTab ? '_blank' : '_parent')
    );
  }

  private function __supportsPreviews($type) {
    if (in_array($type, $this->__previewMimeTypes)) {
      return true;
    }
    return false;
  }

  /**
   * __getUrl
   *
   * Returns the url to the file.
   *
   * @param  string $file filename
   * @return string   url of the file
   */
  private function __getUrl($file) {
    if (! $this->includeUrl) {
      $dirUrl = $_SERVER['REQUEST_URI'];

      $urlParts = parse_url($_SERVER['REQUEST_URI']);

      $dirUrl = '';

      if (isset($urlParts['scheme'])) {
        $dirUrl = $urlParts['scheme'] . '://';
      }

      if (isset($urlParts['host'])) {
        $dirUrl .= $urlParts['host'];
      }

      if (isset($urlParts['path'])) {
        $dirUrl .= $urlParts['path'];
      }
    } else {
      $dirUrl = $this->directoryUrl;
    }

    if ($this->__currentDirectory != '.') {
      $dirUrl = $dirUrl . $this->__currentDirectory;
    }
    return $dirUrl . rawurlencode($file);
  }

  private function __getDirectoryTree() {
    $dirString = $this->__currentDirectory;
    $directoryTree = array();

    $directoryTree['../.././'] = 'htdocs';

    if (substr_count($dirString, '/') >= 0) {
      $items = explode("/", $dirString);
      $items = array_filter($items);
      $path = '';
      foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
          continue;
        }
        $path .= rawurlencode($item) . '/';
        $directoryTree[$path] = $item;
      }
    }

    $directoryTree = array_filter($directoryTree);

    return $directoryTree;
  }

  private function __endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
  }

  private function __generatePreview($filePath) {
    $file = $this->__getFileType($filePath);

    if ($file['mime'] == 'image/jpeg') {
      $image = imagecreatefromjpeg($file['path']);
    } elseif ($file['mime'] == 'image/png') {
      $image = imagecreatefrompng($file['path']);
    } elseif ($file['mime'] == 'image/gif') {
      $image = imagecreatefromgif($file['path']);
    } else {
      die();
    }

    $oldX = imageSX($image);
    $oldY = imageSY($image);

    $newW = 250;
    $newH = 250;

    if ($oldX > $oldY) {
      $thumbW = $newW;
      $thumbH = $oldY * ($newH / $oldX);
    }
    if ($oldX < $oldY) {
      $thumbW = $oldX * ($newW / $oldY);
      $thumbH = $newH;
    }
    if ($oldX == $oldY) {
      $thumbW = $newW;
      $thumbH = $newW;
    }

    header('Content-Type: ' . $file['mime']);

    $newImg = ImageCreateTrueColor($thumbW, $thumbH);

    imagecopyresampled($newImg, $image, 0, 0, 0, 0, $thumbW, $thumbH, $oldX, $oldY);

    if ($file['mime'] == 'image/jpeg') {
      imagejpeg($newImg);
    } elseif ($file['mime'] == 'image/png') {
      imagepng($newImg);
    } elseif ($file['mime'] == 'image/gif') {
      imagegif($newImg);
    }
    imagedestroy($newImg);
    die();
  }

  private function __formatSize($bytes) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return round($bytes, 2) . ' ' . $units[$pow];
  }

}

$listing = new DirectoryListing();

$successMsg = null;
$errorMsg = null;

if (isset($_POST['password'])) {
  $listing->login();

  if (isset($_SESSION['evdir_loginfail'])) {
    $errorMsg = 'Login Failed! Please check you entered the correct password an try again.';
    unset($_SESSION['evdir_loginfail']);
  }

} elseif (isset($_FILES['upload'])) {
  $uploadStatus = $listing->upload();
  if ($uploadStatus == 1) {
    $successMsg = 'Your file was successfully uploaded!';
  } elseif ($uploadStatus == 2) {
    $errorMsg = 'Your file could not be uploaded. A file with that name already exists.';
  } elseif ($uploadStatus == 3) {
    $errorMsg = 'Your file could not be uploaded as the file type is blocked.';
  }
} elseif (isset($_POST['directory'])) {
  if ($listing->createDirectory()) {
    $successMsg = 'Directory Created!';
  } else {
    $errorMsg = 'There was a problem creating your directory.';
  }
} elseif (isset($_GET['deleteFile']) && $listing->enableFileDeletion) {
  if ($listing->deleteFile()) {
    $successMsg = 'The file was successfully deleted!';
  } else {
    $errorMsg = 'The selected file could not be deleted. Please check your file permissions and try again.';
  }
} elseif (isset($_GET['dir']) && isset($_GET['delete']) && $listing->enableDirectoryDeletion) {
  if ($listing->deleteDirectory()) {
    $successMsg = 'The directory was successfully deleted!';
    unset($_GET['dir']);
  } else {
    $errorMsg = 'The selected directory could not be deleted. Please check your file permissions and try again.';
  }
}

$data = $listing->run();

function pr($data, $die = false) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';

  if ($die) {
    die();
  }
}





?>
