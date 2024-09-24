<?php

namespace LoveDuckie\SilverStripe\Robots\Models;

use LoveDuckie\SilverStripe\Robots\Extensions\SiteConfigExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataObject;

class RobotsRule extends DataObject
{
    private static string $table_name = "RobotsRule";

    /*
     * The definitive list of user agent tokens to be used in the robots.txt file.
     */
    private static array $GoogleBotCrawlers = [
        "Googlebot",
        "Googlebot-News",
        "Googlebot-Image",
        "Googlebot-Video",
        "Google-InspectionTool",
        "Google-Other",
        "Googlebot-Mobile",
        "Google-Site-Verification",
        "Google-AdSense",
        "Google-Structured-Data-Testing-Tool",
        "AdsBot-Google",
        "Google-Favicon",
        "Google-AMPHTML",
        "Mediapartners-Google"
    ];

    private static array $db = [
        'UserAgent' => 'Varchar(["default" => "*"])'
    ];

    private static array $has_one = [
        'RobotsSiteConfigExtension' => SiteConfigExtension::class
    ];
}
