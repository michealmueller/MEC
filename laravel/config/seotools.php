<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "CitizenWarfare", // set false to total remove
            'description'  => 'The premier event site for Star Citizen, We are trying to bring players and organizations together to create Co-operation and fun!', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Star Citizen', 'Events', 'Event Manager', 'Organizations', 'Around the Verse', 'Citizenwarfare', 'Community', 'Robert Space Industries'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'CitizenWarfare', // set false to total remove
            'description' => 'The premier event site for Star Citizen, We are trying to bring players and organizations together to create Co-operation and fun!', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => null,
            'site_name'   => 'CitizenWarfare',
            'images'      => ['https://citizenwarfare.com/storage/app/logos/Citizen_Warfare_Logo_White.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'      => 'summary',
            'title'     => 'CitizenWarfare - Home',
            //'site'    => '@LuizVinicius73',
            'creator'   => '@arthmael86',
        ],
    ],
];
