<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ThemeOptions extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $themeOptions = new FieldsBuilder('theme_options', [
            'title' => 'Theme Options',
            'menu_order' => 0,
        ]);

        $themeOptions
            ->setLocation('options_page', '==', 'theme-options');

        $themeOptions
            ->addTab('navigation', [
                'label' => 'Navigation',
            ])
            ->addTrueFalse('use_megamenu', [
                'label' => 'Use Mega Menu',
                'instructions' => 'Enable to use the mega menu navigation instead of the standard menu',
                'default_value' => 0,
                'ui' => 1,
            ]);

        return $themeOptions->build();
    }
}
