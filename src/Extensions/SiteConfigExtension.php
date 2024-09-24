<?php

namespace LoveDuckie\SilverStripe\Robots\Extensions;

use LoveDuckie\SilverStripe\Robots\Models\RobotsRule;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
    private static array $has_many = [
        'RobotsRules' => RobotsRule::class,
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $gridFieldconf = GridFieldConfig_RelationEditor::create(10);
        $gridColumns = $gridFieldconf->getComponentByType(GridFieldDataColumns::class);
        $tabsToAdd = [];
        $gridColumns->setDisplayFields([
            'Title' => 'Title',
            'Description' => 'Description',
            'URL' => 'URL'
        ]);

        // Google Analytics
        $tabsToAdd[] = Tab::create(
            'Analytics',
            'Analytics',
            TextareaField::create('GoogleAnalyticsTagsMisc', 'Google Analytics Tags Miscellaneous'),
            GridField::create(
                'GoogleAnalyticsTags',
                'Analytics Tags',
                $this->owner->GoogleAnalyticsTags(),
                $gridFieldconf
            )
        );
    }
}
