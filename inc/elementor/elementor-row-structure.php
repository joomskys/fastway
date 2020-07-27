<?php
if(!function_exists('fastway_custom_section_presets')){
    add_filter('etc-custom-section/custom-presets', 'fastway_custom_section_presets');
    function fastway_custom_section_presets(){
        return [
            2 => [
                [
                    'preset' => [41, 58],
                ],
                [
                    'preset' => [33, 33, 33, 33, 33, 33],
                ],
            ],
            3 => [
                [
                    'preset' => [ 100, 50, 50 ],
                ],
            ],
            4 => [
                [
                    'preset' => [ 100, 33, 33, 33 ],
                ],
                [
                    'preset' => [ 50, 50, 50, 50 ],
                ]
            ],
            5 => [
                [
                    'preset' => [ 100, 50, 50, 50, 50 ],
                ],
            ],
            6 => [
                [
                    'preset' => [ 33, 33, 33, 33, 33, 33 ],
                ]
            ],
            7 => [
                [
                    'preset' => [ 100, 33, 33, 33, 33, 33, 33 ],
                ]
            ]
        ];
    }
}