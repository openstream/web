=== WooCommerce Stock Synchronization ===
Contributors: pronamic, remcotolsma
Tags: woocommerce, stock, sync, synchronization
Requires at least: 3.0
Tested up to: 4.7.3
Stable tag: 2.2.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Synchronizes stock with sites that are connected to one another, using WooCommerce Stock Synchronization.


== Description ==


== Installation ==


== F.A.Q. ==


== Screenshots ==


== Changelog ==

= unreleased =
*	Test - Tested up to WordPress version 4.7.3.
*	Test - Tested up to WooCommerce version 3.0.3.

= 2.2.0 =
*	Make `Push Stock` capable of syncing an unlimited number of products.

= 2.1.0 =
*	Fixed incorrect check for undefined property process_sync.
*	Fixed PHP notices undefined variables 'alternate' and 'stock'.
*	Added 'suppress_filters' for WPML compatability.
*	Increased POST request timeout to 45 seconds.
*	Added note that displayed number of products is limited to 100.

= 2.0.3 =
*	Fix - Fixed an issue with the sync all stock function.

= 2.0.2 =
*	Tweak - No longer send full site URL, instead only sent the hostname of the site URL.

= 2.0.1 =
*	Fix - Make sure we URL encode some parameters in the synchronize URL's.

= 2.0.0 =
*	Tweak - Refactored all code.
*	Test - Tested up to WordPress version 4.0.
*	Test - Test up to WooCommerce version 2.1.12.
*	Feature - Added overview of all the synchronization websites with status and version.
*	Feature - Addded overview of all the products with SKU and stock quantity.
*	Tweak - Improved the log overview.
*	Feature - Added an empty log button.
*	Tweak - Removed the synchronize stock meta box on edit product page. 

= 1.1.2 =
*	Hotfix - Missing notes and incorrect version number.

= 1.1.1 =
*	Hotfix - Fixed variable products not correctly syncing.

= 1.1.0 =
*	Feature - Developer Debug Request. If you have the password from the user, you can request additional information by making a POST request to site.ext?stock_sync_debug=password

= 1.0.0 =
*	Feature - Individual Synchronization Option
*	Improvement - Handling the synchronization better for very large requests.
*	Fix - No longer required to have URL's with/without slashes. Everything has added slashes now.

= 0.1 =
*	Initial release
