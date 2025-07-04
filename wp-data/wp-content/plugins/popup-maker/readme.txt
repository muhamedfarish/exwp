=== Popup Maker - Popup Forms, Optins & More ===
Contributors: danieliser, wppopupmaker, yogaman5020
Author URI: https://wppopupmaker.com/?utm_source=readme-header&utm_campaign=Readme&utm_medium=author-uri
Plugin URI: https://wppopupmaker.com/?utm_capmaign=Readme&utm_source=readme-header&utm_medium=plugin-uri
Donate link:
Tags: marketing, popup, popups, optin, advertising, conversion, responsive popups, promotion, popover, pop-up, pop over, lightbox, conversion, modal
Requires at least: 3.6
Tested up to: 4.9.4
Stable tag: 1.6.6
License: GNU Version 3 or Any Later Version

Everything you need to create unique user experiences. Insert forms & other content from your favorite plugins to create custom responsive popups.

== Description ==

= Best WordPress Popup Plugin =

Popup Maker™ is the **best popup plugin WordPress** has to offer. It is extremely versatile & flexible. Bend it to create any type of modal or content overlay for your WordPress website.

Customize every facet of your popups, from theme and position, to targeting and cookies.

Easily create [EU cookie notices](https://ninjaforms.com/eu-cookie-notices-ninja-forms/), optin popups, slide-ins, modal forms & more.

Learn tips and tricks, and create cool popups using guides found on our [Blog](https://wppopupmaker.com/blog/?utm_campaign=Readme&utm_source=readme-description&utm_medium=text-link)!

https://www.youtube.com/watch?v=MAf85_oax4g

Follow this plugin on [GitHub](https://github.com/PopupMaker/Popup-Maker) and [Twitter](https://twitter.com/wppopupmaker)!

Would you like to help translate the **best wordpress popup plugin** into more languages? [Join our WP-Translations Community](https://translate.wordpress.org/projects/wp-plugins/popup-maker).

= What's Included for Free: =
> + The plugin has limitless potential with no artificial restrictions. If you can’t get the functionality you’re after, we’ll be happy to help you! Just ask on the [Support Forums](https://wordpress.org/support/plugin/popup-maker).
> + There’s simply too many features to list here! But we’ll start with:
> + Slide Outs, Banner Bars, Floating Stickies, Notifications, Loading Screens, Video Lightboxes, and of course, Opt-In Forms.
> + Supports the most popular form building plugins available: Ninja Forms, Gravity Forms, Contact Form 7 & More.
> + We support practically every list building form, including but not limited to: MailChimp, AWeber, InfusionSoft, GetResponse, Constant Contact, Mail Poet, Mad Mimi, Hubspot, and Emma.
> + All of our popups are Responsive popups.
> + Use our unique **Popup Editor** to build any content you can imagine inside of our popups, plus control popup sizing, position, animation and so much more.
> + **Conditions** allow you to target exactly who will (and will not) see your popups. Target any WordPress content such as: posts, pages and 26 more!
> + We have included specific conditions for popular plugins such as WooCommerce.
> + Dictate the frequency at which users see your popups using **Cookies**, and edit how the cookies are created using Cookie Creation Events.
> + **Click Triggers** allows you to trigger a popup on click of menu items, sidebars, buttons, images or any other content on your site. We have various methods allowing you to integrate our click triggers with nearly any plugin or theme.
> + **Auto Open Triggers** allows you to set a **timed delay**, then the popup will display according to your preference.
> + Trove of options to customize the look of your popup using our unique **Theme Editor**. Change colors, shadows, fonts, paddings, and much, much more.
> + Stat tracking: Popup Opens Count.

If you are enjoying this wonderful project, [please rate & review it](https://wppopupmaker.com/rate-us/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Readme&utm_content=rate-us) to share the love <3!

= Enhance Your WordPress Popups Using Our Extensions =
> + [Exit Intent](https://wppopupmaker.com/extensions/exit-intent/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Upsell&utm_content=exit-intent "Exit Intent")
> + [AJAX Login Modals](https://wppopupmaker.com/extensions/ajax-login-modals/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Upsell&utm_content=ajax-login-modal "AJAX Login Modals")
> + [Age Verification Modals](https://wppopupmaker.com/extensions/age-verification-modals/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Upsell&utm_content=age-verification-modals "Age Verification Modals") - Verify the age of your users before allowing them to view pages or click buttons/links.
> + [Popup Analytics](https://wppopupmaker.com/extensions/popup-analytics/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Upsell&utm_content=popup-analytics "Popup Analytics")
> + [Advanced Targeting Conditions](https://wppopupmaker.com/extensions/advanced-targeting-conditions/?utm_source=readme-description&utm_medium=text-link&utm_campaign=Upsell&utm_content=advanced-targeting-conditions "Advanced Targeting Conditions")

== Frequently Asked Questions ==

= Where is your documentation? =
Our documentation is located [here](http://docs.wppopupmaker.com?utm_medium=text-doclink&utm_campaign=Readme&utm_source=readme-faq&utm_content=where-are-docs)

= How do I open a popup? =
Using [Triggers](http://docs.wppopupmaker.com/article/141-triggers-cookies?utm_medium=text-doclink&utm_campaign=Readme&utm_source=readme-faq&utm_content=open-a-popup)

= How do I stop popups from opening repeatedly? =
Using [Cookies](http://docs.wppopupmaker.com/article/148-cookies?utm_medium=text-doclink&utm_campaign=Readme&utm_source=readme-faq&utm_content=stop-opening-repeatedly)

= What do I do if I just want a popup to show on a certain page/post/etc? =
Check out [Conditions](http://docs.wppopupmaker.com/article/140-conditions?utm_medium=text-doclink&utm_campaign=Readme&utm_source=readme-faq&utm_content=target-certain-pages)

= How do I make it work with my 3rd party forms? =
Beginning with Popup Maker v1.7 we now support most forms by default. We do this by adding a hidden field using JavaScript to any form inserted in a popup. This field contains the popup ID.

When we detect that ID in PHP we que up that popup to reopen immediately after refresh to show errors or success messages.

= How do I take advantage of the success actions Popup Maker provides for 3rd party forms? =
We have built in support for the most popular form plugins. But if we don't then we have a few helper functions that allow you to take full advantage of our success actions and setting cookies.

This link contains AJAX (JavaScript) & Non-AJAX (PHP) based solutions which you can hack with your forms hooks & events. https://gist.github.com/danieliser/0060112b18b6013f2683653236b02439

= Why aren't my popups opening/working? =

There are several common causes for this which include:

* You have not set up your popups targeting conditions (top right when editing a popup).
* Your site is loading multiple copies of jQuery
* Your themes footer.php file doesn't include <?php wp_footer(); ?> or it is not in the correct place (just before the `</body>`).
* WP 4.5's inclusion of jQuery v1.12 broke your theme or another plugin - [More Info](https://wordpress.org/support/topic/stopped-working-suddenly-wp-45?replies=21 "More Info").
* There is a JavaScript error caused by another plugin or your theme. You can check this using your browsers console (Press F12).

== Screenshots ==
1. Create and edit an infinite amount of unique popups to get any job done - you can even export and import them to your other sites! Clicking on a popup takes you to our unique Popup Editor.
2. Use our unique Popup Editor to completely customize every facet of your popup! Plus, use our Content Editor to implement Shortcodes, HTML, and other code to create any popup imaginable. If you’ve created a page or post in WordPress, you’ll feel right at home!
3. Use the Display Settings Pane in the Popup Editor and choose from a plethora of options, including Responsive Sizes and Animation Types!
4. Trigger your popups on the front end using the Triggers Pane in the Popup Editor. Our Free triggers include: Click Open and Auto Open.
5. Choose from 29 Conditions in the Popup Editor and target exactly who will (and will not) see your popups.
6. Prevent popups from showing up again using the Cookies Pane in the Popup Editor. Our free Cookie Creation Events include: On Popup Open, On Popup Close and Manual Javascript.
7. Create and edit an unlimited supply of popup themes for every situation. You can even export and import them to your other sites! Clicking on a theme takes you to our unique Theme Editor.
8. Use the Theme Editor to choose from over 60 options and theme every element of your popup: Background Overlay, Popup Container, Close Button, Google Fonts and much more.
9. Create any popup imaginable using our color pickers and sliders!

== Changelog ==

= v1.7.0 - ??/??/2017 =
This was one of our biggest updates to date in terms of improving existing functionality, reducing maintenance and the time it takes to implement new features in the future.

Noticeably there are a lot of interface changes with this version as we simplified from having many meta boxes in the popup editor to a new single panel interface.

Lastly we now have include our extendable subscription forms right in the free version. We currently don't provide support for mail/service providers in the free version, but have opened up our form API in the hopes that 3rd party developers will help us fill that gap. Don't fret though, submissions are stored in a custom table for retroactive syncing to lists or export (not yet available).

* Feature: Subscriber forms now included without a paid extension.
  * Provider API for easily extending forms to work with 3rd party providers.
  * New shortcode with tons of options built in.
  * Stores subscribers into a new custom table for import into your favorite system at a later time.
* Feature: Front end asset overhaul, now uses cached static assets.
  * All front end assets now combined into single js & css file.
  * Custom styles are now saved along with all core & extension styles eliminating inline style blocks.
  * Reduction of footprint means massively improved loading performance.
  * Dynamic file creation allows for some awesome upcoming features.
  * Now completely compatible with plugins like Autoptimize (Thanks Frank).
* Feature: Support for nearly any form, including non ajax forms.
  * Helper functions to integrate your 3rd party form plugins quickly.
  * Show thank you popups, set cookies & close popups with a delay after success (requires code).
  * Automatically reopen popup forms after refresh from a form submission.
* Improvement: Lots of text, label & description changes to be more intuitive.
* Improvement: Better 3rd party plugin support including page builders:
  * Popup post type is now public.
  * Better support for 3rd party shortcodes which require extra assets loaded (JS/CSS).
* Improvement: Adding trigger now gives optional choices to create a cookie, rather than being automatic.
* Improvement: New Popup Settings tabbed interface to help make settings more intuitive & easy to find on one screen.
  * Now all popup settings are stored in a single meta key reducing DB clutter.
* Improvement: New Popup Maker Settings tabbed interface to help make settings more intuitive & easy to find on one screen.
* Improvement: New Popup preview mode.
* Improvement: Better page builder support by changing popup post type arg for public to true.
* Improvement: Resource reduction & optimization.
  * Added class autoloader for core and extensions.
  * Greatly simplified code base & internal API structures.
  * Converted many internal APIs to use passive loading.
  * Added internal caching.
* Improvement: Integrated [WPJSF](https://github.com/danieliser/WP-JS-Form-Sample-Plugin) lib for easier maintenance and quicker updates of our admin forms.
* Improvement: Various improvements to smart select fields (jQuery select2) including:
  * Allow multiple page/post selections without reopening/searching again.
  * Properly highlights & shows selected items after save/reload.
  * Paginated/scroll based loading of more results over ajax.
  * Now shows list of recent "items" immediately upon clicking the field rather than requiring search.
* Improvement: Admin asset handling
  * Modularized admin assets for easier debugging & maintenance.
* Improvement: Popup Trigger shortcode can now use custom popup IDs.
* Improvement: Added new batch processing system for upgrades and other processes.
* Improvement: Removed a lot of old code.
* Improvement: Rebuilt Shortcode UI that should be more reliable.
* Improvement: Addressed most all PHP 7 notices.
* Improvement: iOS scrolling issue fixes.
* Improvement: Added support for KingComposer.
* Tweak: Support for subdirectory sites having their own sitewide cookies.
* Fix: Incorrect BuddyPress condition labels
* Fix: Bug when WPML isn't yet available.


= v1.6.7 - ?? =
* Fix: Typo in JS event name prevented forceFocus for popups.
* Fix: JS errors when Marionette JS library on page without Ninja Forms.
* Fix: WPML missing variable errors.

= v1.6.6 - 07/29/2017 =
* Fix: Bug with closing forms using newest version of Gravity Forms.

= v1.6.5 - 07/16/2017 =
* Tweak: Added new popup class for theme names. Thanks @bluantinoo.
* Fix: Bug in menu popups save and render functionality not working correctly.
* Fix: Finally found issue where randomly assets tab checkboxes wouldn't uncheck & save properly.
* Fix: Sanitized active tab key against whitelist.
* Fix: Errors in w3c validation scans from form meta fields.
* Fix: Settings asset label mismatch.

= v1.6.4 - 07/07/2017 =
* Imporvement: Reworked all form integrations to be as DRY as possible making it more reliable.
* Tweak: Added sanity check in case previous filter mucks up the $item object variable in menu item filters causing warnings.
* Tweak: Disabled the open count & sorting when Popup Analytics is activated.
* Tweak: Added NF datepicker CSS fix.
* Tweak: Added media type to head styles to force optimization plugins to keep them in order.
* Tweak: Reverted to older method of click trigger assignment to better work with multiple popups on one trigger with conditions.
* Fix: Bug caused by use of a function some users host blocked.
* Fix: Bug caused by debug mode being enabled with a form success cookie.
* Fix: Bug when Gravity Form was not in popup but triggered a thank you popup.
* Fix: Bug with GForms closing popup after submission.
* Fix: Bug where CF7 Forms with required fields trigger popup to close without being filled properly.

= v1.6.3 - 05/19/2017 =
* Fix: Removed 3rd parameter from number_format as it only accepts 1, 2 or 4 arguments, not 3 per php.net documentation.

= v1.6.2 - 05/18/2017 =
* Fix: Bug caused by rounding to whole numbers in opacity values.

= v1.6.1 - 05/17/2017 =
* Improvement: Major improvements to the Shortcode UI (builder & in editor previews). Now supports true live rendering of PM shortcodes. This will be most apparent in upcoming extension updates.
* Fix: Forced decimal formatting in CSS output functions in case of locale changes to formatting. Fix thanks to @timhavinga


= v1.6.0 - 04/26/2017 =
* Feature: Added Gravity Forms direct integrations.
  * Close popup with delay when Gravity Form is submitted.
  * Trigger a thank you popup when Gravity Form is submitted.
  * Set cookies easily when the Gravity Form is in a popup.
* Feature: Added Contact Form 7 (CF7) direct integrations.
  * Close popup with delay when contact form 7 is submitted.
  * Trigger a thank you popup when contact form 7 is submitted.
  * Set cookies easily when the CF7 form is in a popup.
  * Forced CF7 assets to load when used in a popup on the off chance they don't automatically.
* Tweak: Increased action priority for condition registration in case plugins register post types late, such as PODs.
* Tweak: Moved popup theme styles to a very late position in the head to prevent them from being overwritten when minifying CSS.
* Fix: Bug where you couldn't enter values higher than the rangeslider max.
* Fix: JS error when creating a cookie before a trigger exists.

= v1.5.8 - 04/04/2017 =
* Fix: Error when extensions were active due to null values for checkboxes.


= v1.5.7 - 03/27/2017 =
* Improvement: Added option to disable the menu editors in case of a conflict.
* Fix: Forced 100% width on page select boxes to prevent them from being too small.
* Fix: Bug where checkboxes were not staying checked.

= v1.5.6 - 03/16/2017 =
* Feature: Admin Bar helper tool to assist in getting proper click trigger selectors easily.
* Improvement: Further tweaks for maximium compatibitlity with nav menu editor.
* Improvement: Added Popup option to nav menu editor Screen Options to easily hide them.
* Fix: Updated the freemius-sdk to fix an obscure secured php core function error.

= v1.5.5 - 03/13/2017 =
* Improvment: Used generic Nav Menu Editor Walker classes for better support. This should remove the notices from other plugins as well.
* Fix: Bug that causes click triggers to lag.

= v1.5.4 - 03/13/2017 =
* Fix: Typos in conditions.
* Fix: Moved class_exists checks to better handle possible missing class errors.

= v1.5.3 - 03/13/2017 =
* Improvement: Added a catch for any triggers not initialized at page load.
* Fix: Typo in multi check field template that led to admin JS errors.

= v1.5.2 - 03/10/2017 =
* Improvement: Added option to disable the admin bar Popups helper menu item.
* Improvement: Simplified the nav menu editor modification class to reduce un-needed translation strings.
* Fix: Added check for missing class in the nav menu editor walker classes.

= v1.5.1 - 03/09/2017 =
* Fix: PHP 5.2 Compatibility issue.

= v1.5.0 - 03/08/2017 =
* Feature: Position popups based on the click trigger. Tooltips & Popovers are now possible.
* Feature: Added new conditions for targeting children & grandchildren / ancestors of selected content.
* Feature: Added new settings to the Nav Menu editor to choose a popup that a menu item will trigger.
* Feature: Addded option to Disable on Tablets as well as mobile phones.
* Feature: Added WooCommerce is_wc_endpoint_url conditions.
* Feature: Added new click selector presets for quicker targeting & more user friendly.
* Feature: Added a new debug mode. Including:
  * Admin Bar with manual open, close & cookie resets for loaded popups.
* Improvement: New global JS functions for easily working with popups. PUM.open(123), PUM.close(123), PUM.clearCookies(123).
* Improvement: Added inline links to docs for various settings.
* Improvement: Reworked popup analytics to improving response times and decreasing server loads.
  * Moved Analytic tracking to the WP-API with a new endpoint.
  * Reduced number of queries by 75% for analytics tracking.
  * Added option to disable it entirely if absolutely neccessary.
* Improvement: Many improvements to JavaScript including object caching.
* Tweak: Creating a new trigger will automatically create a cookie and assign it if one doesn't exist.
* Tweak: Mobile Disable was also applied to tablets, now only to phones.
* Tweak: Removed readonly from rangesliders to make the fact you can manually enter any value more intuitive.
* Tweak: Use CSS to display a popup immediately if has trigger: auto open: delay 0.
* Tweak: Clicking elements in the visual theme preview will now scroll to the relevant section of settings.
* Fix: Bug in admin when editing a trigger, cookie field didn't repopulate properly.
* Fix: Bug where rangeslider values can be set to strings.
* Fix: Bug where links in the close button were not triggered even when do_default was enabled.
* Fix: Bug with scrollbar "flashing" when popup opens.

= v1.4.21 - 12/12/2016 =
* Feature: Added option to disable popup on mobile to comply with [Google's new interstital policy](https://webmasters.googleblog.com/2016/08/helping-users-easily-access-content-on.html).
* Tweak: Added additional paramter to the pum_popup_get_conditions filter.
* Tweak: Fixed possible false init of NF integration if NF is not enabled.
* Tweak: Added CSS override for Ninja Forms datepickers to properly layer them above popups.

= v1.4.20 - 10/13/2016 =
* Feature: Added [Ninja Forms](https://wppopupmaker.com/grab/ninjaforms?utm_source=readme-changelog&utm_medium=text-link&utm_campaign=Readme&utm_content=ninja-forms-features) success actions for opening & closing popups.
* Feature: Added new cookie event for successful submission of a [Ninja Forms](https://wppopupmaker.com/grab/ninjaforms) form.
* Improvement: Added wp.hooks JS library, allowing actions & filters via our plugin JS.
* Tweaks: Added various admin css tweaks.

= v1.4.19 - 9/30/2016 =
* Feature: Added a do_default parameter to the trigger & close shortcodes. This allows making close buttons that also download a file.
* Improvement: Added support for JS (advanced) conditions & condition processing after checking for cookies.
* Improvement: Upgraded from jQuery-Cookie (modified) to JS-Cookie (modified) for more flexibility.
* Fix: Bug where color didn't update properly when first clicked in theme editor.
* Fix: Added prefix to admin pages to prevent conflicts.
* Fix: Removed usage of deprecated filter.

= v1.4.18 - 8/15/2016 =
* Fix: Bug with PHP 5.2 compatibility.
* Fix: Added missing post_type index condition callback.

= v1.4.17 - 8/14/2016 =
* Fix: Bug caused by using return value in write context.

= v1.4.16 - 8/14/2016 =
* Feature: New Condition: Pages: With Template. Thanks @cedmund.
* Feature: Option to Disable reposition on window resize/scroll.
* Improvement: Enable Visual Composer for Popups by default (VC 4.8+). Thanks @NoahjChampion.
* Improvement: Replaced usage of gif hex code with loading of an actual tracking gif to prevent security scanners from throwing false positives.
* Improvement: Changed default analytics response with a 204 no content heading, saving the need to load & return a tracking gif.
* Fix: Missing condition value bug fixed by adding sanity checks to conditions on get.
* Fix: Auto Height checkbox wouldn't stay unchecked.
* Fix: CSS class pum-open-overlay wasn't being removed from HTML element on popup close causing issues for next popup.
* Fix: Error in JS due to shortcodes: Uncaught Error: Syntax error, unrecognized expression.
* Fix: Issue where some custom post types not working with conditions.

= v1.4.15 - 7/20/2016 =
* Improvement: Only showed the aria-label attribute if the label will be shown.
* Tweak: Updated the Freemius SDK.
* Tweak: Updated the #popmake-{ID} selector to work at the end of a link.
* Fix: Bug where stackable popups would lose their scroll bar after one was closed.

= v1.4.14 - 7/14/2016 =
* Feature: Links with the url #popmake-{ID} will now trigger a popup when clicked. Links with this href will work similar to elements with the popmake-{ID} class.

= v1.4.13 - 6/26/2016 =
* Feature: Added 12 of the most commonly needed BuddyPress content types & targeting conditions. Target any BP content type. Now full support for BuddyPress.
* Tweak: Moved a few functions from the plugins_loaded action to the init action for minor compatibility benefits.
* Tweak: Removed Popup & Popup Theme Meta Revisioning as it adds unneeded clutter to the DB.

= v1.4.12 - 6/24/2016 =
* Improvement: Reduced translatable strings from 569 total to 439 which is about a 23% reduction which will reduce work for our translators.
* Tweak: Removed the welcome page and associated CSS, images etc. This cleans up some useless strings for translation.
* Fix: Bug where add_new cookie wasn't properly replaced for the first trigger.

= v1.4.11 - 6/10/2016 =
* Feature: New conditions for targeting posts & taxonomy by ID.
* Improvement: Added link to Conditions Documentation to the Conditions editor.
* Tweak: Namespaced jQuery.serializeObject to prevent conflicts with other plugins/themes in the admin editor.
* Fix: Bug on add new page/post and during post update.
* Fix: Bug in edit this theme link on page load.

= v1.4.10 - 5/23/2016 =
* Feature: Added Do Default option to the click triggers. Allows a triggers default browsers behavior to occur and still open a popup, such as a file link.
* Improvement: Added additional links to the theme editor for better visibility and to guide users there.
* Tweak: Older methods are only loaded when needed, this also removes usage of a deprecated filter.
* Tweak: All Pages now includes Home Page / Front Page.
* Tweak: A default click trigger is always added. (Like pre v1.4)
* Fix: Low z-index caused issues when the overlay is disabled.
* Fix: Bug where none animation couldn't be re-opened.
* Fix: Cleaned up issues allowing popup post type to be added directly to menus and sitemaps.
* Fix: Bug where auto height checkbox would not stay checked.

= v1.4.9 - 5/01/2016 =
* Improvement: Reduced front end queries by over 85%. Avgerage sites should now only have 2 to 3.
* Improvement: Added caching enhancements for even better performance on servers with page, object & query caching.
* Improvement: Added a fully namespaced version of Select2 for compatiblitiy while other plugins await updating. Will gracefully fall back to the non namespaced version when it no longer causes issues.
* Fix: Undefined 'amd' JS errors.
* Fix: The "Use Your Theme" font option was not working correctly.
* Fix: Removed leftover console.logs in our JavaScript.

= v1.4.8 - 4/27/2016 =
* Improvement: Sandboxed Select2 v4 since it breaks other plugins when loaded properly. v4 adds accessiblity enhancements that we are not going to sacrifice for compatiblity with plugins who have not updated to include it. This provides a safe alternative in the meantime.
* Tweak: Removed extra shortcode files.
* Tweak: Allow popup Click Triggers to target another popups close button. Close one triggers another etc.
* Fix: Bug caused by pum_shortcode_ui not loading properly everywhere.
* Fix: Bug in popup position calculation when the popup used Fixed Position and Disable Overlay

= v1.4.7 - 4/24/2016 =
* Improvement: Removed the old styles dropdown as it is no longer needed.
* Improvement: Added check for old versions of Select2 and replace them with latest which is backward compatible.
* Fix: Bug that caused Close button delay to not show the close button.
* Fix: Replaced usage of <% style JS template with <# & {{ for PHP asp_tags compatibility.

= v1.4.6 - 4/22/2016 =
* Fix: Bug in new post editor JS.
* Fix: Added filter to override permissions for upgrade routines.

= v1.4.5 - 4/21/2016 =
* Fix: Replaced all usage of static:: for PHP 5.2 compatiblity.
* Fix: Forced the latest version of Select2 to load on Popup Maker admin pages in the case that an older version was enqueued.

= v1.4.4 - 4/20/2016 =
* Fix: Version Bump to fix upgrade issues.

= v1.4.3 - 4/20/2016 =
* Fix: Removed extra whitespace before opening php tags.

= v1.4.2 - 4/20/2016 =
* Fix: Bug in popup maker deprecated filter caused by no defaults passed.

= v1.4.1 - 4/20/2016 =
* Fix: Bug in popup maker upgrade class for older versions of PHP.

= v1.4 - 4/20/2016 =
* Feature: Added basic analytics. Tracks how many unique opens each popup has.
* Feature: Added new Popup Maker shortcodes button to the editor with visual previews.
* Feature: Added option to reset popup open counts demand.
* Feature: New add / remove targeting conditions UI.
* Feature: Conditions can now be negative as well as grouped as AND / OR.
* Feature: New conditions for targeting posts & cpt by taxonomy. IE Posts with Tag / Category.
* Feature: New add / remove triggers UI that allows multiple of the same trigger per popup.
* Feature: Added a new add / remove cookies UI that manages cookies separate from triggers.
* Feature: Added 5 new built in themes.
* Feature: Added support for pods content types.
* Feature: Added full screen front end previews for admins and editors.
* Feature: Added additional WooCommerce conditions such as on checkout.
* Improvement: Added CSS resets to all core popup elements to ensure a reliable look.
* Improvement: Popups are now rendered with their own overlay. This allows the popup to scroll inside the overlay.
* Improvement: Cookie names can now be set to anything, including cookies from other plugins.
* Improvement: Triggers now support checking more than one cookie.
* Improvement: Accessibility & screen reader enhancements to the popups and admin.
* Improvement: Auto Focus the first element in the popup when it opens for screen readers.
* Improvement: Better JavaScript encapsulation and organization.
* Improvement: Added support for Select2 smart dropdowns for admin interfaces.
* Improvement: Added a more reliable upgrade routine system.
* Improvement: Added an option to disable popup taxonomies if not in use.
* Improvement: Added more reliable usage tracking via [Freemius](https://freemius.com/wordpress/).
* Tweak: Updated extensions page and added a list of plugins that work well with Popup Maker.
* Fixed: Super annoying fixed position checkbox glitch.
* Fixed: Missing check for disabled google fonts before loading them.
* Fixed: Bug where hidden about pages showed up when certain admin menu editing plugins were active.
* Fixed: Bug where default theme was not properly created on install.
* Fixed: Bug where non utf-8 characters were used in the name field and caused JS errors.
* Fixed: Bug where popup triggers inside their own popup would cause it to close and reopen when clicked.
* Dev: Introduced PUM_Fields a settings API that support _.js Templ fields.
* Dev: Added new action 'pum_styles' that can be used to render custom CSS.
* Dev: Added new PUM_Popup class with nearly all methods built in.
* Dev: Introduced new prefix pum_ rather than popmake_.

**v1.4 Change Set Statistics:**
365 Commits / 53 Major & Minor Issues Closed.
285 changed files with 20,437 additions and 3,607 deletions.

= v1.3.9 - 10/14/2015 =
* Feature: New shortcode - [popup_close] allows adding custom close buttons/text. Ex. [popup_close] Click Me [/popup_close].
* Improvement: Added SASS/SCSS files for the site & admin styles.
* Improvement: Added better support for current & legacy versions of Visual Composer.
* Improvement: Added check for preventClose class on a popup just before closing. If found the popup won't close.
* Fix: Fixed bug in theme editor that caused Google Font variants to not show up.
* Fix: Fixed bug in CSS generation where Google Font URL would become corrupted and cause a 404.
* Fix: Fixed bug where fixed position would show unchecked even if it was checked.
* Fix: Fixed bug in CSS that caused popup to appear below site on mobile.
* Fix: WP Multi Site: Fatal Error.

= v1.3.8 - 9/29/2015 =
* Fix: Updated links to documentation.
* Fix: Removed exploitable bug allowing script execution in the admin. Discovered 9/29/15 - Patched 9/29/15

= v1.3.7 - 9/21/2015 =
* Feature: Added support for Visual Composer to popups. (Backend Editor Only). Works Perfectly with Responsive Popups.
* Tweak: Disable position fixed on mobile screens for responsive popups.
* Tweak: Improved UI with better popup formats selection.
* Fix: Bug with default theme not properly being created.
* Fix: Bug where default & theme formats were overridden in the WP Editor.
* Fix: Bug with default theme not being used for [popup] shortcode.
* Fix: Bug with loading Google Fonts properly.
* Fix: Errors generated by incorrectly formatted colors in the editor.
* Fix: Bug with targeting conditions for categories.
* Fix: Bug in positioning left & right values. Credit to @invik for the solution.

= v1.3.6 - 8/25/2015 =
* Confirmed WP v4.3 compatibility.
* Tweak: Default theme is automatically used if a popup does not have one assigned.
* Fix:  UI bug where fixed position checkbox wouldn't stay checked.
* Fix: Bug with Theme Default values & v1.2 values not being merged.

= v1.3.5 - 8/18/2015 =
* Tweak: Corrected missing keys for required script checks.
* Fix: Error message caused by non array value from get_post_custom.
* Fix: Removed missing variable.
* Fix: Text corrections.

= v1.3.4 - 8/12/2015 =
* Fix: Added px to font-size & line-height.

= v1.3.3 - 8/12/2015 =
* Fix: Added current_action fallback function for older versions of WP.
* Fix: Theme CSS rendering incorrect font settings.

= v1.3.2 - 8/10/2015 =
* Tweak: Pause HTML5 Videos when popup closes.
* Fix: Prefixed several functions that collided with some themes.
* Fix: Changed default Close Height & Width to 0/auto.

= v1.3.1 - 8/8/2015 =
* Fix: Error in get_called_class alternate function for PHP 5.2
* Fix: Force theme css builder to check for empty themes.
* Fix: Bug where z-indexes were incorrectly set.

= v1.3 - 8/7/2015 =
* Feature: Added unlimited themes functionality to the core.
* Feature: Allow disabling of event.prevendDefault() for on click events by adding do-default class.
* Feature: Added support for session based cookies.
* Feature: Add Height & Width options to Close Button for better control.
* Feature: Theme styling is now rendered in the head via inline CSS with an option to disable in the case that popup styles have been moved to the theme stylesheet.
* Feature: Delay showing the close button after the popup opens. Set the delay in ms.
* Feature: Added stackable popups option to show more than one popup at a time. ( A stackable popup won't close other popups when its opened. )
* Feature: Added WooCommerce Targeting Conditions.
* Feature: Added new system info tab on the tools page to make debugging faster.
* Tweak: Change default responsive mobile size to 95%.
* Tweak: Change default z-index to 1999999999.
* Tweak: Add ability to pass a callback to the popmake('close') method.
* Tweak: Add namespace to click open event ('click.popmakeOpen').
* Tweak: Add $default arg to popmake_get_popup_meta_group function.
* Tweak: Auto close content tags using balanceTags().
* Tweak: Added new popmake_get_popup(), get_the_popup_ID(), popmake_get_the_popup_ID(), popmake_the_popup_ID() functions.
* Tweak: Check if popup is already open before auto opening.
* Tweak: Add ajax="true" to gravity forms shortcodes if not there.
* Tweak: Make auto open cookie key optional.
* Tweak: Disable fixed position for responsive sizes.
* Tweak: Compensate for Admin Bar when visible.
* Tweak: Added options to disable Support & Share admin widgets.
* Tweak: Added new filter popmake_popup_default_close_text to allow filtering of popup close text.
* Tweak: Added close text override on a per popup basis. New option under Close Settings.
* Tweak: Choosing a responsive size will automatically disable fixed position & scrollable content.
* Tweak: Unneeded data attributes are now removed to clean up html.
* Tweak: Meta has now been compressed into serialized arrays for popups and themes.
* Tweak: Added new Meta Field management class as a step toward a more maintainable code base.
* Fix: Add option to disable moving of popup to end of <body>.
* Fix: Corrected input type under Click-Open Settings meta box.
* Fix: Description cleanup for popup location.
* Fix: Correct French translation file name.
* Fix: Rewrote popup loop to not overwrite global $post breaking some content shortcodes.
* Fix: Bug when clicking publish with empty name field publish becomes unclickable again.
* Fix: Sitewide cookie option will not stay unchecked.
* Fix: Bug where popup & popup_theme meta was stored with other post types on revision.
* Fix: Bug in the popup_trigger shortcode with $content not being rendered properly.

= v1.2.2 =
* Added (string) typecast to prevent errors in wp_localize_script when passing integers.
* Added 100% French & Hungarian translations.
* Added partial German translation.
* Moved template.php require line to load for both admin and front end for use in ajax responses.
* Changed order of admin pages to allow extensions to load before settings/help/tools pages on menu.
* Added troubleshooting FAQ to readme.
* Added version to JS object for backward compatibility checks.
* Added check for preventOpen class before opening. This class will prevent the popup from opening.
* Corrected minWidth variable name.
* Added namespace to the auto open cookie event.
* Changed the last open trigger to use the jQuery object instead of xpath.
* Added an isScrolling variable to detect when the browser is actively scrolling.
* Checked isScrolling before adding overflow styles to the HTML element to prevent glitching.
* Temporarily removed the grow animations due to removal of Greensock Animation Platform.
* Removed Greensock Animation Platform dependancy.

= v1.2.1 =
* Fixed bug caused by null value passed to JS data attr.

= v1.2 =
* Added full screen preview for themes when editing using the Preview button.
* Added full screen preview for popup when editing using the Preview button.
* Added new shortcode 'popup_trigger' that allows users to easily add the correct popmake- class. Accepts id, tag & class parameters.
* Updated GSAP JS plugin to latest version.
* Removed jQuery.gsap.js usage.
* Added fallback list of Google Fonts for when API is unavailable.
* Setup extensions page to use a static list of extensions for the time being.
* Updated API url.
* Removed Popmake_Admin_Notices class as it was unused.
* Fixed bug where share metabox wouldn't stay hidden.
* Added function to prevent deletion of default theme.
* Fixed bug which caused Popup Maker menu to show to all users.

= v1.1.10 =
* Fixed invalid argument bug passed to google font foreach.
* Fixed CSS box-sizing cross browser support.

= v1.1.9 =
* Added %'s to reponsive sizes in size dropdown.
* Remove usage of the_content and the_content filters.
* Fixed responsive sizes.

= v1.1.8 =
* Fixed issue with admin menu position collisions.
* Fixed issue with banner not staying dismissed.
* Removed dependency jQuery.cookie
* Fixed bug in auto open when cookie was set before delay was up.
* Added new setCookie JS event. Used to manually set a popups cookies. Usage jQuery('#popmake-123').trigger('popmakeSetCookie');
* Added new z-index override values. This helps with theme compatibility and future multi popup capability.
* Added Blog Index support. Available under targeting conditions 'On Blog Index' & 'Exclude On Blog Index'.
* Added better responsive image handling.
* Added Admin Debug option for popups.
* Changed jquery-ui-position collission property to none to solve positioning issues.
* Disabled Popup Maker JS & CSS when no popups detected to load.
* Added new function popmake_enqueue_scripts() which allows manual enqueuing of scripts and styles.

= v1.1.7 =
* Fixed undefined function popmake_default_settings.
* Fixed specific pages not saving properly.
* Now removes ?autoplay parameter from Videos preventing them from playing again without interaction.

= v1.1.6 =
* Fixed bug in js not setting correct CSS value for min-width.
* Changed close link element tag from a > span.

= v1.1.5 =
* Fixed bug when clicking add selected buttons.
* Changed how popmake_popup_is_loadable works. It is now more organized and readable.
* Added 2 new Targeting Conditions: Search & 404.

= v1.1.4 =
* Fixed bug in scrollable content styles.
* Fixed bug in admin JS for duplicate input names.
* Changed Powered By Setting to Off by Default.
* Changed default permissions required to use theme builder.
* Fixed bug in targeting conditions.

= v1.1.3 =
* Fixed some incorrect links to resources and kb.
* Removed Auto Open Promotional Material ( as it is now included ).

= v1.1.2 =
* Further enhancements to ensure proper checking of Auto Open Enabled.

= v1.1.1 =
* Fixed bug in JS that didn't properly check if Auto Open was enabled.

= v1.1 =
* Added Importer for Easy Modal v2 - Availabe under Tools -> Import
* Added Easy Modal v2 Compatibility Option - Available under Settings -> Misc (This will allow all of your existing eModal classes to open the proper Popup once imported)
* Added custom selector functionality - Availabe on Modal editor (This will allow you to use your own css selectors that when clicked will trigger the popup to open. Ex. #main-menu li.menu-item-3 would cause the corresponding menu item to trigger that popup)

= v1.0.5 =
* Fixed bug caused by changes in v1.0.4.

= v1.0.4 =
* Admin UI Adjustments & Tweaks.
* Fixed bug in removing specific post types.
* Reformatted Code.
* Fixed incorrect variable.

= v1.0.3 =
* Fixed bug with recursive filter.
* Fixed bug caused by typo.
* Fixed bug in JS for removing specific post type posts.

= v1.0.2 =
* Resized Extension page images to load quicker on extensions page.
* Added last_open_popup proerty to popmake jQuery function.
* Resized Extension page images to load quicker on extensions page.
* Fixed misc Admin Styles.
* Corrected support links.
* Fixed Bug in Meta boxes on settings page.
* Renamed files appropriately.
* Added new section callback for settings API.
* Fixed small glitch in Opt In for Credit Link.

= v1.0.1 =
* Removed links to getting started from "Dashboard" Admin Menu.
* Added Line Height Setting to Both Title and Close, Allowing Perfect Circles for close button.
* Updated admin styles.
* Misc Admin changes, including new filters/hooks for upcoming extensions.

= v1.0.0 =
* Initial Release