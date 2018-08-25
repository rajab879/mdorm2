<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
    'font_path' => base_path('resources/fonts/'),
    // 'font_data' => [

    // 	// ...add as many as you want.
    // 	],
    'font_data' => [
        'cairo' => [
            'R'  => 'Cairo-Regular.ttf',    // regular font
            'B'  => 'Cairo-Bold.ttf',       // optional: bold font
            //'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            //'BI' => 'ExampleFont-Bold-Italic.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
        'lalezar' => [
            'R'  => 'lalezar-Regular.ttf',    // regular font
            //'B'  => 'Cairo-Bold.ttf',       // optional: bold font
            //'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            //'BI' => 'ExampleFont-Bold-Italic.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
        'tajawal' => [
            'R'  => 'Tajawal-Regular.ttf',    // regular font
            'B'  => 'Tajawal-Bold.ttf',       // optional: bold font
            //'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            //'BI' => 'ExampleFont-Bold-Italic.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]
        // ...add as many as you want.
    ],



];
