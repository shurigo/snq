<?
  define("PREFIX_PATH_404", "/");

  AddEventHandler("main", "OnAfterEpilog", "Prefix_FunctionName");

  function Prefix_FunctionName() {
    global $APPLICATION;

    // Check if we need to show the content of the 404 page
    if (!defined('ERROR_404') || ERROR_404 != 'Y') {
      return;
    }

    // Display the 404 page unless it is already being displayed
    if ($APPLICATION->GetCurPage() != PREFIX_PATH_404) {
      LocalRedirect('/collection/woman/', false, '301 Moved permanently');
      //header('X-Accel-Redirect: '.PREFIX_PATH_404);
      exit();
    }
  }
?>
