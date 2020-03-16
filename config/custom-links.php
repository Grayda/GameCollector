<?php

return [
    'links' => [

        /*
         * '{TEXT}' => [
         *      '_icon'   => '{ICON}',
         *      '_url'    => '{URL}',    # Optional if _links is present
         *      '_target' => '{TARGET}',
         *      '_links'  => [           # Optional if _url is present
         *          '{TEXT}' => [
         *              '_url'    => '{URL}',
         *              '_target' => '{TARGET}',
         *          ]
         *          '{TEXT}' => [
         *              '_url'    => '{URL}',
         *              '_target' => '{TARGET}',
         *          ]
         *      ]
         * ]
         */

        'Links' => [
            '_links'  => [
                'User Dashboard' => [
                    '_url'    => '/home',
                    '_target' => '_blank'
                ],
                'Change Plan' => [
                    '_url'    => '/subscription/updateplan',
                    '_target' => '_blank'
                ],
                'Discord' => [
                    '_url'    => 'https://discord.gg/wUXqTRy',
                    '_target' => '_blank'
                ],
            ],
        ],

    ]
];
