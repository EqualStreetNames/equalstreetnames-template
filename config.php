<?php

declare(strict_types=1);

return [
    // Relation ID of the OpenstreetMap City
    'relationId' => 0,

    // Languages in which you want to extract Wiki informations
    'languages' => ['en'],

    // Exclude datas from beeing extracted. Usefull to exclude streets at the edge of the city for example
    'exclude' => [
        'relation' => [],
        'way' => [
            /*
            15221322, // Half Included street
            */
        ],
    ],

    // Manualy assign gender to ways/relations (when there are no wikidata page for example)
    'gender' => [
        'relation' => [],
        'way' => [
            /*
            '12121212' => 'F', // Pia Mancini road
            '13131312' => 'M', // Mister nobody Street
            */
        ],
    ],

    // Array that defines what instances of Wikidata are considered "a person". (you can probably leave this as is)
    'instances' => [
        'Q5'        => true,  // human
        'Q2985549'  => true,  // mononymous person
        'Q20643955' => true,  // human biblical figure

        'Q8436'     => false, // family
        'Q101352'   => false, // family name
        'Q327245'   => false, // team
        'Q3046146'  => false, // married couple
        'Q13417114' => false, // noble family
    ],
];
