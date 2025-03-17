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
            'style' => 'seamless',
        ]);

        $themeOptions
            ->setLocation('options_page', '==', 'theme-options');

        $themeOptions
            ->addTab('general', ['label' => 'General Settings'])
            ->addTrueFalse('use_megamenu', [
                'label' => 'Use Mega Menu',
                'instructions' => 'Enable the advanced mega menu navigation',
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => [
                    'class' => 'feature-toggle-option',
                ],
            ]);
            
        // Add other theme options as needed
        
        return $themeOptions->build();
    }
}
