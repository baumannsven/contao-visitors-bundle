<?php

/**
 * Extension for Contao Open Source CMS, Copyright (C) 2005-2021 Leo Feyer
 * 
 * Visitors Banner - Backend DCA tl_visitors_category
 *
 * This is the data container array for table tl_visitors_category.
 *
 * @copyright  Glen Langer 2009..2022 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @licence    LGPL
 * @filesource
 * @see	       https://github.com/BugBuster1701/contao-visitors-bundle
 */

/**
 * Table tl_visitors_category 
 */
$GLOBALS['TL_DCA']['tl_visitors_category'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ctable'                      => array('tl_visitors'),
        'switchToEdit'                => true,
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id'  => 'primary'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('tag'),
            'format'                  => '%s',
            'label_callback'		  => array('BugBuster\Visitors\DcaVisitorsCategory', 'labelCallback'),
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['edit'],
                'href'                => 'table=tl_visitors',
                'icon'                => 'edit.gif',
                'attributes'          => 'class="contextmenu"'
            ),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.gif',
                'attributes'          => 'class="edit-header"'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . ($GLOBALS['TL_LANG']['tl_visitors_category']['deleteConfirm'] ?? null) . '\')) return false; Backend.getScrollOffset();"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            ),
            'stat' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_visitors_category']['stat'],
                'href'                => 'do=visitorstat',
                'icon'                => 'bundles/bugbustervisitors/iconVisitor.png'
            )
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('visitors_stat_protected', 'visitors_statreset_protected'),
        'default'                     => '{title_legend},title;{protected_stat_legend:hide},visitors_stat_protected;{protected_statreset_legend:hide},visitors_statreset_protected'
    ),

    // Subpalettes
    'subpalettes' => array
    (
        'visitors_stat_protected'      => 'visitors_stat_groups,visitors_stat_admins',
        'visitors_statreset_protected' => 'visitors_statreset_groups,visitors_statreset_admins'
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
                'sql'       => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
                'sql'       => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['title'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'sql'                     => "varchar(60) NOT NULL default ''",
            'eval'                    => array('mandatory'=>true, 'maxlength'=>60, 'tl_class'=>'w50')
        ),
        'visitors_stat_protected'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_stat_protected'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'sql'                     => "char(1) NOT NULL default ''",
            'eval'                    => array('submitOnChange'=>true)
        ),
        'visitors_stat_groups'          => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_stat_groups'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_user_group.name',
            'sql'                     => "varchar(255) NOT NULL default ''",
            'eval'                    => array('multiple'=>true)
        ),
        'visitors_stat_admins' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_stat_admins'],
            'inputType'               => 'checkbox',
            'eval'                    => array('disabled'=>true),
            'sql'				      => null,	
            'load_callback' => array
            (
                array('BugBuster\Visitors\DcaVisitorsCategory', 'getAdminCheckbox')
            )
        ),
        'visitors_statreset_protected' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_statreset_protected'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'sql'                     => "char(1) NOT NULL default ''",
            'eval'                    => array('submitOnChange'=>true)
        ),
        'visitors_statreset_groups'   => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_statreset_groups'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_user_group.name',
            'sql'                     => "varchar(255) NOT NULL default ''",
            'eval'                    => array('multiple'=>true)
        ),
        'visitors_statreset_admins'   => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_visitors_category']['visitors_statreset_admins'],
            'inputType'               => 'checkbox',
            'eval'                    => array('disabled'=>true),
            'sql'				      => null,
            'load_callback' => array
            (
                array('BugBuster\Visitors\DcaVisitorsCategory', 'getAdminCheckbox')
            )
        )
    )
);

