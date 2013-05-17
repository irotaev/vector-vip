<?php
// Подключаю все JS из папки js/fullScripts
function include_from($dir, $ext='php', $path = ''){
$opened_dir = opendir($dir);

while ($element=readdir($opened_dir)){
$fext=substr($element,strlen($ext)*-1);
if(($element!='.') && ($element!='..') && ($fext==$ext)){
echo "<script type='text/javascript' src='$path/$element'></script>";
}
}
closedir($opened_dir);
}

include_from($_SERVER['DOCUMENT_ROOT'] .'/design/js/fullScripts', 'js', '/design/js/fullScripts');
