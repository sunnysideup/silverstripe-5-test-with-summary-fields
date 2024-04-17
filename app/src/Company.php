<?php


use SilverStripe\Assets\Image;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;

class Company extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Company';

    /**
     * @var string
     */
    private static $plural_name = 'Companies';

    /**
     * @var string
     */
    private static $table_name = 'Company';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
        'SortOrder' => 'Int',
    ];

    /**
     * @var array
     */
    private static $field_labels = [
        'Title' => 'Company Name',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Logo' => Image::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Logo',
    ];

    /**
     * @var string
     */
    private static $default_sort = '"SortOrder" ASC';

    /**
     * @var array
     */
    private static $summary_fields = [
        'Logo.CMSThumbnail' => 'Logo',
    ];

    /**
     * @var array
    //  */
    // private static $casting = [
    //     'Logo.CMSThumbnail' => 'HTMLText',
    // ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function getCMSValidator()
    {
        return new RequiredFields([
            'Title',
            'Logo',
        ]);
    }
}
