<?php
function template($templateFile, $controller)
{
    include($controller);
    $template = file_get_contents($templateFile);
    preg_match_all("/[^=]\{\w*\}/", $template, $GLOBALS['v']);
    preg_match_all("/for=\{\w*\}/", $template, $GLOBALS['arrays']);
    preg_match_all("/[^=]\{\w*\.\w*\}/", $template, $GLOBALS['arrayParam']);
    preg_match_all("/\{\w*\}/", implode("|", $GLOBALS['arrays'][0]), $arrayNames);
    preg_match_all("/\<.*?(for.*|\{\>$=\S*?)/", $template, $arrayTag);
    preg_match_all("/\<(?=\w)*.*for.*[\s|\w|\W]*/", $template, $GLOBALS['arrayContent']);

    foreach ($arrayTag[0] as $tag) {
        $GLOBALS['arrayTag'][] = preg_replace("/for=\{\w*\}|\s\>/", "", $tag);
    }
    foreach ($GLOBALS['v'][0] as $var) {
        $GLOBALS['v'][] = preg_replace("/\>/", "", $var);
        $phpVar[] = "$" . preg_replace("/\W/", "", $var);
    }
    foreach ($GLOBALS['arrays'][0] as $arr) {
        $phpArray[$arr] = "$" . preg_replace("/for|\W/", "", $arr);
    }
    $GLOBALS['v'] = array_slice($GLOBALS['v'], 1);
    $tag = array_slice($arrayTag, 1);
    $GLOBALS['arrayTag'] = $GLOBALS['arrayTag'][0];
    $arrayNames = preg_replace("/\{|\}/", "", $arrayNames[0]);
    $GLOBALS['tag'] = $tag[0];
    $GLOBALS['arrayOrigin'] = preg_replace("/\<|\>/", "", $GLOBALS['arrayParam'][0]);
    $GLOBALS['arrayParam'] =  preg_replace("/\s|\>|\"|\{|\}|\w*\./", "", $GLOBALS['arrayParam'][0]);

    var_dump($GLOBALS['v']);
    var_dump($arrayNames);
    var_dump($phpVar);
    var_dump($phpArray);
    var_dump($GLOBALS['arrayTag']);
    var_dump($tag);
    var_dump($GLOBALS['arrayParam']);
    var_dump($GLOBALS['arrayOrigin']);

    foreach ($phpVar as $var) {
        eval("\$GLOBALS['vars'][] =  json_encode($var,true);");
    }
    foreach ($phpArray as $k => $arr) {
        eval("\$GLOBALS['arrays'][] = json_encode($arr,true);");
    }
    $GLOBALS['arrays'] = (array_slice($GLOBALS['arrays'], 1));
    $GLOBALS['arrays'] = json_decode($GLOBALS['arrays'][0], true);

    var_dump($GLOBALS['vars']);
    var_dump($GLOBALS['arrays']);
    $GLOBALS['arrayContent'] = $GLOBALS['arrayContent'][0];
    var_dump($GLOBALS['arrayContent']);
    ob_start("render");

    include $templateFile;

    ob_get_flush();
}



function render($buffer)
{
    $buffer = preg_replace($GLOBALS['v'], $GLOBALS['vars'], $buffer);

    for ($j = 0; $j < count($GLOBALS['arrays']); $j++) {
        // $buffer.="[";
        $buffer .= preg_replace("/\>/", " ", $GLOBALS['arrayTag']) . $GLOBALS['arrayContent'][0];
        for ($i = 0; $i < count($GLOBALS['arrayParam']); $i++) {
            $buffer = preg_replace($GLOBALS['arrayOrigin'][$i], $GLOBALS['arrays'][$j][$GLOBALS['arrayParam'][$i]], $buffer);

            // $buffer .= "'".$GLOBALS['arrayParam'][$i]."'=>'".$GLOBALS['arrays'][$j][$GLOBALS['arrayParam'][$i]]."',";
        }
        // $buffer.="]<br>";
    }
    $buffer = preg_replace("/\"|\{|\}/", "", $buffer);
    return $buffer;
}

template("../vue/index.html", "../controller/c_index.php");