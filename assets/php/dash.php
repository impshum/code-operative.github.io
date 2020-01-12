<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require('../vendor/autoload.php');

use Pagerange\Markdown\MetaParsedown;

$uber_parsedown = new MetaParsedown();


function get_md($uber_parsedown, $md_fname)
{
    $md_file = fopen($md_fname, "r") or die("Unable to open file!");
    $md_data = fread($md_file, filesize($md_fname));
    fclose($md_file);
    $md_meta = $uber_parsedown->meta($md_data);
    $results = array('md_meta' => $uber_parsedown->meta($md_data), 'md_markdown' => ltrim($uber_parsedown->stripMeta($md_data)));
    return $results;
}


function get_md_data($uber_parsedown, $p_id, $p_type)
{
    $p_file = "assets/md/$p_type/$p_id.md";
    $p_data = get_md($uber_parsedown, dirname(__DIR__, 2)."/".$p_file);
    return json_encode($p_data);
}

if (isset($_POST['mode'])) {
    $mode = $_POST['mode'];
    if ($mode == 'edit') {
        if (isset($_POST['p_id']) && isset($_POST['p_type'])) {
            $p_id = $_POST['p_id'];
            $p_type = $_POST['p_type'];
            echo get_md_data($uber_parsedown, $p_id, $p_type);
        }
    } elseif ($mode == 'save') {
        if (isset($_POST['p_id']) && isset($_POST['p_type'])) {
            $p_id = $_POST['p_id'];
            $p_type = $_POST['p_type'];
            $title = "title: " . $_POST['title'] . "\n";
            $name = "name: " . $_POST['name'] . "\n";
            $url = "url: " . $_POST['url'] . "\n";
            $icon = "icon: " . $_POST['icon'] . "\n";
            $image = "image: " . $_POST['image'] . "\n";
            $md_content = $_POST['content'];
            $meta = $title . $name . $url . $icon . $image;
            $p_file = "../md/$p_type/$p_id.md";
            $content = "---
$meta
---
$md_content";
            $fp = fopen($p_file, 'w');
            $r = fwrite($fp, $content);
            fclose($fp);
            echo $r;
        }
    }
}
