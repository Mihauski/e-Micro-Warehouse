<?php

return [

    /**
     *
     * Shared translations.
     *
     */
    'title' => 'Instalator eMicro Warehouse',
    'next' => 'Następny krok',
    'back' => 'Poprzedni',
    'finish' => 'Instaluj',
    'forms' => [
        'errorTitle' => 'Wystąpiły następujące błędy:',
    ],

    /**
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Witaj!',
        'title'   => 'Instalator eMicro Warehouse',
        'message' => 'Witaj! Ten instalator pomoże Ci zainstalować aplikację eMicro Warehouse. Przygotuj dane do bazy danych, wymyśl tytuł, jaki ma nosić Twoja strona i pomyśl o danych konta administratora, na które chcesz się zalogować po instalacji. Do dzieła!',
        'next'    => 'Sprawdź wymagania',
    ],

    /**
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Krok 1 | Wymagania systemowe',
        'title' => 'Wymagania serwera',
        'next'    => 'Sprawdź uprawnienia',
    ],

    /**
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Krok 2 | uprawnienia',
        'title' => 'Uprawnienia',
        'next' => 'Skonfiguruj środowisko',
    ],

    /**
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Krok 3 | Konfiguracja środowiska',
            'title' => 'Konfiguracja środowiska',
            'desc' => 'Wybierz w jaki sposób chcesz zmodyfikować plik konfiguracyjny <code>.env</code>. Zalecany: kreator instalacji.',
            'wizard-button' => 'kreator instalacji',
            'classic-button' => 'Ręczna edycja',
        ],
        'wizard' => [
            'templateTitle' => 'Krok 3 | Konfiguracja środowiska | Kreator instalacji',
            'title' => 'Kreator instalacji <code>.env</code>',
            'tabs' => [
                'environment' => 'Środowisko',
                'database' => 'Baza danych',
                'application' => 'Aplikacja'
            ],
            'form' => [
                'name_required' => 'Nazwa środowiska jest wymagana.',
                'app_name_label' => 'Nazwa aplikacji',
                'app_name_placeholder' => 'Nazwa aplikacji',
                'app_environment_label' => 'Środowisko aplikacji',
                'app_environment_label_local' => 'Serwer lokalny (zalecane)',
                'app_environment_label_developement' => 'Development',
                'app_environment_label_qa' => 'QA',
                'app_environment_label_production' => 'Produkcja',
                'app_environment_label_other' => 'Inne',
                'app_environment_placeholder_other' => 'Wpisz swoje środowisko...',
                'app_debug_label' => 'Debugowanie',
                'app_debug_label_true' => 'Tak',
                'app_debug_label_false' => 'Nie (zalecane)',
                'app_log_level_label' => 'Poziom debugowania',
                'app_log_level_label_debug' => 'debug (max)',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notice',
                'app_log_level_label_warning' => 'warning',
                'app_log_level_label_error' => 'error',
                'app_log_level_label_critical' => 'critical',
                'app_log_level_label_alert' => 'alert',
                'app_log_level_label_emergency' => 'emergency (min)',
                'app_url_label' => 'Adres aplikacji (np. http://mojastrona.pl)',
                'app_url_placeholder' => 'Adres aplikacji',
                'db_connection_label' => 'Typ połączenia z bazą danych',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Adres bazy danych',
                'db_host_placeholder' => 'Adres bazy danych',
                'db_port_label' => 'Port bazy danych',
                'db_port_placeholder' => 'Port bazy danych',
                'db_name_label' => 'Nazwa bazy danych',
                'db_name_placeholder' => 'Nazwa bazy danych',
                'db_username_label' => 'Użytkownik bazy danych',
                'db_username_placeholder' => 'Użytkownik bazy danych',
                'db_password_label' => 'Hasło bazy danych',
                'db_password_placeholder' => 'Hasło bazy danych',
                'username' => 'Nazwa konta administratora',
                'username_placeholder' => 'Nazwa konta administratora',
                'userpass' => 'Hasło konta administratora',
                'userpass_placeholder' => 'Hasło konta administratora',
                'useremail' => 'E-mail konta administratora',
                'useremail_placeholder' => 'E-mail konta administratora',

                'app_tabs' => [
                    'more_info' => 'Więcej informacji',
                    'broadcasting_title' => 'Broadcasting, Caching, Sesja, &amp; Kolejka',
                    'broadcasting_label' => 'Silnik broadcastingu',
                    'broadcasting_placeholder' => 'Silnik broadcastingu',
                    'cache_label' => 'Silnik cache',
                    'cache_placeholder' => 'Silnik cache',
                    'session_label' => 'Silnik sesji',
                    'session_placeholder' => 'Silnik sesji',
                    'queue_label' => 'Silnik kolejki',
                    'queue_placeholder' => 'Silnik kolejki',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Redis Password',
                    'redis_port' => 'Redis Port',

                    'mail_label' => 'Mail',
                    'mail_driver_label' => 'Silnik mailowy',
                    'mail_driver_placeholder' => 'Silnik mailowy',
                    'mail_host_label' => 'Host',
                    'mail_host_placeholder' => 'Host',
                    'mail_port_label' => 'Port',
                    'mail_port_placeholder' => 'Port',
                    'mail_username_label' => 'Użytkownik',
                    'mail_username_placeholder' => 'Użytkownik',
                    'mail_password_label' => 'Hasło',
                    'mail_password_placeholder' => 'Hasło',
                    'mail_encryption_label' => 'Szyfrowanie',
                    'mail_encryption_placeholder' => 'Szyfrowanie',

                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_palceholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_palceholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Skonfiguruj bazę danych',
                    'setup_application' => 'Skonfiguruj aplikację',
                    'install' => 'Zainstaluj',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Krok 3 | Konfiguracja środowiska | Edycja manualna',
            'title' => 'Manualna edycja środowiska',
            'save' => 'Zapisz .env',
            'back' => 'Użyj kreatora',
            'install' => 'Zapisz i zainstaluj',
        ],
        'success' => 'Twoje ustawienia pliku .env zostały zapisane.',
        'errors' => 'Nie można zapisać pliku .env, zrób to ręcznie.',
    ],

    'install' => 'Zainstaluj',

    /**
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'eMicro Warehouse zostało zainstalowane na ',
    ],

    /**
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Instalacja zakończona',
        'templateTitle' => 'Instalacja zakończona',
        'finished' => 'Aplikacja została pomyślnie zainstalowana.',
        'migration' => 'Migration &amp; Seed Log:',
        'console' => 'Log konsolowy:',
        'log' => 'Log instalacyjny:',
        'env' => 'Ostateczny plik .env:',
        'exit' => 'Kliknij aby zakończyć',
    ],

    /**
     *
     * Update specific translations
     *
     */
    'updater' => [
        /**
         *
         * Shared translations.
         *
         */
        'title' => 'Laravel Updater',

        /**
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Welcome To The Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /**
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => "Install Updates"
        ],

        /**
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'Laravel Installer successfully UPDATED on ',
        ],
    ],
];
