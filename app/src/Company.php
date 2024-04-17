<?php


use SilverStripe\Assets\Image;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBField;

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
    private static $summary_fields = [
        'Logo.CMSThumbnail' => 'Logo from CMSThumbnail',
        'Logo.StripThumbnail' => 'Logo from StripThumbnail',
        'LogoTest' => 'Logo from html',
    ];

    /**
     * @var array
     */
    private static $casting = [
        'LogoTest' => 'HTMLText',
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

    public function getLogoTest()
    {
        return DBField::create_field('HTMLText', '<img src="' . $this->Logo()->Link() . '">');
    }
}
