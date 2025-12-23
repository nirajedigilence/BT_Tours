<?php

namespace App\Cms;

class Fullmenu
{
    public function getFullmenu(){
        $fullmenu = array(
//            array("name" => $configVars["news"], "open" => 2,           "menu_id" => "100", "url" => "#", "icon_class" => "mdi-newspaper", "submenu" => array(
//                array("name" => $configVars["news_articles"],            "menu_id" => "101", "url" => "news.php"),
//                array("name" => $configVars["news_categories"], "menu_id" => "102", "url" => "news_categories.php"),
//                array("name" => $configVars["news_authors"],         "menu_id" => "103", "url" => "news_authors.php"),
//            )

            array("name" => "Logout", "menu_id" => "400", "url" => "logout.php", "icon_class" => "mdi-logout", "submenu" => array())
        );
    }
}
