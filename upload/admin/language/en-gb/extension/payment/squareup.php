<?php

// Heading
$_['heading_title']                                     = 'Square';
$_['heading_title_transaction']                         = 'View Transaction #%s';
$_['heading_title_confirm_merchant']                    = 'Switch Merchant Account';

// Help
$_['help_cron_email']                                   = 'A summary of the recurring task will be sent to this e-mail after completion.';
$_['help_cron_email_status']                            = 'Enable to receive a summary after every CRON task.';
$_['help_local_cron']                                   = 'Insert this command in your web server CRON tab. Set it up to run every minute.';
$_['help_notify_recurring_fail']                        = 'Notify customers about failed recurring transactions.';
$_['help_notify_recurring_success']                     = 'Notify customers about successful recurring transactions.';
$_['help_recurring_status']                             = 'Enable to allow periodic recurring payments.<br />NOTE: You must also setup a daily CRON task.';
$_['help_remote_cron']                                  = 'Use this URL to set up a CRON task via a web-based CRON service. Set it up to run every minute.';
$_['help_total']                                        = 'The checkout total the order must reach before this payment method becomes active.';

// Tab
$_['tab_recurring']                                     = 'Recurring Payments';
$_['tab_setting']                                       = 'Settings';
$_['tab_transaction']                                   = 'Transactions';

// Text
$_['text_access_token_expires_label']                   = 'Access token expires';
$_['text_access_token_expires_placeholder']             = 'Not setup';
$_['text_acknowledge_cron']                             = 'I confirm that I have set up an automated CRON task using one of the methods above.';
$_['text_acknowledge_on_demand_cron']                   = 'I confirm that I have configured the Square CRON task to run <strong>once per minute</strong>.';
$_['text_ad_hoc_sync_help']                             = 'Avoid syncing of Options and Taxes? They will still be visible in the Square Orders, but not in your Square Catalog. Enabling this option will speed up Catalog Sync. It will also allow you to more easily use the Square Items Export/Import feature, found in the Square Dashboard.';
$_['text_ad_hoc_sync_label']                            = 'Ad-Hoc Sync';
$_['text_advanced_settings']                            = '5. Advanced Settings';
$_['text_advanced_settings_info']                       = 'Click the button below to configure the advanced settings.';
$_['text_auth_voided_6_days']                           = 'You have enabled delayed capture. If you do not capture authorized transactions, Square will automatically void them 6 days after they have been placed.';
$_['text_authorize_label']                              = 'Authorize';
$_['text_back']                                         = 'Back';
$_['text_basic_settings']                               = '3. Basic Settings';
$_['text_begin_on_demand_sync']                         = 'Begin On-Demand Sync';
$_['text_canceled_success']                             = 'Success: You have succesfully canceled this payment!';
$_['text_capture']                                      = 'Capture';
$_['text_client_id_help']                               = 'Get this from the Manage Application page on Square';
$_['text_client_id_label']                              = 'Square Application ID';
$_['text_client_id_placeholder']                        = 'Square Application ID';
$_['text_client_secret_help']                           = 'Get this from the Manage Application page on Square';
$_['text_client_secret_label']                          = 'OAuth Application Secret';
$_['text_client_secret_placeholder']                    = 'OAuth Application Secret';
$_['text_configure_geo_zone']                           = 'Setup Geo Zones';       
$_['text_confirm_action']                               = 'Are you sure?';
$_['text_confirm_cancel']                               = 'Are you sure you want to cancel the recurring payments?';
$_['text_confirm_capture']                              = 'You are about to capture the following amount: <strong>%s</strong>. Click OK to proceed.';
$_['text_confirm_refund']                               = 'Please provide a reason for the refund:';
$_['text_confirm_void']                                 = 'You are about to void the following amount: <strong>%s</strong>. Click OK to proceed.';
$_['text_connected']                                    = 'Connected';
$_['text_connected_info']                               = "Reconnect if you want to switch accounts or have manually revoked this extension's access from the Square App console.";
$_['text_connection_section']                           = '1. Connect';
$_['text_connection_success']                           = 'Successfully connected!';
$_['text_cron_email']                                   = 'Send task summary to this e-mail:';
$_['text_cron_email_status']                            = 'Send e-mail summary:';
$_['text_cron_settings']                                = '2. CRON Settings';
$_['text_cron_status_text_completed']                   = '%s - COMPLETED';
$_['text_cron_status_text_failed']                      = '%s - FAILED';
$_['text_cron_status_text_label']                       = 'CRON Status';
$_['text_cron_status_text_queued']                      = '%s - QUEUED';
$_['text_cron_status_text_running']                     = '%s - RUNNING';
$_['text_cron_status_text_timed_out']                   = '%s - TIMED OUT';
$_['text_currency_different']                           = 'Catalog Sync has been disabled because your default store currency (%s) is different than the Square Location currency (%s).';
$_['text_customer_notifications']                       = 'Customer notifications';
$_['text_debug_disabled']                               = 'Disabled';
$_['text_debug_enabled']                                = 'Enabled';
$_['text_debug_help']                                   = 'API requests and responses will be logged in the OpenCart error log. Use this for only for debugging and development purposes.';
$_['text_debug_label']                                  = 'Debug Logging';
$_['text_delay_capture_help']                           = 'Only authorize transactions or perform charges automatically';
$_['text_delay_capture_label']                          = 'Transaction type';
$_['text_disabled_connect_help_text']                   = 'The client id and secret are required fields.';
$_['text_edit_heading']                                 = 'Edit Square';
$_['text_enable_accepted_cards_help']                   = 'Show icons with the accepted credit cards?';
$_['text_enable_accepted_cards_label']                  = 'Accepted Credit Cards';
$_['text_enable_icon_help']                             = 'Show a &quot;Secured by Square&quot; icon at the end of the checkout form?';
$_['text_enable_icon_label']                            = 'Security icon';
$_['text_enable_payment']                               = 'Make sure to enable online payments for your Square account.';
$_['text_extension']                                    = 'Extensions';
$_['text_extension_disabled']                           = 'The Square payment extension is currently disabled.';
$_['text_extension_status']                             = 'Extension status';
$_['text_extension_status_disabled']                    = 'Disabled'; 
$_['text_extension_status_enabled']                     = 'Enabled'; 
$_['text_extension_status_heading']                     = '6. Extension Status';
$_['text_extension_status_help']                        = 'Enable or disable the payment method';
$_['text_fully_refunded']                               = 'Fully Refunded';
$_['text_fully_refunded_comment']                       = 'Order refund processed. Transaction was fully refunded.';
$_['text_guest_disabled']                               = 'Disabled';
$_['text_guest_enabled']                                = 'Enabled';
$_['text_guest_help']                                   = 'Enable to display the guest customer names on the transactions listed in the Square Dashboard.';
$_['text_guest_label']                                  = 'Guest Customer Names';
$_['text_hidden_option']                                = 'Hidden';
$_['text_insert_amount']                                = 'Please insert the refund amount. Maximum: %s in %s:';
$_['text_integration_settings_help']                    = 'Documentation';
$_['text_inventory_sync_all']                           = 'Enabled - Fetch inventories from all Square Locations';
$_['text_inventory_sync_help']                          = 'Should Square also sync the catalog inventories?';
$_['text_inventory_sync_info']                          = 'Square can only be the source of truth for inventory counts (quantities), and <strong>not</strong> for prices, item names, categories, etc.';
$_['text_inventory_sync_label']                         = 'Inventory Sync';
$_['text_inventory_sync_single']                        = 'Enabled - Fetch inventories only from the configured Square Location';
$_['text_itemized_refund_heading']                      = 'Refund';
$_['text_itemized_refund_intro']                        = 'Select which items to refund. You cannot refund more than the allowed amount of <strong>%s</strong> in <strong>%s</strong>. The next screen will allow you to re-stock items.';
$_['text_itemized_refund_reason']                       = 'Itemized Refund';
$_['text_itemized_refund_restock_total']                = 'The following amount will be refunded: <strong>{price_prefix}{price}{price_suffix}</strong>';
$_['text_itemized_refund_summary_heading']              = 'Refund Summary';
$_['text_itemized_restock_heading']                     = 'Re-Stock';
$_['text_itemized_restock_intro']                       = 'Select how many items to re-stock.';
$_['text_itemized_restock_summary_heading']             = 'Re-Stock Summary';
$_['text_loading']                                      = 'Loading data... Please wait...';
$_['text_loading_short']                                = 'Please wait...';
$_['text_local_cron']                                   = 'Method #1 - CRON Task:';
$_['text_location_error']                               = 'There was an error when trying to sync locations and token: %s';
$_['text_location_help']                                = 'Select which configured Square location to be used for transactions. Has to have card processing capabilities enabled.';
$_['text_location_label']                               = 'Location';
$_['text_manage']                                       = 'Credit Card Transaction (Square)';
$_['text_manage_tooltip']                               = 'See details / Capture / Void / Refund';
$_['text_merchant_name_label']                          = 'Merchant name';
$_['text_merchant_name_placeholder']                    = 'Not setup';
$_['text_na']                                           = 'N/A';
$_['text_next']                                         = 'Next';
$_['text_no_appropriate_locations_warning']             = 'There are no locations capable of online card processing setup in your Square account.';
$_['text_no_items_restock_refund']                      = 'No items will be re-stocked/refunded.';
$_['text_no_location_selected_warning']                 = 'There is no selected location.';
$_['text_no_locations_label']                           = 'No valid locations';
$_['text_no_reason_provided']                           = 'Reason not provided.';
$_['text_no_transactions']                              = 'No transactions have been logged yet.';
$_['text_not_connected']                                = 'Not connected';
$_['text_not_connected_info_1']                         = 'Please make sure you have already copy/pasted the Redirect URL to your Square App <em>prior to connecting</em>.';
$_['text_not_connected_info_2']                         = 'By clicking this button you will connect this OpenCart module to your Square account.';
$_['text_notification_ssl']                             = 'Make sure you have SSL enabled on your checkout page. Otherwise, the extension will not work.';
$_['text_notify_recurring_fail']                        = 'Recurring Transaction Failed:';
$_['text_notify_recurring_success']                     = 'Recurring Transaction Successful:';
$_['text_ok']                                           = 'Finish';
$_['text_on_demand_cron_heading']                       = 'On-Demand Sync - action required';
$_['text_on_demand_cron_intro']                         = 'This action will force an immediate Catalog Sync and Inventory Sync. You must modify your CRON task to run <strong>every minute</strong>.';
$_['text_opencart_sync_option']                         = 'From OpenCart to Square';
$_['text_option_already_restocked']                     = ' - already re-stocked';
$_['text_order_history_cancel']                         = 'An administrator has canceled your recurring payments. Your card will no longer be charged.';
$_['text_order_status_settings']                        = '4. Order Status Settings';
$_['text_order_status_settings_info']                   = 'The order status pairings have already been configured. Click the button below to edit the pairings.';
$_['text_partially_refunded']                           = 'Partially Refunded';
$_['text_partially_refunded_comment']                   = 'Order refund processed. Transaction was partially refunded.';
$_['text_payment_method_name_help']                     = 'Checkout payment method name';
$_['text_payment_method_name_label']                    = 'Payment method name';
$_['text_payment_method_name_placeholder']              = 'Credit / Debit Card';
$_['text_please_connect']                               = 'Please connect your Square application before saving.';
$_['text_recurring_info']                               = 'Please make sure to set up a CRON task executing <strong>each minute</strong> using one of the methods below. CRON jobs help you with:<br /><br />&bull; Periodic syncing of your OpenCart catalog with your Square catalog<br />&bull; Automatic refresh of your API access token<br />&bull; Processing of recurring transactions';
$_['text_recurring_status']                             = 'Status of recurring payments:';
$_['text_redirect_uri_help']                            = 'Paste this link into the Redirect URI field under Manage Application/oAuth';
$_['text_redirect_uri_label']                           = 'Square OAuth Redirect URL';
$_['text_refresh_access_token_success']                 = 'Successfully refreshed the connection to your Square account.'; 
$_['text_refresh_token']                                = 'Re-create token';
$_['text_refund']                                       = 'Refund';
$_['text_refund_details']                               = 'Refund Details';
$_['text_refund_itemized']                              = 'Itemized Refund - select products to refund and restock';
$_['text_refund_only_amount']                           = 'Refund Only Amount - specify the refunded amount';
$_['text_refund_pending']                               = '%s (Refund Pending)';
$_['text_refunded_amount']                              = 'Refunded: %s. Status of the refund: %s. Reason for the refund: %s';
$_['text_refunds']                                      = 'Refunds (%s)';
$_['text_remote_cron']                                  = 'Method #2 - Remote CRON:';
$_['text_sale_label']                                   = 'Sale';
$_['text_select_initial_sync_mode']                     = 'Configure the initial Sync';
$_['text_select_refund_type']                           = 'Please select the type of refund:';
$_['text_select_status']                                = '-- Select Status (Required) --';
$_['text_setup_tax_rate']                               = 'Setup Geo Zones for the new Tax Rates';
$_['text_setup_tax_rate_geo_zone_intro']                = 'These Tax Rates do not yet have an assigned Geo Zone. To make them usable in OpenCart, please assign a Geo Zone for each Tax Rate.';
$_['text_square_sync_option']                           = 'From Square to OpenCart';
$_['text_squareup']                                     = '<a target="_BLANK" href="https://squareup.com"><img src="view/image/payment/squareup.png" alt="Square" title="Square" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_success']                                      = 'Success: You have modified Square payment module!';
$_['text_success_capture']                              = 'Transaction successfully captured!';
$_['text_success_geo_zone']                             = 'Success: The new Geo Zones have been created!';
$_['text_success_refund']                               = 'Transaction successfully refunded!';
$_['text_success_void']                                 = 'Transaction successfully voided!';
$_['text_sync_configure_intro']                         = 'At the Square location <strong>%s</strong>, you have <strong>%s</strong> items. In OpenCart, you have <strong>%s</strong> items. Please select a catalog source of truth:';
$_['text_sync_configure_option_1_assign']               = 'Use the OpenCart catalog as source of truth for this location (assign <strong>%s</strong> Square Items to this location).';
$_['text_sync_configure_option_1_unassign']             = 'Use the OpenCart catalog as source of truth for this location (unassign <strong>%s</strong> Square Items from this location).';
$_['text_sync_configure_option_2']                      = 'First, migrate all <strong>%s</strong> Square items to OpenCart, then use OpenCart as the source of truth for this location.';
$_['text_sync_configure_option_3_assign']               = 'Use the Square catalog as source of truth (create <strong>%s</strong> OpenCart products).';
$_['text_sync_configure_option_3_unassign']             = 'Use the Square catalog as source of truth (delete <strong>%s</strong> OpenCart products).';
$_['text_sync_configure_option_4']                      = 'First, migrate all <strong>%s</strong> OpenCart items to Square, then Square as the source of truth for this location.';
$_['text_sync_source_help']                             = 'Sync the OpenCart Catalog with Square? OpenCart will be the source of truth. Your default OpenCart currency <em>MUST</em> be the same as your Square Location currency.';
$_['text_sync_source_label']                            = 'Catalog Sync';
$_['text_token_expired']                                = 'Your Square access token has expired! <a href="%s">Click here</a> to renew it now.';
$_['text_token_expiry_warning']                         = 'Your Square access token will expire on %s. <a href="%s">Click here</a> to renew it now.';
$_['text_token_revoked']                                = 'Your Square access token has expired or has been revoked! <a href="javascript:void(0)" id="focus_connect">Click here</a> to re-authorize the Square extension.';
$_['text_video_help']                                   = 'Video tutorial';
$_['text_view']                                         = 'View More';
$_['text_visible_option']                               = 'Visible';
$_['text_void']                                         = 'Void';
$_['text_warning_cron']                                 = 'Make sure to set up a CRON job for this payment extension. <a href="javascript:void(0)" id="cron_click">Click here</a> to see the CRON settings.';
$_['text_webhook_error']                                = 'There was an error when trying to configure the location webhook: %s';
$_['text_webhook_signature_help']                       = 'Upon submitting your Webhook Notification URL to Square, you will obtain a Signature Key. Paste it in this field.';
$_['text_webhook_signature_label']                      = 'Webhook Signature Key';
$_['text_webhook_url_help']                             = 'Paste this link into the Notification URL field under Manage Application/Webhooks';
$_['text_webhook_url_label']                            = 'Webhook Notification URL';
$_['text_zone_australia']                               = '<strong>Australia</strong> - a single Geo Zone for all states';
$_['text_zone_canada']                                  = '<strong>Canada</strong> - a Geo Zone per every province';
$_['text_zone_eu_uk']                                   = '<strong>EU and UK</strong> - a single Geo Zone for all countries and provinces';
$_['text_zone_intro_1']                                 = 'This is a one-time preliminary setup of Geo Zones which you can skip.';
$_['text_zone_intro_2']                                 = 'The Square extension can be used to synchronize your OpenCart and Square taxes. Whenever taxes are imported from Square, you will be required to assign them to Geo Zones.';
$_['text_zone_intro_3']                                 = 'Please confirm if you would like Square to automatically set up Geo Zones which you can use later:';
$_['text_zone_japan']                                   = '<strong>Japan</strong> - a single Geo Zone for all prefectures';
$_['text_zone_store_country']                           = '<strong>%s</strong> - a single Geo Zone for all provinces';
$_['text_zone_usa']                                     = '<strong>USA</strong> - a Geo Zone per every state';
$_['text_ad_hoc_warning']                               = '<strong>Warning:</strong> Enabling this will delete all OpenCart-created modifiers and taxes.';
$_['text_different_merchant']                           = 'This transaction was made on another merchant account: #%s or on a no longer existing location of the same account. The currently logged account is #%s.';
$_['text_confirm_merchant']                             = 'Change merchant account?';
$_['text_confirm_merchant_intro_1']                     = 'You have just re-connected the Square extension with a different merchant account.';
$_['text_confirm_merchant_intro_2']                     = 'If you accept with this change, this will modify the following information:';
$_['text_confirm_merchant_delete_catalog_sync']         = '<strong>Catalog Sync</strong> - an On-Demand Catalog Sync will begin immediately after you accept. This is to ensure the OpenCart catalog and the Square catalog of the new merchant will be the same.';
$_['text_confirm_merchant_delete_customers_cards']      = '<strong>Credit Cards on File</strong> - all credit cards your OpenCart customers have stored on file will be forgotten.';
$_['text_is_ad_hoc_item']                               = 'This is an ad-hoc item and it cannot be re-stocked.';
$_['text_product_warning']                              = 'Note: Editing the product quantity from this form is <em>not recommended</em>, as it will be overwritten by Square as per <a href="%s" target="_blank">the <strong>Inventory Sync</strong> setting</a>. Instead, please visit <a href="%s" target="_blank">the <strong>Square Library Dashboard</strong></a> and change the item inventory from there.';

// Statuses
$_['squareup_status_comment_authorized']                = 'The card transaction has been authorized but not yet captured.';
$_['squareup_status_comment_captured']                  = 'The card transaction was authorized and subsequently captured (i.e., completed).';
$_['squareup_status_comment_failed']                    = 'The card transaction failed.';
$_['squareup_status_comment_fully_refunded']            = 'The card transaction was fully refunded.';
$_['squareup_status_comment_partially_refunded']        = 'The card transaction was partially refunded.';
$_['squareup_status_comment_voided']                    = 'The card transaction was authorized and subsequently voided (i.e., canceled).';

// Entry
$_['entry_amount']                                      = 'Amount';
$_['entry_billing_address_city']                        = 'Billing City';
$_['entry_billing_address_company']                     = 'Billing Company';
$_['entry_billing_address_country']                     = 'Billing Country';
$_['entry_billing_address_postcode']                    = 'Billing ZIP';
$_['entry_billing_address_province']                    = 'Billing Province/State';
$_['entry_billing_address_street']                      = 'Billing Street';
$_['entry_browser']                                     = 'Customer User Agent';
$_['entry_cron_standard_period']                        = 'Catalog Sync Period (in minutes)';
$_['entry_currency']                                    = 'Currency';
$_['entry_date_created']                                = 'Date Created';
$_['entry_geo_zone']                                    = 'Geo Zone';
$_['entry_ip']                                          = 'Customer IP';
$_['entry_merchant']                                    = 'Merchant ID';
$_['entry_on_demand_cron_confirmation']                 = 'Setup confirmation:';
$_['entry_order_id']                                    = 'Order ID';
$_['entry_partner_solution_id']                         = 'Partner Solution ID';
$_['entry_setup_confirmation']                          = 'Setup confirmation:';
$_['entry_sort_order']                                  = 'Sort Order';
$_['entry_status_authorized']                           = 'Authorized';
$_['entry_status_authorized_label']                     = 'Order status for Authorized';
$_['entry_status_captured']                             = 'Captured';
$_['entry_status_captured_label']                       = 'Order status for Captured';
$_['entry_status_failed']                               = 'Failed';
$_['entry_status_failed_label']                         = 'Order status for Failed';
$_['entry_status_fully_refunded']                       = 'Fully Refunded';
$_['entry_status_fully_refunded_label']                 = 'Order status for Fully Refunded';
$_['entry_status_partially_refunded']                   = 'Partially Refunded';
$_['entry_status_partially_refunded_label']             = 'Order status for Partially Refunded';
$_['entry_status_voided']                               = 'Voided';
$_['entry_status_voided_label']                         = 'Order status for Voided';
$_['entry_total']                                       = 'Minimum Total';
$_['entry_transaction_id']                              = 'Transaction ID';
$_['entry_transaction_status']                          = 'Transaction Status';

// Error
$_['error_client_id']                                   = 'The app client ID is a required field';
$_['error_client_secret']                               = 'The app client secret is a required field';
$_['error_cron_acknowledge']                            = 'Please confirm you have set up a CRON job.';
$_['error_cron_standard_period']                        = 'The CRON period must be between <strong>%s</strong> and <strong>%s</strong>!';
$_['error_currency_unavailable']                        = 'Your selected Square location requires the currency code <strong>%s</strong>, but it is either missing or disabled in your store! Please set it up in <a href="%s" target="_blank"><strong>System &gt; Localisation &gt; Currencies</strong></a>';
$_['error_form']                                        = 'Please check the form for errors and try to save agian.';
$_['error_invalid_email']                               = 'The provided e-mail address is not valid!';
$_['error_no_location_selected']                        = 'The location is a required field';
$_['error_no_refund']                                   = 'Refund failed.';
$_['error_no_ssl']                                      = '<strong>Warning:</strong> SSL is not enabled on your admin panel. Please enable it to finish your configuration.';
$_['error_permission']                                  = '<strong>Warning:</strong> You do not have permission to modify payment Square!';
$_['error_permission_geo_zone']                         = '<strong>Warning:</strong> You do not have permission to modify Geo Zones!';
$_['error_permission_recurring']                        = '<strong>Warning:</strong> You do not have permission to modify recurring payments!';
$_['error_permission_tax_rate']                         = '<strong>Warning:</strong> You do not have permission to modify Tax Rates!';
$_['error_possible_xss']                                = 'We detected a possible cross site attack and have terminated your connection attempt. Please verify your application ID and secret and try again using the buttons in the admin panel.';
$_['error_refresh_access_token']                        = "An error occurred when trying to refresh the extension's connection to your Square account. Please verify your application credentials and try again.";
$_['error_status_not_set']                              = 'Please select a status!';
$_['error_tax_rate']                                    = 'Please make sure to assign a Geo Zone to each Tax Rate!';
$_['error_token']                                       = 'An error was encountered while refreshing the token: %s';
$_['error_transaction_missing']                         = 'Transaction not found!';
$_['error_user_rejected_connect_attempt']               = 'Connection attempt was canceled by the user.';
$_['error_cannot_copy_verification']                    = 'The Apple Pay domain verification could not finish. The target directory does not exist, or has no write permissions: %s';
$_['error_task_running']                                = 'A background CRON task is currently running. Please try again later.';

// Column
$_['column_action']                                     = 'Action';
$_['column_amount']                                     = 'Amount';
$_['column_customer']                                   = 'Customer';
$_['column_date_created']                               = 'Date Created';
$_['column_fee']                                        = 'Processing Fee';
$_['column_geo_zone']                                   = 'Geo Zone';
$_['column_ip']                                         = 'IP';
$_['column_order_id']                                   = 'Order ID';
$_['column_product_model']                              = 'Model';
$_['column_product_name']                               = 'Name';
$_['column_product_quantity']                           = 'Quantity';
$_['column_product_quantity_refund']                    = 'Refunded Quantity';
$_['column_product_quantity_restock']                   = 'Re-stocked Quantity';
$_['column_product_total_price']                        = 'Total Price';
$_['column_product_unit_price']                         = 'Unit Price';
$_['column_reason']                                     = 'Reason';
$_['column_refunds']                                    = 'Refunds';
$_['column_status']                                     = 'Status';
$_['column_tax_rate_name']                              = 'Tax Rate';
$_['column_tax_rate_percentage']                        = 'Percentage';
$_['column_transaction_id']                             = 'Transaction ID';
$_['column_type']                                       = 'Payment Status';

// Button
$_['button_capture']                                    = 'Capture';
$_['button_confirm_geo_zone']                           = 'Confirm';
$_['button_connect']                                    = 'Connect';
$_['button_download_log']                               = 'Download Sync Log';
$_['button_edit_advanced']                              = 'Edit advanced settings';
$_['button_edit_pairings']                              = 'Edit pairings';
$_['button_geo_zones']                                  = '(Optional) Setup Geo Zones';
$_['button_help']                                       = 'Documentation';
$_['button_on_demand_cron']                             = 'On-Demand Sync';
$_['button_reconnect']                                  = 'Reconnect';
$_['button_refresh']                                    = 'Refresh token';
$_['button_refund']                                     = 'Refund';
$_['button_skip_no_remind']                             = 'Skip';
$_['button_video_help']                                 = 'Installation video';
$_['button_void']                                       = 'Void';
$_['button_reject_merchant_change']                     = 'Reject';
$_['button_accept_merchant_change']                     = 'Accept';