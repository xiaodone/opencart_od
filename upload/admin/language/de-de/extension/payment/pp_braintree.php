<?php
/**
 * @version		$Id: pp_braintree.php 5469 2019-01-08 22:09:26Z mic $
 * @package		Language Translation German Backend
 * @author		mic - https://osworx.net
 * @copyright	2019 OSWorX
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']					= 'PayPal (Powered by Braintree)';

// Text
$_['text_extension']		 		= 'Erweiterungen';
$_['text_pp_braintree']				= '<img src="view/image/payment/paypal.png" alt="PayPal (Powered by Braintree)" title="PayPal (Powered by Braintree)" style="border: 1px solid #EEEEEE;" />';
$_['text_payment']					= 'Zahlart';
$_['text_success']					= 'Datensatz erfolgreich bearbeitet';
$_['text_success_connect']			= 'Erfolgreich mit PayPal verbunden';
$_['text_edit']						= 'Bearbeiten';
$_['text_production']				= 'Live';
$_['text_sandbox']					= 'Sandbox';
$_['text_currency']					= 'Währung';
$_['text_immediate']				= 'Sofort';
$_['text_deferred']					= 'Genehmigung';
$_['text_merchant_account_id']		= 'Händlernr. (leer lassen für Standardnr.)';
$_['text_payment_info']				= 'Payment information';
$_['text_confirm_void']				= 'Sicher diese Transaktion ungültig erklären?';
$_['text_avs_response']				= 'Straße: %s, PLZ: %s';
$_['text_confirm_settle']			= 'Sicher übernehmen?';
$_['text_confirm_refund']			= 'Sicher rückzahlen?';
$_['text_success_action']			= 'Erfolgreich';
$_['text_error_settle']				= 'Fehler: %s';
$_['text_error_generic']			= 'Fehler mit der Anfrage';
$_['text_na']						= 'k.A.';
$_['text_all']						= 'Alle';
$_['text_sale']						= 'Verkauf';
$_['text_credit']					= 'Guthaben';
$_['text_credit_card']				= 'Kreditkarte';
$_['text_paypal']					= 'PayPal';
$_['text_enable_transactions']		= 'Bitte Braintree aktivieren vor Transkationenansicht';
$_['text_yes']						= 'Ja';
$_['text_no']						= 'Nein';
$_['text_no_refund']				= 'Keine Rückzahlungsaktionen';
$_['text_app_connected']		    = 'Modul ist verbunden über Braintreeauthentifizierung';
$_['text_paypal_gold'] 				= 'Gold';
$_['text_paypal_blue'] 				= 'Blau';
$_['text_paypal_silver'] 			= 'Silber';
$_['text_paypal_tiny']		 		= 'Klein';
$_['text_paypal_small']		 		= 'Small';
$_['text_paypal_medium']		 	= 'Medium';
$_['text_paypal_pill']		 		= 'Abgerundet';
$_['text_paypal_rectangular']		= 'Rechteckig';
$_['text_paypal_preview']		 	= 'Buttonvorschau<br />Zuerst sichern';
$_['text_3ds']		 	 			= '3D Secure';
$_['text_cvv']		 	 			= 'CVV Nummer';
$_['text_accept']			 	 	= 'Akzeptieren';
$_['text_decline']			 	 	= 'Ablehnen';
$_['text_merchant_connected']		= 'Verbinde Händlernr.: ';
$_['text_enable_button']			= 'Um den Button anzuzeigen, bitte Layoutverwaltung öffnen und PayPal (Powered by Braintree) einem Layout zuweisen';
$_['text_3ds_ssl']		 			= 'Um 3D Secure verwenden zu können, muss im Store ein SSL-Zertifikat installiert sein';
$_['text_unlink']		 			= 'Link löschen';
$_['text_connect_braintree']		= 'Mit Braintree verbinden';

// Column
$_['column_void']					= 'Ungültig';
$_['column_settle']					= 'Bereinigen';
$_['column_refund']					= 'Rückzahlung';
$_['column_transaction_id']			= 'Transaktionnr.';
$_['column_transaction_type']		= 'Transaktopnart';
$_['column_transaction_date']		= 'Transaktionsdatum';
$_['column_merchant_account']		= 'Händlerkonto';
$_['column_payment_type']			= 'Zahlungsart';
$_['column_order_id']				= 'Auftragsnr.';
$_['column_processor_code']			= 'Auth. Code';
$_['column_cvv_response']			= 'CVV Antwort';
$_['column_avs_response']			= 'AVS Antwort';
$_['column_3ds_enrolled']			= '3DS Aktiviert';
$_['column_3ds_status']				= '3DS Status';
$_['column_3ds_shifted']			= '3DS Haftung umgestellt';
$_['column_3ds_shift_possible']		= '3DS Haftung möglich';
$_['column_transaction_history']	= 'Transaktionstatus Verlauf';
$_['column_date']					= 'Datum';
$_['column_refund_history']			= 'Rückzahlungsverlauf';
$_['column_action']					= 'Aktion';
$_['column_amount']					= 'Betrag';
$_['column_status']					= 'Status';
$_['column_type']					= 'Art';
$_['column_customer']				= 'Kunde';
$_['column_order']					= 'Auftrag';
$_['column_date_added']				= 'Erstellt';

// Entry
$_['entry_merchant_id']				= 'Händlernr.';
$_['entry_public_key']				= 'Öffentl. Schlüssel';
$_['entry_private_key']				= 'Privater Schlüssel';
$_['entry_environment']				= 'Umgebung';
$_['entry_settlement_type']			= 'Abrechnungsart';
$_['entry_card_vault']				= 'Aktiviere Kartenschutz';
$_['entry_card_check_vault']		= 'Kartenschutz ist voreingestellt';
$_['entry_paypal_vault']			= 'Aktiviere PayPal-Schutz';
$_['entry_paypal_check_vault']		= 'PayPal-SChutz ist voreingestellt';
$_['entry_vault_cvv_3ds']			= 'Benötigt CVV2 oder 3D Ssecure?';
$_['entry_debug']					= 'Berichte';
$_['entry_total']					= 'Gesamt';
$_['entry_geo_zone']				= 'Geozone';
$_['entry_status']					= 'Status';
$_['entry_sort_order']				= 'Reihenfolge';
$_['entry_authorization_expired']	= 'Genehmigung abgelaufen';
$_['entry_authorized']				= 'Genehmigt';
$_['entry_authorizing']				= 'Genehmigung läuft';
$_['entry_settlement_pending']		= 'Abrechung ausständig';
$_['entry_failed']					= 'Fehlgeschlagen';
$_['entry_gateway_rejected']		= 'Gateway zurück gewiesen';
$_['entry_processor_declined']		= 'Processor abgelehnt';
$_['entry_settled']					= 'Abgerechnet';
$_['entry_settling']				= 'In Abrechnung';
$_['entry_submitted_for_settlement']= 'Übermittelt zur Abrechnung';
$_['entry_voided']					= 'Ungültig';
$_['entry_transaction_id']			= 'Transaktionsnr.';
$_['entry_transaction_type']		= 'Transaktionsart';
$_['entry_date_from']				= 'Datum Von';
$_['entry_date_to']					= 'Datum Bis';
$_['entry_payment_type']			= 'Zahlungsart';
$_['entry_card_type']				= 'Kartenart';
$_['entry_amount_from']				= 'Betrag Von';
$_['entry_amount_to']				= 'Betrag Bis';
$_['entry_transaction_status']		= 'Transaktionsstatus';
$_['entry_merchant_account_id']		= 'Händler Kontonr.';
$_['entry_connection']		 		= 'API Verbindungsstatus';
$_['entry_paypal_option']		    = 'Zeige PayPal Option';
$_['entry_paypal_button_colour']	= 'Buttonfarbe';
$_['entry_paypal_button_shape']		= 'Buttonumriß';
$_['entry_paypal_button_size']		= 'Buttongröße';
$_['entry_paypal_billing_agreement']= 'Beschreibung Zahlungsvereinbarung';
$_['entry_3ds_status']				= '3D Secure aktivieren';

$_['entry_3ds_unsupported_card'] 	= 'Nicht unterstützte Karte<br />Vorgabe: Annehmen';
$_['entry_3ds_lookup_error'] 		= 'Lookupfehler<br />Vorgabe: Annehmen';
$_['entry_3ds_lookup_enrolled'] 	= 'Lookup angemeldet<br />Vorgabe: Annehmen';
$_['entry_3ds_lookup_not_enrolled'] = 'Lookup nicht angemeldet<br />Vorgabe: Annehmen';
$_['entry_3ds_not_participating'] 	= 'Genehmigung erfolgreich, Aussteller nimmt nicht teil<br />Vorgabe: Annehmen';
$_['entry_3ds_unavailable'] 		= 'Genehmigung nicht erreichbar<br />Vorgabe: Annehmen';
$_['entry_3ds_signature_failed'] 	= 'Fehler Genehmigungsunterschrift Überprüfung<br />Vorgabe: Ablehnen';
$_['entry_3ds_successful'] 			= 'Genehmigung erfolgreich<br />Vorgabe: Annehmen';
$_['entry_3ds_attempt_successful'] 	= 'Genehmigungsversuch erfolgreich<br />Vorgabe: Annehmen';
$_['entry_3ds_failed'] 				= 'Genehmigung fehlgeschlagen<br />Vorgabe: Ablehnen';
$_['entry_3ds_unable_to_auth'] 		= 'Genehmigung nicht möglich<br />Vorgabe: Annehmen';
$_['entry_3ds_error'] 				= 'Genehmigungsfehler<br />Vorgabe: Annehmen';

// Help
$_['help_settlement_type']			= 'Sofort rechnet sofort ab, bei Genehmigung muss der Händler die Zahlung bestätigen';
$_['help_card_vault']				= 'Erlaube Kunden Kartendetails zu merken';
$_['help_paypal_vault']				= 'Erlaube Kunden das PayPal-Konto zu merken';
$_['help_card_check_vault']			= 'Checkbox für Kartenschutz ist voraktiviert';
$_['help_paypal_check_vault']		= 'Checkbox für PayPal-Schutz ist voraktiviert';
$_['help_vault_cvv_3ds']			= 'Erfordert vom Kunden die Verwendung um CVV2 Nummer einzugeben oder 3D-Secure anzuwenden. Es ist nicht möglich beide Arten anzuwenden';
$_['help_debug']					= 'Wenn aktiviert werden tw. sensible Daten gespeichert. Sollte nur aktiviert werden bei Problemen';
$_['help_total']					= 'Mindestgesamtsumme Warenkorb damit diese Zahlungsart aktiv wird';
$_['help_paypal_option']			= 'Wenn das PayPal-Konto mit Braintree verlinkt ist, kann auch die PayPal-Option angezeigt werden';
$_['help_paypal_billing_agreement']	= 'Eine optionale Zahlungsvereinbarung welche im PayPal-Fenster angezeigt wird wenn Schutz aktiv';

// Button
$_['button_void']					= 'Ungültig';
$_['button_settle']					= 'Abrechnen';
$_['button_refund']					= 'Rückzahlung';
$_['button_filter']					= 'Filter';

// Error
$_['error_permission']				= 'Keine Berechtigung zum bearbeiten';
$_['error_php_version']				= 'Es wird mindestens PHP-Version 5.4.0 benötigt';
$_['error_merchant_id']				= 'Händlernr. erforderlich';
$_['error_public_key']				= 'Öffentl. Schlüssel erforderlich';
$_['error_private_key']				= 'Privater Schlüssel erforderlich';
$_['error_connection']				= 'Mit der Verbindung zur Braintree API gibt es ein Problem. Bitte Daten überprüfen';
$_['error_account']					= 'Gültige Händlernr. erforderlich (siehe Braintree-Konto)';
$_['error_warning']					= 'Achtung: fehlende oder/und unrichtige Daten';
$_['error_3ds_not_ready']			= '3d-Secure wurde aktiviert, jedoch im Braintree-Konto nicht aktiv. Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_paypal_not_ready']		= 'PayPal wurde aktiviert, jedoch im Braintree-Konto nicht aktiv.  Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_paypal_billing_not_ready']	= 'PayPal Schutz/Abrechnung Vereinbarung wurde aktiviert, jedoch im Braintree-Konto nicht aktiv. Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_braintree_account_3ds'] 		= '3DS ist nicht im Braintree-Konto aktiv, zudem nicht verfügbar in allen Ländern. Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_braintree_account_paypal']	= 'PayPal ist nicht aktiv im Braintree-Konto. Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_braintree_account_billing']	= 'Zahlungsvereinbarungen sind im Braintree-Konto nicht aktiv. Bitte zu <a href="https://www.braintreegateway.com/login" title="Braintree" target="_blank">Braintree Konto</a> gehen, oder Braintree Support kontaktieren';
$_['error_environment']					= 'Die Umgebung kann nicht auf %s gesetzt werden wenn die Angaben zu %s Braintree-Konto unterschiedlich sind';

// Tab
$_['tab_setting']					 	= 'Einstellungen';
$_['tab_currency']					 	= 'Währungen';
$_['tab_order_status']				 	= 'Auftragstatus (neue Aufräge)';
$_['tab_3ds']						 	= '3D Secure';
$_['tab_transaction']				 	= 'Transaktionssuche';
$_['tab_vault']				 	 	 	= 'Schutz';
$_['tab_paypal']				 	 	= 'PayPal';

// OC < 3.1
$_['text_braintree']        		= '<img width="100" src="https://s3-us-west-1.amazonaws.com/bt-partner-assets/paypal-braintree.png" alt="PayPal powered by Braintree" style="border: 1px solid #EEEEEE;">';
$_['text_braintree_learn']		 	= 'Zum Starten, auf Verbinden mit Braintree klicken. <a href="https://www.braintreepayments.com/partners/learn-more" target="_blank">Mehr darüber hier</a>';
$_['text_preferred_main']		 	= 'Für Geschäfte aller Größen, einfache Prozesse. Keine Monatsgebühren, jedoch mind. 2.9% vom Umsatz + 0.30 U$ je Transaktion';
$_['text_preferred_li_1']			= 'Alle Vorteile von PayPal, plus Kreditkarten';
$_['text_preferred_li_2']			= 'Schnelle Konfiguration';
$_['text_preferred_li_3']			= 'PCI DSS v3.0 SAQ-A';
$_['text_preferred_li_4']			= 'Unterstützung von Kartendetails';
$_['text_learn_more']			 	= '(Mehr darüber)';