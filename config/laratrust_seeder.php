<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */

    'truncate_tables' => true,



    'roles_structure' => [
        // Roles :
                    'admin' =>
                         [
                        'users' => 'c,r,u,d',
                        'employees' => 'c,r,u,d',
                        'plans' => 'c,r,u,d',
                        'permissions' => 'c,r,u,d',
                        'login' => 'c',
                        'book-search' => 'r',
                        'activity-search' => 'r',
                        'lecture-search' => 'r',
                        'play-search' => 'r',

                            ],

                    'theatre-employee' =>
                         [
                        'lectures' => 'c,r,u,d',
                        'plays' => 'c,r,u,d',
                        'accept-lecture' => 'c,r,u,d',
                        'accept-play' => 'c,r,u,d',
                        'show-reservations' => 'c,r,u,d',
                        'login' => 'c',
                        'book-search' => 'r',
                        'activity-search' => 'r',
                        'lecture-search' => 'r',
                        'play-search' => 'r',
                            ],

                    'library-employee' =>
                         [
                            'books' => 'c,r,u,d',
                            'departments' => 'c,r,u,d',
                            'accept-books' => 'c,r,u,d',
                            'login' => 'c',
                            'book-search' => 'r',
                            'activity-search' => 'r',
                            'lecture-search' => 'r',
                            'play-search' => 'r',
                            ],

                    'activity-employee' =>
                         [
                            'activities' => 'c,r,u,d',
                            'general-reports' => 'c,r,u,d',
                            'accept-activities' => 'c,r,u,d',
                            'login' => 'c',
                            'book-search' => 'r',
                            'activity-search' => 'r',
                            'lecture-search' => 'r',
                            'play-search' => 'r',
                            ],

                    'teacher' =>
                         [
                        'give-lecture' => 'c,r,u,d',
                        'give-activity' => 'c,r,u,d',
                        'partial-report' => 'c,r,u,d',
                        'login' => 'c',
                        'book-search' => 'r',
                        'activity-search' => 'r',
                        'lecture-search' => 'r',
                        'play-search' => 'r',
                            ],

                    'user' =>
                         [
                        'show history' => 'r',
                        'borrow-book' => 'c,r,',
                        'attend-lecture' => 'c,r',
                        'attend-play' => 'c,r',
                        'rating' => 'c,r,u',
                        'attend-activity' => 'c,r,u,d',
                        'resgister' => 'c',
                        'login' => 'c',

                        'advertisements' => 'r',
                        'books' => 'r',
                        'lectures' => 'r',
                        'plays' => 'r',
                        'activities' => 'r',
                        'book-search' => 'r',
                        'activity-search' => 'r',
                        'lecture-search' => 'r',
                        'play-search' => 'r',

                            ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
