<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

require('assets/vendor/autoload.php');

use Pagerange\Markdown\MetaParsedown;

$uber_parsedown = new MetaParsedown();

function is_logged_in()
{
    if (isset($_SESSION['user_data']['username'])) {
        return true;
    }
    return false;
}


function get_md($uber_parsedown, $md_fname)
{
    $md_file = fopen($md_fname, "r") or die("Unable to open file!");
    $md_data = fread($md_file, filesize($md_fname));
    fclose($md_file);
    $md_meta = $uber_parsedown->meta($md_data);
    $results = array('md_meta' => $uber_parsedown->meta($md_data), 'md_content' => $uber_parsedown->text($md_data));
    return $results;
}


function get_sections($uber_parsedown)
{
    $md_sections = glob("assets/md/sections/" . "*.md", GLOB_BRACE);

    foreach ($md_sections as $md_section) {
        $results = get_md($uber_parsedown, $md_section);
        $title = $results['md_meta']['title'];
        $icon = $results['md_meta']['icon'];
        $image = $results['md_meta']['image'];
        $content = $results['md_content'];
        $section = "
        <section class='section'>
          <div class='container'>
            <div class='columns rev-col'>
              <div class='column is-10'>
                <div class='content'>
                  <h1 class='title load-me'><i class='fas fa-sm fa-$icon'></i>&nbsp;&nbsp;$title</h1>
                  $content
                </div>
              </div>
              <div class='column is-2 has-text-centered ass'>
                <img src='$image'>
              </div>
            </div>
          </div>
        </section>
        ";
        echo $section;
    }
}


function get_clients($uber_parsedown)
{
    $md_clients = glob("assets/md/clients/" . "*.md", GLOB_BRACE);

    echo "
    <section class='section'>
      <div class='container'>
        <h1 class='title'><i class='fas fa-sm fa-user-friends'></i>&nbsp;&nbsp;Clients</h1>
        <div class='clients-logos'>
    ";

    foreach ($md_clients as $md_client) {
        $results = get_md($uber_parsedown, $md_client);
        $title = $results['md_meta']['title'];
        $url = $results['md_meta']['url'];
        $image = $results['md_meta']['image'];
        $client = "<div class='slide'><a href='$url'><img src='$image' alt='$title'></a></div>";
        echo $client;
    }

    echo "
        </div>
      </div>
    </section>
    ";
}


function get_community($uber_parsedown)
{
    $md_clients = glob("assets/md/community/" . "*.md", GLOB_BRACE);

    echo "
    <section class='section'>
      <div class='container'>
        <h1 class='title'><i class='fas fa-sm fa-users'></i>&nbsp;&nbsp;Community</h1>
        <div class='columns is-multiline'>
    ";

    foreach ($md_clients as $md_client) {
        $results = get_md($uber_parsedown, $md_client);
        $title = $results['md_meta']['title'];
        $url = $results['md_meta']['url'];
        $image = $results['md_meta']['image'];
        $content = $results['md_content'];
        $client = "
        <div class='column is-4'>
          <a href='$url'>
            <img src='$image' alt='$title'>
          </a>
          $content
        </div>
        ";
        echo $client;
    }

    echo "
        </div>
      </div>
    </section>
    ";
}


function get_members($uber_parsedown)
{
    $md_members = glob("assets/md/members/" . "*.md", GLOB_BRACE);

    echo "
    <section class='section'>
      <div class='container'>
        <div class='content'>
          <h1 class='title'><i class='fas fa-sm fa-users'></i>&nbsp;&nbsp;Members</h1>
        </div>
    ";

    foreach ($md_members as $md_member) {
        $results = get_md($uber_parsedown, $md_member);
        $name = $results['md_meta']['name'];
        $url = $results['md_meta']['url'];
        $image = $results['md_meta']['image'];
        $content = $results['md_content'];
        $section = "
        <article class='media'>
          <figure class='media-left'>
            <img src='$image'>
          </figure>
          <div class='media-content'>
            <div class='content'>
              <p>
                <strong>$name</strong>&nbsp;&nbsp;<a href='$url'><i class='fas fa-xs fa-external-link-alt lonk'></i></a>
                <br>
                $content
              </p>
            </div>
          </div>
        </article>
        ";
        echo $section;
    }

    echo "
      </div>
    </section>
    ";
}


function dash_list($uber_parsedown, $part)
{
    $part_title = ucfirst($part);
    $all_parts = glob("assets/md/$part/" . "*.md", GLOB_BRACE);

    echo "
    <div class='content'>
      <h1 class='title load-me'><i class='fas fa-xs fa-layer-group'></i>&nbsp;&nbsp;$part_title</h1>
    </div>
    <div class='list-lot'>
    ";

    foreach ($all_parts as $p) {
        $results = get_md($uber_parsedown, $p);
        if ($part == "members") {
            $title = $results['md_meta']['name'];
        } else {
            $title = $results['md_meta']['title'];
        }
        $image = $results['md_meta']['image'];
        $p_parts = pathinfo($p);
        $p_id = (int)$p_parts['filename'];
        echo "
            <div class='box edit' data-p_id='$p_id' data-p_type='$part'>
              <div class='is-pulled-right'><i class='far fa-xs fa-trash-alt'></i></div>
              <article class='media'>
              <img class='list-image' src='$image'>
                &nbsp;<strong>$title</strong>
              </article>
            </div>
            ";
    }
    echo "</div>";
}
