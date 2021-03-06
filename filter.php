<?php
/*
  Yahoo Firehose research interface
  Filtering section
  Homepage: http://github.com/codepo8/firehose-research
  Copyright (c)2010 Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
  include_once('keys.php');
  require_once('lib/OAuth/OAuth.php');
  require_once('lib/Yahoo/YahooOAuthApplication.class.php');
  $oauthapp = new YahooOAuthApplication($CONSUMER_KEY, $CONSUMER_SECRET, '');
  include_once('sources.php');
  include_once('renderers.php');

  $offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
  $args = array(
    'sent'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'moar'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'offset'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'sources'    => array(
      'filter'    => FILTER_SANITIZE_SPECIAL_CHARS,
      'flags'     => FILTER_REQUIRE_ARRAY, 
      'options'   => array('min_range' => 1)
    ),
    's'     => FILTER_SANITIZE_SPECIAL_CHARS
  );
  $_POST = filter_input_array(INPUT_POST, $args);
  if(!isset($_POST['sources'])){
    $_POST['sources'] = array();
  }
?>