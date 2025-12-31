<?php

/**
 * =============================================================================
 * KRAYIN CRM - PLIK TŁUMACZENIOWY NA JĘZYK POLSKI
 * =============================================================================
 * 
 * Autor: PB MEDIA Online
 * Wersja: 2.1.x
 * Data: 2025-01-01
 * 
 * LOKALIZACJA PLIKU:
 * packages/Webkul/Admin/src/Resources/lang/pl/app.php
 * 
 * INSTRUKCJE WDROŻENIA:
 * 1. Utwórz katalog: packages/Webkul/Admin/src/Resources/lang/pl/
 * 2. Skopiuj ten plik jako app.php do utworzonego katalogu
 * 3. W pliku config/app.php dodaj 'pl' => 'Polski' do tablicy 'available_locales'
 * 4. Wyczyść cache: php artisan config:clear && php artisan cache:clear
 * 5. W Settings > General > Locale Settings wybierz "Polski"
 * 
 * =============================================================================
 */

return [

    /*
    |--------------------------------------------------------------------------
    | ACL (Access Control List) - Kontrola dostępu
    |--------------------------------------------------------------------------
    */
    'acl' => [
        'leads'           => 'Szanse sprzedaży',
        'lead'            => 'Szansa sprzedaży',
        'quotes'          => 'Oferty',
        'mail'            => 'Poczta',
        'inbox'           => 'Skrzynka odbiorcza',
        'draft'           => 'Szkice',
        'outbox'          => 'Wysłane',
        'sent'            => 'Wysłane',
        'trash'           => 'Kosz',
        'activities'      => 'Aktywności',
        'contacts'        => 'Kontakty',
        'persons'         => 'Osoby',
        'organizations'   => 'Organizacje',
        'products'        => 'Produkty',
        'settings'        => 'Ustawienia',
        'groups'          => 'Grupy',
        'roles'           => 'Role',
        'users'           => 'Użytkownicy',
        'pipelines'       => 'Ścieżki sprzedaży',
        'sources'         => 'Źródła',
        'types'           => 'Typy',
        'email-templates' => 'Szablony email',
        'workflows'       => 'Automatyzacje',
        'webhooks'        => 'Webhooki',
        'tags'            => 'Etykiety',
        'attributes'      => 'Atrybuty',
        'campaigns'       => 'Kampanie',
        'events'          => 'Wydarzenia',
        'warehouses'      => 'Magazyny',
        'configuration'   => 'Konfiguracja',
        'dashboard'       => 'Panel główny',
        'create'          => 'Utwórz',
        'edit'            => 'Edytuj',
        'view'            => 'Podgląd',
        'print'           => 'Drukuj',
        'delete'          => 'Usuń',
        'export'          => 'Eksportuj',
        'mass-delete'     => 'Usuwanie masowe',
        'mass-update'     => 'Aktualizacja masowa',
        'data-transfer'   => 'Transfer danych',
        'imports'         => 'Importy',
    ],

    /*
    |--------------------------------------------------------------------------
    | UŻYTKOWNICY - Logowanie, rejestracja, resetowanie hasła
    |--------------------------------------------------------------------------
    */
    'users' => [
        'login' => [
            'title'                => 'Logowanie',
            'email'                => 'Adres email',
            'password'             => 'Hasło',
            'btn-login'            => 'Zaloguj się',
            'submit-btn'           => 'Zaloguj się',
            'forgot-password'      => 'Zapomniałeś hasła?',
            'forget-password-link' => 'Zapomniałeś hasła?',
            'remember-me'          => 'Zapamiętaj mnie',
            'login-to-continue'    => 'Zaloguj się, aby kontynuować',
        ],

        'forget-password' => [
            'title'           => 'Przypomnienie hasła',
            'email'           => 'Adres email',
            'btn-submit'      => 'Wyślij link',
            'submit-btn'      => 'Wyślij link resetowania',
            'back-to-login'   => 'Powrót do logowania',
            'page-title'      => 'Zapomniałeś hasła?',
            'footer-note'     => 'Podaj swój adres email, a wyślemy Ci link do zresetowania hasła.',
            'email-not-exist' => 'Podany adres email nie istnieje w systemie.',
            'success'         => 'Link do resetowania hasła został wysłany na Twój adres email.',
            'create-password' => 'Utwórz nowe hasło',
        ],

        'reset-password' => [
            'title'            => 'Resetowanie hasła',
            'email'            => 'Zarejestrowany email',
            'password'         => 'Hasło',
            'confirm-password' => 'Potwierdź hasło',
            'btn-submit'       => 'Resetuj hasło',
            'submit-btn'       => 'Resetuj hasło',
            'back-to-login'    => 'Powrót do logowania',
            'reset-link-sent'  => 'Link do resetowania hasła został wysłany.',
            'password-changed' => 'Hasło zostało pomyślnie zmienione.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | KONTO UŻYTKOWNIKA
    |--------------------------------------------------------------------------
    */
    'account' => [
        'title'                => 'Moje konto',
        'edit'                 => 'Edytuj',
        'save-btn'             => 'Zapisz zmiany',
        'general'              => 'Ogólne',
        'name'                 => 'Imię i nazwisko',
        'email'                => 'Email',
        'phone'                => 'Telefon',
        'timezone'             => 'Strefa czasowa',
        'image'                => 'Zdjęcie profilowe',
        'change-password'      => 'Zmień hasło',
        'current-password'     => 'Aktualne hasło',
        'password'             => 'Nowe hasło',
        'confirm-password'     => 'Potwierdź nowe hasło',
        'wrong-password'       => 'Nieprawidłowe aktualne hasło.',
        'password-same'        => 'Nowe hasło musi być inne niż aktualne.',
        'password-changed'     => 'Hasło zostało pomyślnie zmienione.',
        'update-success'       => 'Dane konta zostały zaktualizowane.',
        'invalid-password'     => 'Nieprawidłowe hasło.',
        'upload-image'         => 'Prześlij zdjęcie',
        'remove-image'         => 'Usuń zdjęcie',
        'upload-image-info'    => 'Prześlij zdjęcie profilowe (110px x 110px) w formacie PNG lub JPG',
    ],

    /*
    |--------------------------------------------------------------------------
    | KOMPONENTY UI
    |--------------------------------------------------------------------------
    */
    'components' => [
        'activities' => [
            'actions' => [
                'mail' => [
                    'title'           => 'Wyślij wiadomość',
                    'btn-add'         => 'Utwórz wiadomość',
                    'btn-add-icon'    => 'Utwórz wiadomość',
                    'compose-mail'    => 'Napisz wiadomość',
                    'to'              => 'Do',
                    'cc'              => 'DW',
                    'bcc'             => 'UDW',
                    'subject'         => 'Temat',
                    'send-btn'        => 'Wyślij',
                    'message'         => 'Treść wiadomości',
                    'draft'           => 'Zapisz jako szkic',
                    'attach-file'     => 'Załącz plik',
                    'attached-files'  => 'Załączniki',
                ],

                'file' => [
                    'title'           => 'Plik',
                    'btn-add'         => 'Dodaj plik',
                    'btn-add-icon'    => 'Dodaj plik',
                    'save-btn'        => 'Zapisz plik',
                    'name'            => 'Nazwa pliku',
                    'description'     => 'Opis',
                    'file'            => 'Plik',
                    'upload-btn'      => 'Wybierz plik',
                    'uploaded-files'  => 'Przesłane pliki',
                ],

                'note' => [
                    'title'       => 'Notatka',
                    'btn-add'     => 'Dodaj notatkę',
                    'btn-add-icon'=> 'Dodaj notatkę',
                    'save-btn'    => 'Zapisz notatkę',
                    'comment'     => 'Komentarz',
                ],

                'activity' => [
                    'title'            => 'Aktywność',
                    'btn-add'          => 'Dodaj aktywność',
                    'btn-add-icon'     => 'Dodaj aktywność',
                    'save-btn'         => 'Zapisz aktywność',
                    'edit-btn'         => 'Edytuj',
                    'name'             => 'Nazwa',
                    'type'             => 'Typ',
                    'call'             => 'Rozmowa telefoniczna',
                    'meeting'          => 'Spotkanie',
                    'lunch'            => 'Lunch',
                    'schedule-from'    => 'Zaplanuj od',
                    'schedule-to'      => 'Zaplanuj do',
                    'from'             => 'Od',
                    'to'               => 'Do',
                    'location'         => 'Lokalizacja',
                    'participants'     => 'Uczestnicy',
                    'add-participants' => 'Dodaj uczestników',
                    'comment'          => 'Komentarz',
                    'description'      => 'Opis',
                    'is-done'          => 'Zakończone',
                    'mark-as-done'     => 'Oznacz jako zakończone',
                    'schedule'         => 'Harmonogram',
                    'duration'         => 'Czas trwania',
                    'empty-title'      => 'Brak zaplanowanych aktywności',
                    'empty-info'       => 'Brak informacji o aktywności',
                ],
            ],

            'index' => [
                'from'           => 'od',
                'to'             => 'do',
                'all'            => 'Wszystkie',
                'calls'          => 'Rozmowy',
                'meetings'       => 'Spotkania',
                'lunches'        => 'Lunche',
                'files'          => 'Pliki',
                'quotes'         => 'Oferty',
                'notes'          => 'Notatki',
                'emails'         => 'Emaile',
                'planned'        => 'Zaplanowane',
                'is-done'        => 'Zakończone',
                'today'          => 'Dzisiaj',
                'empty-title'    => 'Brak aktywności',
                'by-user'        => 'przez :user',
                'scheduled-on'   => 'Zaplanowane na',
                'overdue'        => 'Po terminie',
                'done'           => 'Wykonane',
            ],
        ],

        'media' => [
            'images' => [
                'add-image-btn'       => 'Dodaj zdjęcie',
                'allowed-types'       => 'Dozwolone formaty: png, jpeg, jpg, webp, gif',
                'drag-drop'           => 'Przeciągnij i upuść pliki lub kliknij, aby przeglądać',
                'not-allowed-error'   => 'Tylko pliki graficzne (.jpeg, .jpg, .png, ..) są dozwolone.',
            ],

            'videos' => [
                'add-video-btn'       => 'Dodaj wideo',
                'allowed-types'       => 'Dozwolone formaty: mp4, webm, mkv',
                'drag-drop'           => 'Przeciągnij i upuść pliki lub kliknij, aby przeglądać',
                'not-allowed-error'   => 'Tylko pliki wideo (.mp4, .webm, .mkv) są dozwolone.',
            ],
        ],

        'datagrid' => [
            'toolbar' => [
                'mass-actions' => [
                    'select-action'       => 'Wybierz akcję',
                    'mass-update'         => 'Aktualizacja masowa',
                    'mass-delete'         => 'Usuwanie masowe',
                    'delete'              => 'Usuń',
                    'update'              => 'Aktualizuj',
                    'submit'              => 'Zastosuj',
                ],

                'filter' => [
                    'title'         => 'Filtry',
                    'clear-all'     => 'Wyczyść wszystkie',
                    'apply'         => 'Zastosuj filtry',
                    'apply-filter'  => 'Zastosuj filtr',
                    'apply-filters' => 'Zastosuj filtry',
                    'custom'        => 'Własny',
                    'save-filter'   => 'Zapisz filtr',
                    'saved-filters' => 'Zapisane filtry',
                    'create-new'    => 'Utwórz nowy',
                    'quick-filters' => 'Szybkie filtry',
                    'clear'         => 'Wyczyść',
                ],

                'search' => [
                    'title'       => 'Szukaj',
                    'placeholder' => 'Szukaj...',
                ],

                'perPage' => 'Na stronie',
            ],

            'filters' => [
                'select'            => 'Wybierz',
                'drop-down-option'  => 'Opcja',
                'title'             => 'Filtruj',
                'custom-filters'    => 'Filtry niestandardowe',
                'columns'           => 'Kolumny',
                'conditions'        => 'Warunki',
                'condition'         => 'Warunek',
                'value'             => 'Wartość',
                'apply'             => 'Zastosuj',
                'add-filter'        => 'Dodaj filtr',
                'contains'          => 'Zawiera',
                'ncontains'         => 'Nie zawiera',
                'equals'            => 'Równa się',
                'nequals'           => 'Nie równa się',
                'greater'           => 'Większe niż',
                'less'              => 'Mniejsze niż',
                'greater-equals'    => 'Większe lub równe',
                'less-equals'       => 'Mniejsze lub równe',
                'true'              => 'Prawda',
                'false'             => 'Fałsz',

                'boolean-options' => [
                    'true'  => 'Tak',
                    'false' => 'Nie',
                ],

                'date-options' => [
                    'today'             => 'Dzisiaj',
                    'yesterday'         => 'Wczoraj',
                    'tomorrow'          => 'Jutro',
                    'this-day'          => 'Ten dzień',
                    'this-week'         => 'Ten tydzień',
                    'this-month'        => 'Ten miesiąc',
                    'this-year'         => 'Ten rok',
                    'last-month'        => 'Poprzedni miesiąc',
                    'last-3-months'     => 'Ostatnie 3 miesiące',
                    'last-6-months'     => 'Ostatnie 6 miesięcy',
                    'interval'          => 'Przedział',
                ],

                'dropdown' => [
                    'searchable' => [
                        'atleast-two-chars' => 'Wpisz min. 2 znaki...',
                        'no-results'        => 'Brak wyników...',
                    ],
                ],
            ],

            'table' => [
                'actions'               => 'Akcje',
                'delete'                => 'Usuń',
                'edit'                  => 'Edytuj',
                'view'                  => 'Podgląd',
                'no-records-available'  => 'Brak dostępnych rekordów.',
                'no-results-found'      => 'Nie znaleziono wyników.',
            ],

            'index' => [
                'create-btn'    => 'Utwórz nowy',
                'must-one-row'  => 'Musisz wybrać przynajmniej jeden wiersz, aby wykonać akcję masową.',
            ],
        ],

        'modal' => [
            'confirm' => [
                'title'         => 'Czy na pewno?',
                'message'       => 'Czy na pewno chcesz wykonać tę akcję?',
                'agree-btn'     => 'Tak',
                'disagree-btn'  => 'Nie',
            ],

            'delete' => [
                'title'         => 'Potwierdzenie usunięcia',
                'message'       => 'Czy na pewno chcesz usunąć ten element?',
                'agree-btn'     => 'Usuń',
                'disagree-btn'  => 'Anuluj',
            ],
        ],

        'tags' => [
            'index' => [
                'title'        => 'Etykiety',
                'create-btn'   => 'Utwórz etykietę',
                'add-tag'      => 'Dodaj ":term"...',
                'save-btn'     => 'Zapisz etykietę',
                'placeholder'  => 'Wpisz nazwę etykiety',
                'added'        => 'Etykieta została dodana',
                'removed'      => 'Etykieta została usunięta',
            ],

            'create' => [
                'name'            => 'Nazwa',
                'color'           => 'Kolor',
                'colors'          => [
                    'default'     => 'Domyślny',
                    'red'         => 'Czerwony',
                    'blue'        => 'Niebieski',
                    'green'       => 'Zielony',
                    'yellow'      => 'Żółty',
                    'orange'      => 'Pomarańczowy',
                    'purple'      => 'Fioletowy',
                    'pink'        => 'Różowy',
                    'teal'        => 'Turkusowy',
                    'gray'        => 'Szary',
                ],
            ],
        ],

        'layouts' => [
            'header' => [
                'mega-search' => [
                    'title'            => 'Wyszukiwarka',
                    'placeholder'      => 'Szukaj szans, kontaktów, produktów...',
                    'sku'              => 'SKU: :sku',
                    'tabs' => [
                        'leads'         => 'Szanse sprzedaży',
                        'quotes'        => 'Oferty',
                        'products'      => 'Produkty',
                        'persons'       => 'Osoby',
                        'organizations' => 'Organizacje',
                        'settings'      => 'Ustawienia',
                        'configuration' => 'Konfiguracja',
                    ],

                    'explore-all-leads'         => 'Przeglądaj wszystkie szanse sprzedaży',
                    'explore-all-quotes'        => 'Przeglądaj wszystkie oferty',
                    'explore-all-products'      => 'Przeglądaj wszystkie produkty',
                    'explore-all-persons'       => 'Przeglądaj wszystkie osoby',
                    'explore-all-organizations' => 'Przeglądaj wszystkie organizacje',
                    'explore-all-matching'      => 'Przeglądaj wszystkie pasujące wyniki dla ":query"',
                    'no-results'                => 'Brak wyników',
                ],

                'notification' => [
                    'title'              => 'Powiadomienia',
                    'view-all'           => 'Zobacz wszystkie',
                    'no-notification'    => 'Brak nowych powiadomień',
                    'mark-all-as-read'   => 'Oznacz wszystkie jako przeczytane',
                ],

                'profile' => [
                    'title'     => 'Profil',
                    'my-account'=> 'Moje konto',
                    'sign-out'  => 'Wyloguj się',
                    'logout'    => 'Wyloguj',
                ],
            ],

            'sidebar' => [
                'dashboard'      => 'Panel główny',
                'leads'          => 'Szanse sprzedaży',
                'quotes'         => 'Oferty',
                'mail'           => 'Poczta',
                'activities'     => 'Aktywności',
                'contacts'       => 'Kontakty',
                'products'       => 'Produkty',
                'settings'       => 'Ustawienia',
                'configuration'  => 'Konfiguracja',
                'persons'        => 'Osoby',
                'organizations'  => 'Organizacje',
                'warehouses'     => 'Magazyny',
            ],

            'footer' => [
                'powered-by' => 'Napędzane przez :app',
            ],
        ],

        'attributes' => [
            'lookup' => [
                'click-add'   => 'Kliknij, aby dodać',
            ],

            'edit' => [
                'add'    => 'Dodaj',
                'remove' => 'Usuń',
            ],
        ],

        'lookup' => [
            'click-to-add'     => 'Kliknij, aby dodać',
            'no-results-found' => 'Nie znaleziono wyników',
            'search'           => 'Szukaj...',
            'add-as-new'       => 'Dodaj jako nowy',
        ],

        'flash-group' => [
            'success'     => 'Sukces',
            'error'       => 'Błąd',
            'warning'     => 'Ostrzeżenie',
            'info'        => 'Informacja',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | OFERTY (QUOTES)
    |--------------------------------------------------------------------------
    */
    'quotes' => [
        'index' => [
            'title'                    => 'Oferty',
            'create-btn'               => 'Utwórz ofertę',
            'create-success'           => 'Oferta została pomyślnie utworzona.',
            'update-success'           => 'Oferta została pomyślnie zaktualizowana.',
            'delete-success'           => 'Oferta została pomyślnie usunięta.',
            'delete-failed'            => 'Nie można usunąć oferty.',
        ],

        'create' => [
            'title'             => 'Utwórz ofertę',
            'save-btn'          => 'Zapisz ofertę',
            'quote-info'        => 'Informacje o ofercie',
            'address-info'      => 'Dane adresowe',
            'quote-items'       => 'Pozycje oferty',
            'search-products'   => 'Wyszukaj produkty',
            'link-to-lead'      => 'Powiąż ze szansą sprzedaży',
            'subject'           => 'Temat',
            'description'       => 'Opis',
            'expired-at'        => 'Data ważności',
            'person'            => 'Osoba kontaktowa',
            'sales-person'      => 'Handlowiec',
            'billing-address'   => 'Adres rozliczeniowy',
            'shipping-address'  => 'Adres dostawy',
            'same-as-billing'   => 'Taki sam jak adres rozliczeniowy',
            'product-name'      => 'Nazwa produktu',
            'quantity'          => 'Ilość',
            'price'             => 'Cena',
            'discount'          => 'Rabat',
            'tax'               => 'Podatek',
            'total'             => 'Razem',
            'amount'            => 'Kwota',
            'sub-total'         => 'Suma częściowa',
            'grand-total'       => 'Suma całkowita',
            'discount-percent'  => 'Rabat %',
            'tax-percent'       => 'Podatek %',
            'adjustment'        => 'Korekta',
            'add-item'          => 'Dodaj pozycję',
            'delete'            => 'Usuń',
        ],

        'edit' => [
            'title'             => 'Edytuj ofertę',
            'save-btn'          => 'Zapisz ofertę',
        ],

        'view' => [
            'title'              => 'Oferta: :subject',
            'back-btn'           => 'Wstecz',
            'print-btn'          => 'Drukuj PDF',
            'edit-btn'           => 'Edytuj',
            'quote-info'         => 'Informacje o ofercie',
            'quote-items'        => 'Pozycje oferty',
            'address-info'       => 'Dane adresowe',
            'activities'         => 'Aktywności',
            'expired'            => 'Wygasła',
            'created'            => 'Utworzono',
            'updated'            => 'Zaktualizowano',
        ],

        'print' => [
            'title'            => 'Oferta',
            'quote-id'         => 'Nr oferty',
            'date'             => 'Data',
            'expired-at'       => 'Data ważności',
            'billing-address'  => 'Adres rozliczeniowy',
            'shipping-address' => 'Adres dostawy',
            'product-name'     => 'Produkt',
            'quantity'         => 'Ilość',
            'unit-price'       => 'Cena jednostkowa',
            'discount'         => 'Rabat',
            'tax'              => 'Podatek',
            'total'            => 'Razem',
            'sub-total'        => 'Suma częściowa',
            'grand-total'      => 'Suma całkowita',
            'adjustment'       => 'Korekta',
            'contact-person'   => 'Osoba kontaktowa',
            'sales-person'     => 'Handlowiec',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | KONTAKTY - Osoby i organizacje
    |--------------------------------------------------------------------------
    */
    'contacts' => [
        'persons' => [
            'index' => [
                'title'                => 'Osoby',
                'create-btn'           => 'Utwórz osobę',
                'create-success'       => 'Osoba została pomyślnie utworzona.',
                'update-success'       => 'Osoba została pomyślnie zaktualizowana.',
                'delete-success'       => 'Osoba została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć osoby.',
            ],

            'create' => [
                'title'                => 'Utwórz osobę',
                'save-btn'             => 'Zapisz osobę',
                'general'              => 'Informacje ogólne',
                'contact-info'         => 'Dane kontaktowe',
                'organization'         => 'Organizacja',
                'name'                 => 'Imię i nazwisko',
                'email'                => 'Email',
                'contact-numbers'      => 'Numery kontaktowe',
                'job-title'            => 'Stanowisko',
            ],

            'edit' => [
                'title'                => 'Edytuj osobę',
                'save-btn'             => 'Zapisz osobę',
            ],

            'view' => [
                'title'                => ':name',
                'edit-btn'             => 'Edytuj',
                'back-btn'             => 'Wstecz',
                'general'              => 'Informacje ogólne',
                'contact-info'         => 'Dane kontaktowe',
                'organization'         => 'Organizacja',
                'leads'                => 'Szanse sprzedaży',
                'activities'           => 'Aktywności',
                'quotes'               => 'Oferty',
                'emails'               => 'Emaile',
                'files'                => 'Pliki',
                'notes'                => 'Notatki',
                'tags'                 => 'Etykiety',
                'created'              => 'Utworzono',
                'updated'              => 'Zaktualizowano',

                'activities' => [
                    'actions' => [
                        'mail' => [
                            'title'   => 'Wyślij email',
                            'btn-add' => 'Utwórz wiadomość',
                        ],
                        'file' => [
                            'title'   => 'Dodaj plik',
                            'btn-add' => 'Dodaj plik',
                        ],
                        'note' => [
                            'title'   => 'Dodaj notatkę',
                            'btn-add' => 'Dodaj notatkę',
                        ],
                        'activity' => [
                            'title'   => 'Dodaj aktywność',
                            'btn-add' => 'Dodaj aktywność',
                        ],
                    ],
                ],
            ],
        ],

        'organizations' => [
            'index' => [
                'title'                => 'Organizacje',
                'create-btn'           => 'Utwórz organizację',
                'create-success'       => 'Organizacja została pomyślnie utworzona.',
                'update-success'       => 'Organizacja została pomyślnie zaktualizowana.',
                'delete-success'       => 'Organizacja została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć organizacji.',
            ],

            'create' => [
                'title'                => 'Utwórz organizację',
                'save-btn'             => 'Zapisz organizację',
                'general'              => 'Informacje ogólne',
                'name'                 => 'Nazwa',
                'address'              => 'Adres',
            ],

            'edit' => [
                'title'                => 'Edytuj organizację',
                'save-btn'             => 'Zapisz organizację',
            ],

            'view' => [
                'title'                => ':name',
                'edit-btn'             => 'Edytuj',
                'back-btn'             => 'Wstecz',
                'general'              => 'Informacje ogólne',
                'persons'              => 'Osoby',
                'leads'                => 'Szanse sprzedaży',
                'activities'           => 'Aktywności',
                'created'              => 'Utworzono',
                'updated'              => 'Zaktualizowano',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | PRODUKTY
    |--------------------------------------------------------------------------
    */
    'products' => [
        'index' => [
            'title'                => 'Produkty',
            'create-btn'           => 'Utwórz produkt',
            'create-success'       => 'Produkt został pomyślnie utworzony.',
            'update-success'       => 'Produkt został pomyślnie zaktualizowany.',
            'delete-success'       => 'Produkt został pomyślnie usunięty.',
            'delete-failed'        => 'Nie można usunąć produktu.',
        ],

        'create' => [
            'title'                => 'Utwórz produkt',
            'save-btn'             => 'Zapisz produkt',
            'general'              => 'Informacje ogólne',
            'name'                 => 'Nazwa',
            'description'          => 'Opis',
            'sku'                  => 'SKU',
            'price'                => 'Cena',
            'quantity'             => 'Ilość',
        ],

        'edit' => [
            'title'                => 'Edytuj produkt',
            'save-btn'             => 'Zapisz produkt',
        ],

        'view' => [
            'title'                => 'Produkt: :name',
            'edit-btn'             => 'Edytuj',
            'back-btn'             => 'Wstecz',
            'general'              => 'Informacje ogólne',
            'leads'                => 'Powiązane szanse sprzedaży',
            'activities'           => 'Aktywności',
            'inventories'          => 'Stany magazynowe',
            'created'              => 'Utworzono',
            'updated'              => 'Zaktualizowano',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | USTAWIENIA
    |--------------------------------------------------------------------------
    */
    'settings' => [
        'title' => 'Ustawienia',

        'groups' => [
            'index' => [
                'title'                => 'Grupy',
                'create-btn'           => 'Utwórz grupę',
                'create-success'       => 'Grupa została pomyślnie utworzona.',
                'update-success'       => 'Grupa została pomyślnie zaktualizowana.',
                'delete-success'       => 'Grupa została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć grupy - przypisani są do niej użytkownicy.',
            ],

            'create' => [
                'title'                => 'Utwórz grupę',
                'save-btn'             => 'Zapisz grupę',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
            ],

            'edit' => [
                'title'                => 'Edytuj grupę',
            ],
        ],

        'roles' => [
            'index' => [
                'title'                => 'Role',
                'create-btn'           => 'Utwórz rolę',
                'create-success'       => 'Rola została pomyślnie utworzona.',
                'update-success'       => 'Rola została pomyślnie zaktualizowana.',
                'delete-success'       => 'Rola została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć roli.',
                'last-delete-error'    => 'Nie można usunąć ostatniej roli.',
            ],

            'create' => [
                'title'                => 'Utwórz rolę',
                'save-btn'             => 'Zapisz rolę',
                'general'              => 'Ogólne',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
                'access-control'       => 'Kontrola dostępu',
                'permissions'          => 'Uprawnienia',
                'permission-type'      => 'Typ uprawnień',
                'all'                  => 'Wszystkie',
                'custom'               => 'Niestandardowe',
            ],

            'edit' => [
                'title'                => 'Edytuj rolę',
            ],
        ],

        'users' => [
            'index' => [
                'title'                   => 'Użytkownicy',
                'create-btn'              => 'Utwórz użytkownika',
                'create-success'          => 'Użytkownik został pomyślnie utworzony.',
                'update-success'          => 'Użytkownik został pomyślnie zaktualizowany.',
                'delete-success'          => 'Użytkownik został pomyślnie usunięty.',
                'delete-failed'           => 'Nie można usunąć użytkownika.',
                'cannot-delete-yourself'  => 'Nie możesz usunąć własnego konta.',
                'last-delete-error'       => 'Nie można usunąć ostatniego użytkownika.',
            ],

            'create' => [
                'title'               => 'Utwórz użytkownika',
                'save-btn'            => 'Zapisz użytkownika',
                'general'             => 'Ogólne',
                'name'                => 'Imię i nazwisko',
                'email'               => 'Email',
                'password'            => 'Hasło',
                'confirm-password'    => 'Potwierdź hasło',
                'role'                => 'Rola',
                'group'               => 'Grupa',
                'groups'              => 'Grupy',
                'status'              => 'Status',
                'view-permission'     => 'Uprawnienia do przeglądania',
                'global'              => 'Globalne',
                'group-level'         => 'Na poziomie grupy',
                'individual'          => 'Indywidualne',
            ],

            'edit' => [
                'title'               => 'Edytuj użytkownika',
            ],
        ],

        'pipelines' => [
            'index' => [
                'title'                => 'Ścieżki sprzedaży',
                'create-btn'           => 'Utwórz ścieżkę',
                'create-success'       => 'Ścieżka sprzedaży została pomyślnie utworzona.',
                'update-success'       => 'Ścieżka sprzedaży została pomyślnie zaktualizowana.',
                'delete-success'       => 'Ścieżka sprzedaży została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć ścieżki sprzedaży.',
                'default-delete-error' => 'Nie można usunąć domyślnej ścieżki sprzedaży.',
            ],

            'create' => [
                'title'                    => 'Utwórz ścieżkę sprzedaży',
                'save-btn'                 => 'Zapisz ścieżkę',
                'general'                  => 'Ogólne',
                'name'                     => 'Nazwa',
                'rotten-days'              => 'Dni przestoju',
                'rotten-days-info'         => 'Liczba dni, po których szansa sprzedaży jest oznaczana jako nieaktywna.',
                'is-default'               => 'Domyślna ścieżka',
                'stages'                   => 'Etapy',
                'stage-name'               => 'Nazwa etapu',
                'stage-probability'        => 'Prawdopodobieństwo (%)',
                'add-stage-btn'            => 'Dodaj etap',
                'new-prospect'             => 'Nowy prospekt',
                'new'                      => 'Nowy',
                'qualified'                => 'Kwalifikowany',
                'qualified-to-buy'         => 'Gotowy do zakupu',
                'proposition'              => 'Propozycja',
                'proposal-made'            => 'Przedstawiona propozycja',
                'won'                      => 'Wygrana',
                'lost'                     => 'Przegrana',
                'negotiation'              => 'Negocjacje',
                'closed-won'               => 'Zamknięte - Wygrane',
                'closed-lost'              => 'Zamknięte - Przegrane',
                'follow-up'                => 'Follow-up',
                'duplicate-name'           => 'Etap o tej nazwie już istnieje.',
            ],

            'edit' => [
                'title'                    => 'Edytuj ścieżkę sprzedaży',
            ],
        ],

        'sources' => [
            'index' => [
                'title'                => 'Źródła',
                'create-btn'           => 'Utwórz źródło',
                'create-success'       => 'Źródło zostało pomyślnie utworzone.',
                'update-success'       => 'Źródło zostało pomyślnie zaktualizowane.',
                'delete-success'       => 'Źródło zostało pomyślnie usunięte.',
                'delete-failed'        => 'Nie można usunąć źródła.',
            ],

            'create' => [
                'title'                => 'Utwórz źródło',
                'save-btn'             => 'Zapisz źródło',
                'name'                 => 'Nazwa',
            ],

            'edit' => [
                'title'                => 'Edytuj źródło',
            ],
        ],

        'types' => [
            'index' => [
                'title'                => 'Typy',
                'create-btn'           => 'Utwórz typ',
                'create-success'       => 'Typ został pomyślnie utworzony.',
                'update-success'       => 'Typ został pomyślnie zaktualizowany.',
                'delete-success'       => 'Typ został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć typu.',
            ],

            'create' => [
                'title'                => 'Utwórz typ',
                'save-btn'             => 'Zapisz typ',
                'name'                 => 'Nazwa',
            ],

            'edit' => [
                'title'                => 'Edytuj typ',
            ],
        ],

        'email-templates' => [
            'index' => [
                'title'                => 'Szablony email',
                'create-btn'           => 'Utwórz szablon',
                'create-success'       => 'Szablon email został pomyślnie utworzony.',
                'update-success'       => 'Szablon email został pomyślnie zaktualizowany.',
                'delete-success'       => 'Szablon email został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć szablonu email.',
            ],

            'create' => [
                'title'                => 'Utwórz szablon email',
                'save-btn'             => 'Zapisz szablon',
                'name'                 => 'Nazwa',
                'subject'              => 'Temat',
                'content'              => 'Treść',
            ],

            'edit' => [
                'title'                => 'Edytuj szablon email',
            ],
        ],

        'workflows' => [
            'index' => [
                'title'                => 'Automatyzacje',
                'create-btn'           => 'Utwórz automatyzację',
                'create-success'       => 'Automatyzacja została pomyślnie utworzona.',
                'update-success'       => 'Automatyzacja została pomyślnie zaktualizowana.',
                'delete-success'       => 'Automatyzacja została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć automatyzacji.',
            ],

            'create' => [
                'title'                => 'Utwórz automatyzację',
                'save-btn'             => 'Zapisz automatyzację',
                'general'              => 'Ogólne',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
                'status'               => 'Status',
                'event'                => 'Wydarzenie',
                'condition-type'       => 'Typ warunku',
                'all'                  => 'Wszystkie',
                'any'                  => 'Dowolny',
                'conditions'           => 'Warunki',
                'add-condition'        => 'Dodaj warunek',
                'actions'              => 'Akcje',
                'add-action'           => 'Dodaj akcję',
            ],

            'edit' => [
                'title'                => 'Edytuj automatyzację',
            ],
        ],

        'webhooks' => [
            'index' => [
                'title'                => 'Webhooki',
                'create-btn'           => 'Utwórz webhook',
                'create-success'       => 'Webhook został pomyślnie utworzony.',
                'update-success'       => 'Webhook został pomyślnie zaktualizowany.',
                'delete-success'       => 'Webhook został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć webhooka.',
            ],

            'create' => [
                'title'                => 'Utwórz webhook',
                'save-btn'             => 'Zapisz webhook',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
                'entity-type'          => 'Typ encji',
                'end-point'            => 'URL Endpoint',
                'method'               => 'Metoda',
                'encoding'             => 'Kodowanie',
                'headers'              => 'Nagłówki',
                'payload'              => 'Payload',
                'add-header'           => 'Dodaj nagłówek',
                'key'                  => 'Klucz',
                'value'                => 'Wartość',
            ],

            'edit' => [
                'title'                => 'Edytuj webhook',
            ],
        ],

        'tags' => [
            'index' => [
                'title'                => 'Etykiety',
                'create-btn'           => 'Utwórz etykietę',
                'create-success'       => 'Etykieta została pomyślnie utworzona.',
                'update-success'       => 'Etykieta została pomyślnie zaktualizowana.',
                'delete-success'       => 'Etykieta została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć etykiety.',
            ],

            'create' => [
                'title'                => 'Utwórz etykietę',
                'save-btn'             => 'Zapisz etykietę',
                'name'                 => 'Nazwa',
                'color'                => 'Kolor',
            ],

            'edit' => [
                'title'                => 'Edytuj etykietę',
            ],
        ],

        'attributes' => [
            'index' => [
                'title'                => 'Atrybuty',
                'create-btn'           => 'Utwórz atrybut',
                'create-success'       => 'Atrybut został pomyślnie utworzony.',
                'update-success'       => 'Atrybut został pomyślnie zaktualizowany.',
                'delete-success'       => 'Atrybut został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć atrybutu.',
                'user-defined-error'   => 'Nie można usunąć atrybutu zdefiniowanego przez system.',
            ],

            'create' => [
                'title'                => 'Utwórz atrybut',
                'save-btn'             => 'Zapisz atrybut',
                'general'              => 'Ogólne',
                'code'                 => 'Kod',
                'name'                 => 'Nazwa',
                'type'                 => 'Typ',
                'entity-type'          => 'Typ encji',
                'lookup-type'          => 'Typ wyszukiwania',
                'is-required'          => 'Wymagany',
                'is-unique'            => 'Unikalny',
                'validations'          => 'Walidacje',
                'input-validation'     => 'Walidacja danych wejściowych',
                'options'              => 'Opcje',
                'add-option'           => 'Dodaj opcję',
                'option-name'          => 'Nazwa opcji',
            ],

            'edit' => [
                'title'                => 'Edytuj atrybut',
            ],

            'types' => [
                'text'        => 'Tekst',
                'textarea'    => 'Pole tekstowe',
                'price'       => 'Cena',
                'boolean'     => 'Tak/Nie',
                'select'      => 'Lista rozwijana',
                'multiselect' => 'Wybór wielokrotny',
                'checkbox'    => 'Pola wyboru',
                'email'       => 'Email',
                'address'     => 'Adres',
                'phone'       => 'Telefon',
                'date'        => 'Data',
                'datetime'    => 'Data i czas',
                'lookup'      => 'Wyszukiwanie',
                'file'        => 'Plik',
                'image'       => 'Obraz',
                'numeric'     => 'Liczba',
                'url'         => 'URL',
            ],

            'entity-types' => [
                'leads'         => 'Szanse sprzedaży',
                'persons'       => 'Osoby',
                'organizations' => 'Organizacje',
                'products'      => 'Produkty',
                'quotes'        => 'Oferty',
                'warehouses'    => 'Magazyny',
            ],
        ],

        'warehouses' => [
            'index' => [
                'title'                => 'Magazyny',
                'create-btn'           => 'Utwórz magazyn',
                'create-success'       => 'Magazyn został pomyślnie utworzony.',
                'update-success'       => 'Magazyn został pomyślnie zaktualizowany.',
                'delete-success'       => 'Magazyn został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć magazynu.',
            ],

            'create' => [
                'title'                => 'Utwórz magazyn',
                'save-btn'             => 'Zapisz magazyn',
                'general'              => 'Ogólne',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
                'contact-info'         => 'Dane kontaktowe',
                'contact-name'         => 'Osoba kontaktowa',
                'contact-emails'       => 'Email',
                'contact-numbers'      => 'Telefon',
                'contact-address'      => 'Adres',
            ],

            'edit' => [
                'title'                => 'Edytuj magazyn',
            ],

            'view' => [
                'title'                => 'Magazyn: :name',
                'edit-btn'             => 'Edytuj',
                'back-btn'             => 'Wstecz',
                'products'             => 'Produkty',
                'locations'            => 'Lokalizacje',
            ],
        ],

        'web-forms' => [
            'index' => [
                'title'                => 'Formularze webowe',
                'create-btn'           => 'Utwórz formularz',
                'create-success'       => 'Formularz został pomyślnie utworzony.',
                'update-success'       => 'Formularz został pomyślnie zaktualizowany.',
                'delete-success'       => 'Formularz został pomyślnie usunięty.',
                'delete-failed'        => 'Nie można usunąć formularza.',
            ],

            'create' => [
                'title'                => 'Utwórz formularz webowy',
                'save-btn'             => 'Zapisz formularz',
                'general'              => 'Ogólne',
                'title-control'        => 'Tytuł',
                'description'          => 'Opis',
                'submit-button-label'  => 'Tekst przycisku',
                'submit-success-action'=> 'Akcja po wysłaniu',
                'submit-success-content'=> 'Treść sukcesu',
                'create-lead'          => 'Utwórz szansę sprzedaży',
                'customize-web-form'   => 'Dostosuj formularz',
                'background-color'     => 'Kolor tła',
                'form-background-color'=> 'Kolor tła formularza',
                'form-title-color'     => 'Kolor tytułu',
                'form-submit-button-color'=> 'Kolor przycisku',
                'attribute-label-color'=> 'Kolor etykiet',
                'attributes'           => 'Atrybuty',
                'add-attribute'        => 'Dodaj atrybut',
                'embed'                => 'Kod do osadzenia',
                'preview'              => 'Podgląd',
            ],

            'edit' => [
                'title'                => 'Edytuj formularz webowy',
            ],
        ],

        'campaigns' => [
            'index' => [
                'title'                => 'Kampanie',
                'create-btn'           => 'Utwórz kampanię',
                'create-success'       => 'Kampania została pomyślnie utworzona.',
                'update-success'       => 'Kampania została pomyślnie zaktualizowana.',
                'delete-success'       => 'Kampania została pomyślnie usunięta.',
                'delete-failed'        => 'Nie można usunąć kampanii.',
            ],

            'create' => [
                'title'                => 'Utwórz kampanię',
                'save-btn'             => 'Zapisz kampanię',
                'general'              => 'Ogólne',
                'name'                 => 'Nazwa',
                'subject'              => 'Temat emaila',
                'event'                => 'Wydarzenie',
                'email-template'       => 'Szablon emaila',
                'status'               => 'Status',
            ],

            'edit' => [
                'title'                => 'Edytuj kampanię',
            ],
        ],

        'events' => [
            'index' => [
                'title'                => 'Wydarzenia',
                'create-btn'           => 'Utwórz wydarzenie',
                'create-success'       => 'Wydarzenie zostało pomyślnie utworzone.',
                'update-success'       => 'Wydarzenie zostało pomyślnie zaktualizowane.',
                'delete-success'       => 'Wydarzenie zostało pomyślnie usunięte.',
                'delete-failed'        => 'Nie można usunąć wydarzenia.',
            ],

            'create' => [
                'title'                => 'Utwórz wydarzenie',
                'save-btn'             => 'Zapisz wydarzenie',
                'name'                 => 'Nazwa',
                'description'          => 'Opis',
                'date'                 => 'Data',
            ],

            'edit' => [
                'title'                => 'Edytuj wydarzenie',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | SZANSE SPRZEDAŻY (LEADS)
    |--------------------------------------------------------------------------
    */
    'leads' => [
        'index' => [
            'title'                => 'Szanse sprzedaży',
            'create-btn'           => 'Utwórz szansę',
        ],

        'create' => [
            'title'                => 'Utwórz szansę sprzedaży',
            'save-btn'             => 'Zapisz',
            'details'              => 'Szczegóły',
            'contact-person'       => 'Osoba kontaktowa',
            'products'             => 'Produkty',
        ],

        'edit' => [
            'title'                => 'Edytuj szansę sprzedaży',
            'save-btn'             => 'Zapisz',
        ],

        'view' => [
            'title'                => 'Szansa: :title',
            'edit-btn'             => 'Edytuj',
            'back-btn'             => 'Wstecz',
            'stage'                => 'Etap',
            'won'                  => 'Wygrana',
            'lost'                 => 'Przegrana',
            'rotten'               => 'Nieaktywna',
            'tags'                 => 'Etykiety',
            'add-tag'              => 'Dodaj etykietę',
            'save-tags'            => 'Zapisz etykiety',

            'summary' => [
                'title'            => 'Podsumowanie',
            ],

            'tabs' => [
                'description'      => 'Opis',
                'products'         => 'Produkty',
                'contact-person'   => 'Osoba kontaktowa',
                'quotes'           => 'Oferty',
                'activities'       => 'Aktywności',
                'emails'           => 'Emaile',
                'files'            => 'Pliki',
                'notes'            => 'Notatki',
            ],

            'attributes' => [
                'lead-value'       => 'Wartość szansy',
                'expected-close-date' => 'Oczekiwana data zamknięcia',
                'sales-person'     => 'Handlowiec',
                'source'           => 'Źródło',
                'type'             => 'Typ',
                'pipeline'         => 'Ścieżka sprzedaży',
                'created'          => 'Utworzono',
                'updated'          => 'Zaktualizowano',
            ],

            'actions' => [
                'mail' => [
                    'title'        => 'Wyślij email',
                    'btn-add'      => 'Utwórz wiadomość',
                ],
                'file' => [
                    'title'        => 'Dodaj plik',
                    'btn-add'      => 'Dodaj plik',
                ],
                'note' => [
                    'title'        => 'Dodaj notatkę',
                    'btn-add'      => 'Dodaj notatkę',
                ],
                'activity' => [
                    'title'        => 'Dodaj aktywność',
                    'btn-add'      => 'Dodaj aktywność',
                ],
                'quote' => [
                    'title'        => 'Utwórz ofertę',
                    'btn-add'      => 'Utwórz ofertę',
                ],
            ],
        ],

        'common' => [
            'contact' => [
                'name'             => 'Imię i nazwisko',
                'email'            => 'Email',
                'contact-numbers'  => 'Telefon',
                'organization'     => 'Organizacja',
            ],

            'products' => [
                'product-name'     => 'Produkt',
                'quantity'         => 'Ilość',
                'price'            => 'Cena',
                'amount'           => 'Kwota',
                'action'           => 'Akcja',
                'add-product'      => 'Dodaj produkt',
                'total'            => 'Razem',
            ],
        ],

        'kanban' => [
            'title'                => 'Kanban',
            'empty-stage'          => 'Brak szans w tym etapie',
            'drag-and-drop'        => 'Przeciągnij i upuść, aby zmienić etap',
        ],

        'create-success'           => 'Szansa sprzedaży została pomyślnie utworzona.',
        'update-success'           => 'Szansa sprzedaży została pomyślnie zaktualizowana.',
        'delete-success'           => 'Szansa sprzedaży została pomyślnie usunięta.',
        'delete-failed'            => 'Nie można usunąć szansy sprzedaży.',
        'destroy-success'          => 'Wybrane szanse sprzedaży zostały pomyślnie usunięte.',
        'mass-update-success'      => 'Wybrane szanse sprzedaży zostały zaktualizowane.',
    ],

    /*
    |--------------------------------------------------------------------------
    | AKTYWNOŚCI
    |--------------------------------------------------------------------------
    */
    'activities' => [
        'index' => [
            'title'              => 'Aktywności',
            'create-btn'         => 'Utwórz aktywność',
        ],

        'create' => [
            'title'              => 'Utwórz aktywność',
            'save-btn'           => 'Zapisz aktywność',
        ],

        'edit' => [
            'title'              => 'Edytuj aktywność',
            'save-btn'           => 'Zapisz aktywność',
        ],

        'create-success'         => 'Aktywność została pomyślnie utworzona.',
        'update-success'         => 'Aktywność została pomyślnie zaktualizowana.',
        'delete-success'         => 'Aktywność została pomyślnie usunięta.',
        'delete-failed'          => 'Nie można usunąć aktywności.',
        'mass-delete-success'    => 'Wybrane aktywności zostały pomyślnie usunięte.',
        'mass-update-success'    => 'Wybrane aktywności zostały zaktualizowane.',
    ],

    /*
    |--------------------------------------------------------------------------
    | POCZTA (MAIL)
    |--------------------------------------------------------------------------
    */
    'mail' => [
        'index' => [
            'title'              => 'Poczta',
            'compose'            => 'Nowa wiadomość',
        ],

        'compose' => [
            'title'              => 'Nowa wiadomość',
            'to'                 => 'Do',
            'cc'                 => 'DW',
            'bcc'                => 'UDW',
            'subject'            => 'Temat',
            'message'            => 'Treść',
            'send'               => 'Wyślij',
            'save-draft'         => 'Zapisz jako szkic',
            'discard'            => 'Odrzuć',
            'attach-file'        => 'Załącz plik',
        ],

        'view' => [
            'title'              => 'Wiadomość: :subject',
            'reply'              => 'Odpowiedz',
            'reply-all'          => 'Odpowiedz wszystkim',
            'forward'            => 'Przekaż',
            'delete'             => 'Usuń',
            'to'                 => 'Do',
            'cc'                 => 'DW',
            'from'               => 'Od',
            'subject'            => 'Temat',
            'date'               => 'Data',
            'attachments'        => 'Załączniki',
        ],

        'folders' => [
            'inbox'              => 'Skrzynka odbiorcza',
            'draft'              => 'Szkice',
            'outbox'             => 'Do wysłania',
            'sent'               => 'Wysłane',
            'trash'              => 'Kosz',
        ],

        'empty'                  => 'Brak wiadomości',
        'send-success'           => 'Wiadomość została pomyślnie wysłana.',
        'delete-success'         => 'Wiadomość została pomyślnie usunięta.',
        'draft-success'          => 'Wiadomość została zapisana jako szkic.',
        'send-failed'            => 'Nie udało się wysłać wiadomości.',
        'delete-failed'          => 'Nie udało się usunąć wiadomości.',
        'moved-to-trash'         => 'Wiadomość została przeniesiona do kosza.',
        'restored'               => 'Wiadomość została przywrócona.',
    ],

    /*
    |--------------------------------------------------------------------------
    | KONFIGURACJA
    |--------------------------------------------------------------------------
    */
    'configuration' => [
        'index' => [
            'title'              => 'Konfiguracja',
            'save-btn'           => 'Zapisz konfigurację',

            'general' => [
                'title'          => 'Ogólne',
                'general'        => 'Ogólne',

                'locale-settings' => [
                    'title'            => 'Ustawienia regionalne',
                    'title-info'       => 'Konfiguracja języka i strefy czasowej.',
                    'locale'           => 'Język',
                    'timezone'         => 'Strefa czasowa',
                    'currency'         => 'Waluta',
                    'date-format'      => 'Format daty',
                    'time-format'      => 'Format czasu',
                    'week-starts-on'   => 'Pierwszy dzień tygodnia',
                ],
            ],
        ],

        'update-success'         => 'Konfiguracja została pomyślnie zaktualizowana.',
    ],

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    'dashboard' => [
        'index' => [
            'title'                     => 'Panel główny',
            'welcome'                   => 'Witaj, :user!',
            'welcome-message'           => 'Witaj w Krayin CRM. Oto podsumowanie Twojej aktywności.',

            'total-leads'               => 'Szanse sprzedaży',
            'total-quotes'              => 'Oferty',
            'total-persons'             => 'Osoby',
            'total-organizations'       => 'Organizacje',
            'total-products'            => 'Produkty',
            'total-revenue'             => 'Przychód',
            'average-lead-value'        => 'Średnia wartość',
            'activities-today'          => 'Aktywności na dziś',

            'leads-over-time'           => 'Szanse w czasie',
            'leads-started'             => 'Nowe szanse',
            'leads-won'                 => 'Wygrane',
            'leads-lost'                => 'Przegrane',
            'open-leads-by-states'      => 'Otwarte szanse wg etapów',
            'top-leads'                 => 'Najważniejsze szanse',
            'top-persons'               => 'Najaktywniejsze osoby',
            'pipeline-revenue'          => 'Przychód wg ścieżki',
            'leads-by-source'           => 'Szanse wg źródeł',
            'leads-by-type'             => 'Szanse wg typów',
            'leads-by-pipeline'         => 'Szanse wg ścieżek',

            'activities' => [
                'title'                 => 'Dzisiejsze aktywności',
                'all'                   => 'Wszystkie',
                'calls'                 => 'Rozmowy',
                'meetings'              => 'Spotkania',
                'lunches'               => 'Lunche',
                'empty-title'           => 'Brak zaplanowanych aktywności',
                'empty-info'            => 'Nie masz żadnych aktywności zaplanowanych na dziś.',
            ],

            'recent-activities'         => 'Ostatnie aktywności',
            'upcoming-activities'       => 'Nadchodzące aktywności',
            'overdue-activities'        => 'Aktywności po terminie',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | UKŁADY (LAYOUTS)
    |--------------------------------------------------------------------------
    */
    'layouts' => [
        'powered-by' => [
            'description' => 'Napędzane przez :krayin, projekt open-source od :webkul.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | EMAILE - Szablony
    |--------------------------------------------------------------------------
    */
    'emails' => [
        'common' => [
            'dear'               => 'Szanowny/a :name,',
            'hi'                 => 'Cześć :name,',
            'hello'              => 'Witaj :name,',
            'regards'            => 'Z poważaniem,',
            'thanks'             => 'Dziękuję,',
            'team'               => 'Zespół :app_name',
            'if-not-requested'   => 'Jeśli nie prosiłeś/aś o tę wiadomość, zignoruj ją.',
            'click-here'         => 'Kliknij tutaj',
        ],

        'leads' => [
            'create-subject'     => 'Nowa szansa sprzedaży: :title',
            'update-subject'     => 'Aktualizacja szansy: :title',
        ],

        'activities' => [
            'create-subject'     => 'Nowa aktywność: :title',
            'update-subject'     => 'Aktualizacja aktywności: :title',
        ],

        'quotes' => [
            'create-subject'     => 'Nowa oferta: :subject',
            'update-subject'     => 'Aktualizacja oferty: :subject',
        ],

        'user' => [
            'forget-password' => [
                'subject'        => 'Resetowanie hasła',
                'greeting'       => 'Witaj!',
                'message'        => 'Otrzymujesz tę wiadomość, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.',
                'reset-password' => 'Resetuj hasło',
                'expiry'         => 'Ten link wygaśnie za :count minut.',
                'no-request'     => 'Jeśli nie prosiłeś/aś o zresetowanie hasła, zignoruj tę wiadomość.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | WSPÓLNE ATRYBUTY
    |--------------------------------------------------------------------------
    */
    'common' => [
        'custom-attributes' => [
            'email'            => 'Email',
            'address'          => 'Adres',
            'contact-numbers'  => 'Numery kontaktowe',
            'select-country'   => 'Wybierz kraj',
            'select-state'     => 'Wybierz województwo',
            'work'             => 'Służbowy',
            'home'             => 'Domowy',
        ],

        'address' => [
            'city'             => 'Miasto',
            'state'            => 'Województwo',
            'country'          => 'Kraj',
            'postcode'         => 'Kod pocztowy',
            'address'          => 'Adres',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | WALIDACJE
    |--------------------------------------------------------------------------
    */
    'validations' => [
        'required'             => 'Pole :attribute jest wymagane.',
        'email'                => 'Pole :attribute musi być prawidłowym adresem email.',
        'unique'               => 'Wartość pola :attribute już istnieje.',
        'min'                  => 'Pole :attribute musi mieć co najmniej :min znaków.',
        'max'                  => 'Pole :attribute nie może mieć więcej niż :max znaków.',
        'numeric'              => 'Pole :attribute musi być liczbą.',
        'integer'              => 'Pole :attribute musi być liczbą całkowitą.',
        'date'                 => 'Pole :attribute musi być prawidłową datą.',
        'image'                => 'Pole :attribute musi być obrazem.',
        'file'                 => 'Pole :attribute musi być plikiem.',
        'mimes'                => 'Pole :attribute musi być plikiem typu: :values.',
        'confirmed'            => 'Potwierdzenie pola :attribute nie zgadza się.',
        'password'             => 'Hasło jest nieprawidłowe.',
        'in'                   => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
        'url'                  => 'Format pola :attribute jest nieprawidłowy.',
        'between'              => 'Wartość pola :attribute musi być pomiędzy :min a :max.',
        'regex'                => 'Format pola :attribute jest nieprawidłowy.',
        'exists'               => 'Wybrana wartość pola :attribute nie istnieje.',
        'array'                => 'Pole :attribute musi być tablicą.',
        'json'                 => 'Pole :attribute musi być prawidłowym ciągiem JSON.',
        'accepted'             => 'Pole :attribute musi być zaakceptowane.',
        'boolean'              => 'Pole :attribute musi mieć wartość prawda lub fałsz.',
        'after'                => 'Pole :attribute musi być datą późniejszą niż :date.',
        'before'               => 'Pole :attribute musi być datą wcześniejszą niż :date.',
        'size'                 => 'Pole :attribute musi mieć rozmiar :size.',
        'digits'               => 'Pole :attribute musi mieć :digits cyfr.',
        'same'                 => 'Pola :attribute i :other muszą być takie same.',
        'different'            => 'Pola :attribute i :other muszą być różne.',
        'alpha'                => 'Pole :attribute może zawierać tylko litery.',
        'alpha_num'            => 'Pole :attribute może zawierać tylko litery i cyfry.',
        'alpha_dash'           => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
        'not_in'               => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
        'gt'                   => 'Wartość pola :attribute musi być większa niż :value.',
        'gte'                  => 'Wartość pola :attribute musi być większa lub równa :value.',
        'lt'                   => 'Wartość pola :attribute musi być mniejsza niż :value.',
        'lte'                  => 'Wartość pola :attribute musi być mniejsza lub równa :value.',
        'starts_with'          => 'Pole :attribute musi zaczynać się od: :values.',
        'ends_with'            => 'Pole :attribute musi kończyć się na: :values.',
        'timezone'             => 'Pole :attribute musi być prawidłową strefą czasową.',
        'ip'                   => 'Pole :attribute musi być prawidłowym adresem IP.',
        'uuid'                 => 'Pole :attribute musi być prawidłowym UUID.',
    ],

    /*
    |--------------------------------------------------------------------------
    | BŁĘDY
    |--------------------------------------------------------------------------
    */
    'errors' => [
        'something-went-wrong'     => 'Coś poszło nie tak!',
        'page-not-found'           => 'Strona nie została znaleziona.',
        'unauthorized'             => 'Nieautoryzowany dostęp.',
        'forbidden'                => 'Dostęp zabroniony.',
        'server-error'             => 'Błąd serwera.',
        'maintenance'              => 'Strona jest w trakcie konserwacji.',

        '404' => [
            'title'                => 'Strona nie znaleziona',
            'description'          => 'Ups! Strona, której szukasz, nie istnieje.',
            'back-to-home'         => 'Wróć na stronę główną',
        ],

        '401' => [
            'title'                => 'Nieautoryzowany dostęp',
            'description'          => 'Ups! Nie masz uprawnień do przeglądania tej strony.',
            'back-to-home'         => 'Wróć na stronę główną',
        ],

        '403' => [
            'title'                => 'Dostęp zabroniony',
            'description'          => 'Ups! Ta strona jest dla Ciebie niedostępna.',
            'back-to-home'         => 'Wróć na stronę główną',
        ],

        '500' => [
            'title'                => 'Błąd serwera',
            'description'          => 'Ups! Coś poszło nie tak. Spróbuj ponownie później.',
            'back-to-home'         => 'Wróć na stronę główną',
        ],

        '503' => [
            'title'                => 'Konserwacja',
            'description'          => 'Strona jest chwilowo niedostępna z powodu konserwacji. Wróć wkrótce.',
            'back-to-home'         => 'Wróć na stronę główną',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | EKSPORT
    |--------------------------------------------------------------------------
    */
    'export' => [
        'csv'                  => 'Eksportuj CSV',
        'xls'                  => 'Eksportuj XLS',
        'xlsx'                 => 'Eksportuj XLSX',
        'pdf'                  => 'Eksportuj PDF',
        'export'               => 'Eksportuj',
        'download'             => 'Pobierz',
        'export-success'       => 'Eksport zakończony pomyślnie.',
        'export-failed'        => 'Eksport nie powiódł się.',
        'no-records'           => 'Brak rekordów do eksportu.',
    ],

    /*
    |--------------------------------------------------------------------------
    | IMPORT
    |--------------------------------------------------------------------------
    */
    'import' => [
        'title'                => 'Import',
        'import'               => 'Importuj',
        'upload'               => 'Prześlij plik',
        'sample-file'          => 'Pobierz przykładowy plik',
        'mapping'              => 'Mapowanie kolumn',
        'source-column'        => 'Kolumna źródłowa',
        'destination-field'    => 'Pole docelowe',
        'preview'              => 'Podgląd',
        'run-import'           => 'Uruchom import',
        'skip-errors'          => 'Pomiń błędy',
        'import-success'       => 'Import zakończony pomyślnie. Zaimportowano :count rekordów.',
        'import-failed'        => 'Import nie powiódł się.',
        'invalid-file'         => 'Nieprawidłowy format pliku.',
        'no-data'              => 'Brak danych do importu.',
        'row'                  => 'Wiersz',
        'error'                => 'Błąd',
        'errors'               => 'Błędy',
        'imported'             => 'Zaimportowano',
        'skipped'              => 'Pominięto',
    ],

    /*
    |--------------------------------------------------------------------------
    | TRANSFER DANYCH
    |--------------------------------------------------------------------------
    */
    'data-transfer' => [
        'imports' => [
            'index' => [
                'title'                => 'Importy',
                'create-btn'           => 'Utwórz import',
                'create-success'       => 'Import został utworzony pomyślnie.',
                'update-success'       => 'Import został zaktualizowany pomyślnie.',
                'delete-success'       => 'Import został usunięty pomyślnie.',
                'delete-failed'        => 'Nie można usunąć importu.',
            ],

            'create' => [
                'title'                => 'Utwórz import',
                'save-btn'             => 'Zapisz import',
                'general'              => 'Ogólne',
                'type'                 => 'Typ',
                'action'               => 'Akcja',
                'file'                 => 'Plik',
                'download-sample'      => 'Pobierz przykładowy plik',
                'validation-strategy'  => 'Strategia walidacji',
                'stop-on-errors'       => 'Zatrzymaj przy błędach',
                'skip-errors'          => 'Pomiń błędy',
                'allowed-errors'       => 'Dozwolona liczba błędów',
                'field-separator'      => 'Separator pól',
                'process-in-queue'     => 'Przetwarzaj w kolejce',
                'import-new'           => 'Importuj nowe',
                'import-update'        => 'Importuj i aktualizuj',
                'import-delete'        => 'Importuj i usuń',

                'entity-types' => [
                    'leads'             => 'Szanse sprzedaży',
                    'persons'           => 'Osoby',
                    'organizations'     => 'Organizacje',
                    'products'          => 'Produkty',
                    'quotes'            => 'Oferty',
                ],
            ],

            'edit' => [
                'title'                => 'Edytuj import',
            ],

            'run' => [
                'title'                => 'Uruchom import',
                'validate'             => 'Waliduj',
                'import'               => 'Importuj',
                'validating'           => 'Walidacja...',
                'importing'            => 'Importowanie...',
                'validated'            => 'Zwalidowano',
                'imported'             => 'Zaimportowano',
                'errors'               => 'Błędy',
                'stats'                => 'Statystyki',
                'created'              => 'Utworzono',
                'updated'              => 'Zaktualizowano',
                'deleted'              => 'Usunięto',
                'total'                => 'Razem',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | OGÓLNE
    |--------------------------------------------------------------------------
    */
    'general' => [
        'yes'                  => 'Tak',
        'no'                   => 'Nie',
        'ok'                   => 'OK',
        'cancel'               => 'Anuluj',
        'save'                 => 'Zapisz',
        'create'               => 'Utwórz',
        'update'               => 'Aktualizuj',
        'edit'                 => 'Edytuj',
        'delete'               => 'Usuń',
        'view'                 => 'Podgląd',
        'back'                 => 'Wstecz',
        'close'                => 'Zamknij',
        'submit'               => 'Wyślij',
        'search'               => 'Szukaj',
        'filter'               => 'Filtruj',
        'reset'                => 'Resetuj',
        'refresh'              => 'Odśwież',
        'export'               => 'Eksportuj',
        'import'               => 'Importuj',
        'print'                => 'Drukuj',
        'download'             => 'Pobierz',
        'upload'               => 'Prześlij',
        'select'               => 'Wybierz',
        'select-all'           => 'Zaznacz wszystkie',
        'deselect-all'         => 'Odznacz wszystkie',
        'add'                  => 'Dodaj',
        'remove'               => 'Usuń',
        'more'                 => 'Więcej',
        'less'                 => 'Mniej',
        'loading'              => 'Ładowanie...',
        'processing'           => 'Przetwarzanie...',
        'please-wait'          => 'Proszę czekać...',
        'success'              => 'Sukces',
        'error'                => 'Błąd',
        'warning'              => 'Ostrzeżenie',
        'info'                 => 'Informacja',
        'confirm'              => 'Potwierdź',
        'active'               => 'Aktywny',
        'inactive'             => 'Nieaktywny',
        'enabled'              => 'Włączone',
        'disabled'             => 'Wyłączone',
        'true'                 => 'Prawda',
        'false'                => 'Fałsz',
        'none'                 => 'Brak',
        'n-a'                  => 'N/D',
        'show'                 => 'Pokaż',
        'hide'                 => 'Ukryj',
        'expand'               => 'Rozwiń',
        'collapse'             => 'Zwiń',
        'required'             => 'Wymagane',
        'optional'             => 'Opcjonalne',
        'all'                  => 'Wszystkie',
        'any'                  => 'Dowolne',
        'other'                => 'Inne',
        'total'                => 'Razem',
        'subtotal'             => 'Suma częściowa',
        'amount'               => 'Kwota',
        'quantity'             => 'Ilość',
        'price'                => 'Cena',
        'date'                 => 'Data',
        'time'                 => 'Czas',
        'datetime'             => 'Data i czas',
        'from'                 => 'Od',
        'to'                   => 'Do',
        'of'                   => 'z',
        'and'                  => 'i',
        'or'                   => 'lub',
        'per-page'             => 'Na stronie',
        'showing'              => 'Wyświetlane',
        'results'              => 'wyników',
        'no-results'           => 'Brak wyników',
        'no-data'              => 'Brak danych',
        'empty'                => 'Pusto',
        'actions'              => 'Akcje',
        'status'               => 'Status',
        'name'                 => 'Nazwa',
        'description'          => 'Opis',
        'email'                => 'Email',
        'phone'                => 'Telefon',
        'address'              => 'Adres',
        'city'                 => 'Miasto',
        'state'                => 'Województwo',
        'country'              => 'Kraj',
        'postcode'             => 'Kod pocztowy',
        'created-at'           => 'Utworzono',
        'updated-at'           => 'Zaktualizowano',
        'created-by'           => 'Utworzył',
        'updated-by'           => 'Zaktualizował',
        'notes'                => 'Notatki',
        'comments'             => 'Komentarze',
        'attachments'          => 'Załączniki',
        'image'                => 'Obraz',
        'images'               => 'Obrazy',
        'file'                 => 'Plik',
        'files'                => 'Pliki',
        'user'                 => 'Użytkownik',
        'users'                => 'Użytkownicy',
        'role'                 => 'Rola',
        'roles'                => 'Role',
        'permission'           => 'Uprawnienie',
        'permissions'          => 'Uprawnienia',
        'settings'             => 'Ustawienia',
        'configuration'        => 'Konfiguracja',
        'profile'              => 'Profil',
        'account'              => 'Konto',
        'logout'               => 'Wyloguj',
        'login'                => 'Zaloguj',
        'register'             => 'Zarejestruj',
        'password'             => 'Hasło',
        'confirm-password'     => 'Potwierdź hasło',
        'remember-me'          => 'Zapamiętaj mnie',
        'forgot-password'      => 'Zapomniałeś hasła?',
        'reset-password'       => 'Resetuj hasło',
        'change-password'      => 'Zmień hasło',
        'welcome'              => 'Witaj',
        'dashboard'            => 'Panel główny',
        'home'                 => 'Strona główna',
        'help'                 => 'Pomoc',
        'support'              => 'Wsparcie',
        'documentation'        => 'Dokumentacja',
        'version'              => 'Wersja',
        'language'             => 'Język',
        'theme'                => 'Motyw',
        'dark-mode'            => 'Tryb ciemny',
        'light-mode'           => 'Tryb jasny',
    ],

    /*
    |--------------------------------------------------------------------------
    | DODATKOWE TŁUMACZENIA
    |--------------------------------------------------------------------------
    */
    'additional' => [
        'copy'                 => 'Kopiuj',
        'copied'               => 'Skopiowano!',
        'copy-to-clipboard'    => 'Kopiuj do schowka',
        'paste'                => 'Wklej',
        'cut'                  => 'Wytnij',
        'undo'                 => 'Cofnij',
        'redo'                 => 'Ponów',
        'bold'                 => 'Pogrubienie',
        'italic'               => 'Kursywa',
        'underline'            => 'Podkreślenie',
        'link'                 => 'Link',
        'unlink'               => 'Usuń link',
        'list'                 => 'Lista',
        'ordered-list'         => 'Lista numerowana',
        'unordered-list'       => 'Lista punktowana',
        'align-left'           => 'Wyrównaj do lewej',
        'align-center'         => 'Wyrównaj do środka',
        'align-right'          => 'Wyrównaj do prawej',
        'align-justify'        => 'Wyjustuj',
        'indent'               => 'Zwiększ wcięcie',
        'outdent'              => 'Zmniejsz wcięcie',
        'insert-image'         => 'Wstaw obraz',
        'insert-video'         => 'Wstaw wideo',
        'insert-table'         => 'Wstaw tabelę',
        'full-screen'          => 'Pełny ekran',
        'exit-full-screen'     => 'Zamknij pełny ekran',
        'preview'              => 'Podgląd',
        'code'                 => 'Kod',
        'source'               => 'Źródło',
    ],

    /*
    |--------------------------------------------------------------------------
    | AI
    |--------------------------------------------------------------------------
    */
    'ai' => [
        'title'                => 'Asystent AI',
        'generate'             => 'Wygeneruj',
        'regenerate'           => 'Wygeneruj ponownie',
        'improve'              => 'Popraw',
        'expand'               => 'Rozwiń',
        'shorten'              => 'Skróć',
        'summarize'            => 'Podsumuj',
        'translate'            => 'Przetłumacz',
        'check-grammar'        => 'Sprawdź gramatykę',
        'make-formal'          => 'Zmień na formalny',
        'make-casual'          => 'Zmień na nieformalny',
        'generating'           => 'Generowanie...',
        'no-content'           => 'Brak treści do przetworzenia.',
        'error'                => 'Wystąpił błąd podczas przetwarzania.',
    ],
];
