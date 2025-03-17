<?php

namespace App\Packages\MegaMenu;

use StoutLogic\AcfBuilder\FieldsBuilder;

class MenuFields
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $menuFields = new FieldsBuilder('menu_item_fields');

        $menuFields
            ->setLocation('nav_menu_item', '==', 'all');

        $menuFields
            ->addText('category', [
                'label' => 'Category',
                'instructions' => 'Group this menu item under a category in the megamenu (optional)',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'instructions' => 'Short description to display under the menu item',
                'rows' => 2,
                'new_lines' => 'br',
            ])
            ->addImage('featured_image', [
                'label' => 'Featured Image',
                'instructions' => 'Image to show in the megamenu (for parent items)',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ])
            ->addWysiwyg('featured_text', [
                'label' => 'Featured Text',
                'instructions' => 'Content to show in the featured section (for parent items)',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ]);

        return $menuFields->build();
    }
}
