<?php
class Template {
  private $keyValueArray;

  function __construct() {
    $this->keyValueArray = array();
  }

  public function assign($key, $value) {
    $this->keyValueArray[$key] = $value;
  }

  public function display($file) {
    $content = file_get_contents($file);
    foreach ($this->keyValueArray as $k => $v) {
      $searcher = "{\$" . $k . "}";
      $content = str_replace($searcher, $v, $content);
    }
    echo $content;
  }
}
?>