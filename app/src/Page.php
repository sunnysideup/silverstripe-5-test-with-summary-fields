<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Company;

class Page extends SiteTree
{
    private static $many_many = [
        'Companies' => Company::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Companies',
            GridField::create(
                'Companies',
                'Companies',
                $this->Companies(),
                GridFieldConfig_RecordEditor::create()
            )
        );

        return $fields;
    }
}
