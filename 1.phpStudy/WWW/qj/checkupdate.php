<?php
$data = array (
  'code' => 0,
  'message' => '操作成功',
  'data' => 
  array (
    'is_new' => 0,
    'is_force' => 0,
    'loading' => '',
    'game_version' => '',
    'is_browser_style' => false,
    'xwalk_url' => 'http://g.hgame.com/gameclient/cqsj_20160106.apk',
  ),
);

header("Content-type:application/json; charset=utf-8");  

echo json_encode($data);
