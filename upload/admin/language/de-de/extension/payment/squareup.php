<?php
/**
 * @version		$Id: squareup.php 5469 2019-01-08 22:09:26Z mic $
 * @package		Language Translation German Backend
 * @author		mic - https://osworx.net
 * @copyright	2019 OSWorX
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']							= 'Square';
$_['heading_title_transaction']				= 'Zeige Transaktion %s';

// Help
$_['help_total']							= 'Warenkorbgesamtsumme damit diese Zahlunsgart aktiv wird';
$_['help_local_cron']						= 'Dieses Kommando in den Webservereinstellungen unter CRON angeben - mind. 1x täglich';
$_['help_remote_cron']						= 'Diese URL bei einem Webbasierten CRON-Service abgeben - mind. 1x täglich';
$_['help_recurring_status']					= 'Aktivieren um wiederholende Zahlungen zu ermöglichen.<br />Hinweis: zusätzlich muss ein Cronjob mind. 1x täglich laufen';
$_['help_cron_email']						= 'Senden eine Zusammenfassung per Email nach Abarbeitung';
$_['help_cron_email_status']				= 'Aktivierne um Zusammenfassung nach jedem Cronjob';
$_['help_notify_recurring_success']			= 'Informiere Kunden über erfolgreiche Transaktionen';
$_['help_notify_recurring_fail']			= 'Informiere Kunden über nicht erfolgreiche Transaktionen';

// Tab
$_['tab_setting']							= 'Einstellungen';
$_['tab_transaction']						= 'Transaktionen';
$_['tab_cron']								= 'CRON';
$_['tab_recurring']							= 'Wiederkehrende Zahlungen';

// Text
$_['text_access_token_expires_label']		= 'Zugriffstoken läuft ab';
$_['text_access_token_expires_placeholder']	= 'Nicht eingestellt';
$_['text_acknowledge_cron']					= 'Ich bestätige dass ein automatischer Cronjob für eine der Arten aktiviert ist';
$_['text_admin_notifications']				= 'Adminbenachrichtigungen';
$_['text_authorize_label']					= 'Genehmigen';
$_['text_canceled_success']					= 'Zahlung erfolgreich eingestellt';
$_['text_capture']							= 'Übernehmen';
$_['text_client_id_help']					= 'Zu holen von der Verwaltungskonsole bei Square';
$_['text_client_id_label']					= 'Square Application ID';
$_['text_client_id_placeholder']			= 'Square Application ID';
$_['text_client_secret_help']				= 'Zu holen von der Verwaltungskonsole bei Square';
$_['text_client_secret_label']				= 'OAuth Application Secret';
$_['text_client_secret_placeholder']		= 'OAuth Application Secret';
$_['text_confirm_action']					= 'Bitte bestätigen';
$_['text_confirm_cancel']					= 'Sicher diese Abozahlung löschen?';
$_['text_confirm_capture']					= 'Folgenden Betrag übernehmen: <strong>%s</strong>. OK Klicken um forzufahren';
$_['text_confirm_refund']					= 'Bitte Grund für diese Rückzahlung angeben:';
$_['text_confirm_void']						= 'Folgenden Betrag ablehnen: <strong>%s</strong>. OK Klicken um forzufahren';
$_['text_connected']						= 'Verbunden';
$_['text_connected_info']					= 'Wiederverbinden bei anderen Konto oder wenn diese Erweiterung in der Square-Verwaltung deaktiviert wurde. Händisch aktualisieren wenn die letzte Zahlung oder Verbindung mehr als 45 Tage her ist';
$_['text_connection_section']				= 'Square Verbindung';
$_['text_connection_success']				= 'Erfolgreich verbunden';
$_['text_cron_email']						= 'Sende Zusammenfassung an diese Emaildresse';
$_['text_cron_email_status']				= 'Sebdet Zusammenfassung';
$_['text_customer_notifications']			= 'Benachrichtige Kunden';
$_['text_debug_disabled']					= 'Deaktiviert';
$_['text_debug_enabled']					= 'Aktiviert';
$_['text_debug_help']						= 'API Anfragen &amp; Antworten werden im Systembericht mitgeschrieben. Anwenden nur bei Fehlersuche sowie für Etnwickler.';
$_['text_debug_label']						= 'Entwicklermodus';
$_['text_delay_capture_help']				= 'Nur Transaktionen genehmigen oder automatisch durchführen';
$_['text_delay_capture_label']				= 'Transaktionsart';
$_['text_disabled_connect_help_text']		= 'Kunden ID und Geheimbegriff sind erforderlich';
$_['text_edit_heading']						= 'Bearbeiten';
$_['text_enable_sandbox_help']				= 'Sandbox aktivieren für Testtransaktionen';
$_['text_enable_sandbox_label']				= 'Sandbox aktivieren';
$_['text_executables']						= 'CRON Durchführungsarten';
$_['text_extension']						= 'Erweiterungen';
$_['text_extension_status']					= 'Status';
$_['text_extension_status_disabled']		= 'Deaktiviert';
$_['text_extension_status_enabled']			= 'Aktiviert';
$_['text_extension_status_help']			= 'Aktiviert/Deaktiviert diese Zahlart';
$_['text_insert_amount']					= 'Bitte Rückzahlungsbetrag angeben, Maximum: %s von %s';
$_['text_loading']							= 'Lade Daten .. bitte warten ..';
$_['text_loading_short']					= 'Bitte warten ..';
$_['text_local_cron']						= 'Methode 1 - CRON Task';
$_['text_location_error']					= 'Während der Synchronisation der Locations und Token gab es Fehler: %s';
$_['text_location_help']					= 'Eingestellten Squareort für Transaktionen auswählen - muss Kreditkarten beinhalten';
$_['text_location_label']					= 'Ort';
$_['text_manage']							= 'Kreditkartentransaktion (Square)';
$_['text_manage_tooltip']					= 'Siehe Details / Übernehmen / Ablehnen / Rückzahlung';
$_['text_merchant_info_section_heading']	= 'Händlerinformation';
$_['text_merchant_name_label']				= 'Händlername';
$_['text_merchant_name_placeholder']		= 'Nicht definiert';
$_['text_no_appropriate_locations_warning']	= 'Keine Orte im Squarekonto für Onlinekreditkartenbehandlung definiert';
$_['text_no_location_selected_warning']		= 'Ort muss ausgewählt sein';
$_['text_no_locations_label']				= 'Keine gültigen Orte';
$_['text_no_transactions']					= 'Noch keine Transaktionen vorhanden';
$_['text_not_connected']					= 'Nicht verbunden';
$_['text_not_connected_info']				= 'Durch klicken auf diesen Button wird eine Verbindung zum Squarekonto hergestellt und der Dienst aktiviert';
$_['text_notification_ssl']					= 'Ohne aktiviertes SSL im Kassenbereich funktioniert diese Zahlungsart nicht';
$_['text_notify_recurring_fail']			= 'Abozahlung fehlgeschlagen';
$_['text_notify_recurring_success']			= 'Abozahlung erfolgreich';
$_['text_ok']								= 'OK';
$_['text_order_history_cancel']				= 'Abozahlungen wurden eingestellt - die Karte wird nicht länger belastet';
$_['text_payment_method_name_help']			= 'Text Kassabereich';
$_['text_payment_method_name_label']		= 'Text Zahlungsart';
$_['text_payment_method_name_placeholder']	= 'Kreditkarte';
$_['text_recurring_info']					= 'Bitte sicherstellen dass ein täglicher Cronjob aktiviert ist für nachstehende Arten.<br /><br />&bull; Automatische Aktualisierung des API-Zugriffs<br />&bull; Abarbeitung automatischer Zahlungen';
$_['text_recurring_status']					= 'Status von automatischen Zahlungen';
$_['text_redirect_uri_help']				= 'Diesen Link kopieren und im Weiterleitungsfeld Redirect URI field unter Manage Application/oAuth einfügen';
$_['text_redirect_uri_label']				= 'Square OAuth Redirect URL';
$_['text_refresh_access_token_success']		= 'Verbindung zum Squarekonto erfolgreich aktualisiert';
$_['text_refresh_token']					= 'Token wiederherstellen';
$_['text_refund']							= 'Rückzahlung';
$_['text_refund_details']					= 'Rückzahlungsdetails';
$_['text_refunded_amount']					= 'Rückerstattet: %s. Status: %s. Grund: %s';
$_['text_refunds']							= 'Rückzahlungen (%s)';
$_['text_remote_cron']						= 'Methode 2 - Remote CRON';
$_['text_sale_label']						= 'Verkauf';
$_['text_sandbox_access_token_help']		= 'Erhältlich im Squarekonto unter Manage Application';
$_['text_sandbox_access_token_label']		= 'Sandbox Access Token';
$_['text_sandbox_access_token_placeholder']	= 'Sandbox Access Token';
$_['text_sandbox_client_id_help']			= 'Erhältlich im Squarekonto unter Manage Application';
$_['text_sandbox_client_id_label']			= 'Sandbox Application ID';
$_['text_sandbox_client_id_placeholder']	= 'Sandbox Application ID';
$_['text_sandbox_disabled_label']			= 'Deaktiviert';
$_['text_sandbox_enabled']					= 'Sandboxmodus ist aktiviert! Transaktionen werden durchgeführt ohne Kosten';
$_['text_sandbox_enabled_label']			= 'Aktiviert';
$_['text_sandbox_section_heading']			= 'Square Sandbox Einstellungen';
$_['text_select_location']					= 'Ort auswählen';
$_['text_settings_section_heading']			= 'Squareeinstellungen';
$_['text_squareup']							= '<a target="_blank" href="https://squareup.com"><img src="view/image/payment/squareup.png" alt="Square" title="Square" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_success']							= 'Einstellungen erfolgreich bearbeitet';
$_['text_success_capture']					= 'Transakton erfolgreich übernommen';
$_['text_success_refund']					= 'Transaktion erfolgreich rückerstattet';
$_['text_success_void']						= 'Transaktion erfolgreich abgelehnt';
$_['text_token_expired']					= 'Der Square Zugriffscode ist abgelaufen! <a href="%s">Hier klicken</a> um zu erneuern';
$_['text_token_expiry_warning']				= 'Der Square Zugriffscode wird am %s ablaufen. <a href="%s">Hier klicken</a> um zu erneuern';
$_['text_token_revoked']					= 'Square Zugriffscode ist abgelaufen oder ungültig! <a href="%s">Hier klicken</a> um neu zu genehmigen';
$_['text_transaction_statuses']				= 'Transaktionsstatus';
$_['text_view']								= 'Mehr ..';
$_['text_void']								= 'Ablehnen';
$_['text_na']								= 'k.A.';
$_['text_no_reason_provided']				= 'Kein Grund angegeben';

// Statuses
$_['squareup_status_comment_authorized']	= 'Kartentransaktion wurde genehmigt, aber noch nicht übernommen';
$_['squareup_status_comment_captured']		= 'Kartentranskation wurde genehmigt und nachträglich übernommen';
$_['squareup_status_comment_voided']		= 'Kartentransaktion wurde genhemigt und nachträglich abgelehnt';
$_['squareup_status_comment_failed']		= 'Kartentransaktion fehlgeschlagen';

// Entry
$_['entry_total']							= 'Gesamt';
$_['entry_geo_zone']						= 'Geozone';
$_['entry_sort_order']						= 'Reihenfolge';
$_['entry_merchant']						= 'Händlernr.';
$_['entry_transaction_id']					= 'Transaktionnr.';
$_['entry_order_id']						= 'Auftragsnr.';
$_['entry_partner_solution_id']				= 'Partnernr.';
$_['entry_type']							= 'Transaktionsart';
$_['entry_currency']						= 'Währung';
$_['entry_amount']							= 'Betrag';
$_['entry_browser']							= 'Browser';
$_['entry_ip']								= 'IP';
$_['entry_date_created']					= 'Erstellt';
$_['entry_billing_address_company']			= 'Rechnung Firma';
$_['entry_billing_address_street']			= 'Rechnung Strasse';
$_['entry_billing_address_city']			= 'Rechnung Stadt';
$_['entry_billing_address_postcode']		= 'Rechnung PLZ';
$_['entry_billing_address_province']		= 'Rechnung Staat';
$_['entry_billing_address_country']			= 'Rechnung Land';
$_['entry_status_authorized']				= 'Genehmigt';
$_['entry_status_captured']					= 'Übernommen';
$_['entry_status_voided']					= 'Abglehnt';
$_['entry_status_failed']					= 'Fehlgeschlagen';
$_['entry_setup_confirmation']				= 'Einstellungsbestätigung';

// Error
$_['error_permission']						= 'Keine Rechte für diese Aktion';
$_['error_permission_recurring']			= 'Keine Rechte Abozahlungen zu bearbeiten';
$_['error_transaction_missing']				= 'Transaktion nicht gefunden';
$_['error_no_ssl']							= 'SSL muss aktiviert sein';
$_['error_user_rejected_connect_attempt']	= 'Verbindungsversuch wurde abgebrochen';
$_['error_possible_xss']					= 'Möglicher Einbruchsvesuch entdeckt - Verbindung wurde unterbrochen. Bitte Applikationnr. sowie Geheimbegriff überpüfen und nochmal versuchen';
$_['error_invalid_email']					= 'Emailadresse nicht gültig';
$_['error_cron_acknowledge']				= 'Bitte Einrichtung von Cronjob bestätigen';
$_['error_client_id']						= 'App ID erforderlich';
$_['error_client_secret']					= 'Geheimbegriff erforderlich';
$_['error_sandbox_client_id']				= 'Sandbox Nr. ist erforderlich für Sandboxmodus';
$_['error_sandbox_token']					= 'Sandbox Token ist erforderlich für Sandboxmodus';
$_['error_no_location_selected']			= 'Ort ist erforderlich';
$_['error_refresh_access_token']			= 'Fehler während der Aktualisierung. Bitte Einstellungen überprüfen und nochml probieren';
$_['error_form']							= 'Bitte alle Felder überprüfen';
$_['error_token']							= 'Während der Aktualisierung des Tokens trat ein Fehler auf: %s';
$_['error_no_refund']						= 'Rückzahlung fehlgeschlagen';

// Column
$_['column_transaction_id']					= 'Transaktionsnr.';
$_['column_order_id']						= 'Auftragsnr.';
$_['column_customer']						= 'Kunde';
$_['column_status']							= 'Status';
$_['column_type']							= 'Art';
$_['column_amount']							= 'Betrag';
$_['column_ip']								= 'IP';
$_['column_date_created']					= 'Erstellt';
$_['column_action']							= 'Aktion';
$_['column_refunds']						= 'Rückzahl.';
$_['column_reason']							= 'Grund';
$_['column_fee']							= 'Gebühr';

// Button
$_['button_void']							= 'Ungültig';
$_['button_refund']							= 'Rückerstatten';
$_['button_capture']						= 'Übernehmen';
$_['button_connect']						= 'Verbinden';
$_['button_reconnect']						= 'Wieder verbinden';
$_['button_refresh']						= 'Aktualisieren';