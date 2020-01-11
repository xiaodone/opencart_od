<?php
/**
 * @version		$Id: store.php 5469 2019-01-08 22:09:26Z mic $
 * @package		Language Translation German Backend
 * @author		mic - https://osworx.net
 * @copyright	2019 OSWorX
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']					= 'Stores';

// Text
$_['text_settings']					= 'Einstellungen';
$_['text_success']					= 'Datensatz erfolgreich aktualisiert';
$_['text_list']						= 'Übersicht';
$_['text_add']						= 'Neu';
$_['text_edit']						= 'Bearbeiten';
$_['text_items']					= 'Einträge';
$_['text_tax']						= 'Steuern';
$_['text_account']					= 'Konto';
$_['text_checkout']					= 'Warenkorb';
$_['text_stock']					= 'Lager';
$_['text_shipping']					= 'Versandadresse';
$_['text_payment']					= 'Rechnungsadresse';

// Column
$_['column_name']					= 'Name';
$_['column_url']					= 'URL';
$_['column_action']					= 'Aktion';

// Entry
$_['entry_url']						= 'Shop-URL';
$_['entry_meta_title']				= 'Meta-Tag Titel';
$_['entry_meta_description']		= 'Meta-Tag Beschreibung';
$_['entry_meta_keyword']			= 'Meta-Tag Schlüsselwörter';
$_['entry_layout']					= 'Standardlayout';
$_['entry_theme']					= 'Vorlage';
$_['entry_name']					= 'Shopname';
$_['entry_owner']					= 'Geschäftsinhaber';
$_['entry_address']             	= 'Adresse';
$_['entry_geocode']					= 'Geocode';
$_['entry_email']					= 'Email';
$_['entry_telephone']           	= 'Telefon';
$_['entry_fax']						= 'Fax';
$_['entry_image']					= 'Bild';
$_['entry_open']					= 'Öffnungszeiten';
$_['entry_comment']					= 'Anmerkung';
$_['entry_location']				= 'Adresse';
$_['entry_country']					= 'Land';
$_['entry_zone']					= 'Bundesland';
$_['entry_language']				= 'Sprache';
$_['entry_currency']				= 'Währung';
$_['entry_cookie']					= 'Cookiebestimmungen';
$_['entry_gdpr']					= 'DSGVO Text';
$_['entry_tax']						= 'Preise mit Steuern anzeigen';
$_['entry_tax_default']				= 'Verwende Geschäftsadresse zuer Steuerberechnung';
$_['entry_tax_customer']			= 'Verwende Kundenadresse zur Steuerberechnung';
$_['entry_customer_group']			= 'Standardkundengruppe';
$_['entry_customer_group_display']	= 'Kundengruppe(n)';
$_['entry_customer_price']			= 'Zeige Preise nur angemeldeten Besuchern';
$_['entry_account']					= 'Text bei Registrierung';
$_['entry_cart_weight']				= 'Zeige Gewicht im Warenkorb';
$_['entry_checkout_guest']			= 'Direktbestellung';
$_['entry_checkout']				= 'Text bei Bezahlung';
$_['entry_order_status']			= 'Auftragsstatus Vorgabe';
$_['entry_stock_display']			= 'Zeige Lagerstand';
$_['entry_stock_checkout']			= 'Ohne Lagerstand bezahlen';
$_['entry_logo']					= 'Shoplogo';
$_['entry_icon']					= 'Icon';

// Tab
$_['tab_legal']                      = 'Legal';
$_['tab_tax']                        = 'Taxes';
$_['tab_account']                    = 'Account';
$_['tab_checkout']                   = 'Checkout';
$_['tab_stock']                      = 'Stock';

// Help
$_['help_url']						= 'URL für diesen Shop, muss mit einem Slash \'/\' abschliessen.<br />Beispiel: http://www.meinedomain.com/path/ oder http://untershop.meinedomain.com/<br /><br />Kein Verzeichniss für neuen Shop verwenden.<br /><strong>Es sollte immer entweder auf eine andere Domain oder Subdomain des Hauptshops verwiesen werden</strong>';
$_['help_geocode']					= 'Bitte Geodaten mauell angeben';
$_['help_open']						= 'Öffnungszeiten des Shops';
$_['help_comment']					= 'Optionaler Text für Hinweise im Shop';
$_['help_location']					= 'Adresse wird im Kontaktformular angezeigt';
$_['help_currency']					= 'Standardwährung. Wird diese hier geändert, anschließend Browsercache leere sowie Cookies löschen';
$_['help_cookie']					= 'Zeige Cookiehinweis gemäß EU-Datenschutzbestimungen';
$_['help_gdpr']						= 'Aktiviere DSGVO-Werkzeuge, z.B. eine Kontolöschung zu beantragen.';
$_['help_tax_default']				= 'Falls Besucher nicht eingeloggt ist wird die Geschäftsadresse als Steuerberechnungsbasis verwendet';
$_['help_tax_customer']				= 'Ist Kunde eingeloggt, verwende dessen Standardadresse als Steuerberechnungbasis (entweder Versand- oder Rechnungsadresse)';
$_['help_customer_group']			= 'Standardgruppe in welche neue Kunden eingeordnet werden';
$_['help_customer_group_display']	= 'Zeige bei Neuregistrierung Auswahl für Kundengruppe';
$_['help_customer_price']			= 'Preise werden nur dann angezeigt, wenn Besucher angemeldet sind';
$_['help_account']					= 'Neue Kunden müssen diese Bedingungen akzeptieren bevor sie sich registrieren können';
$_['help_checkout_guest']			= 'Sollen Kunden auch dann bezahlen dürfen wenn sie nicht angemeldet sind.<br />Gilt nicht für Downloadprodukte';
$_['help_checkout']					= 'Kunden müssen vor der Bezahlung diese Bedingungen akzeptieren';
$_['help_order_status']				= 'Standardvorgabe nach Auftragserteilung / Bestellabschluss';
$_['help_stock_display']			= 'Zeige Lagerstand bei Produkten';
$_['help_stock_checkout']			= 'Kunden können auch dann bezahlen wenn kein Lagerstand';
$_['help_icon']						= 'Icon sollte im Format PNG vorliegen und nicht größer als 16x16 Pixel sein';

// Error
$_['error_warning']					= 'Erforderliche Daten nicht angegeben, bitte Felder überprüfen';
$_['error_permission']				= 'Keine Rechte für diese Aktion';
$_['error_url']						= 'Shop-URL erforderlich';
$_['error_meta_title']				= 'Bezeichnung muss zwischen 3 und 32 Zeichen lang sein';
$_['error_name']					= 'Geschäftsname muss zwischen 3 und 32 Zeichen lang sein';
$_['error_owner']					= 'Name des Geschäftsinhabers muss zwischen 3 und 64 Zeichen lang sein';
$_['error_address']					= 'Shopadresse muss zwischen 10 und 256 Zeichen lang sein';
$_['error_email']					= 'Emailadresse ist nicht gültig';
$_['error_telephone']				= 'Telefon muss zwischen 3 und 32 Zeichen lang sein';
$_['error_customer_group_display']	= 'Standardgruppe muss aus einer der aktivierten Kundengruppen ausgewählt sein';
$_['error_default']					= 'Der Standardshop kann nicht gelöscht werden';
$_['error_store']					= 'Dieser Shop kann nicht gelöscht werden da aktuell %s Aufträge damit verbunden sind';

	// < 3.1.x
$_['entry_ssl']						= 'Shop-URL https://';
$_['entry_secure']					= 'SSL verwenden';
$_['help_ssl']						= 'SSL-URL für diesen Shop, muss mit einem Slash \'/\' abschliessen.<br />Beispiel: https://www.meinedomain.com/path/ oder https://untershop.meinedomain.com/<br /><br />Kein Verzeichniss für neuen Shop verwenden.<br /><strong>Es sollte immer entweder auf eine andere Domain oder Subdomain des Hauptshops verwiesen werden.</strong>.<br />Domains bzw. Subdomains müssen innerhalb des Hauptshops am selben Server liegen, externe Domains sind nicht möglich';
$_['help_secure']					= 'Soll eine SSL-Verbindung verwendet werden (empfohlen!), hier aktivieren (Zertifikat muss zuvor am Server installiert sein!)';