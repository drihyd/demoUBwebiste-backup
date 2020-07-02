=== Source Tracking for Contact Form 7  ===
Tags: UTM tracking, contact form 7, UTM, Contact form, cf7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 3.0
Tested up to: 5.1.1
Stable tag: 0.1

Easily track how your visitors that submitted a form got to your site (including source, campaign, medium and keyword tracking).

== Description ==


A simple plugin to give you the power to track source, medium, campaign and keyword on your CF7 forms


This plugin saves any UTM values coming in URL with cookies and let the users browse the website normally. 

You dont have to worry about passing the values when users are switching from page to page. All the values are stored and automatically retrieved when a user submits any contact form 7. 

The following parameters are recognized:

Source -> utm_source
Campaign -> utm_campaign or campaign
Keyword -> utm_term or keyword
Medium -> utm_medium


Additional setup is required for every form in which you wish to do source tracking.  See installation below.



== Installation ==

Installation using wordpress: 

1. Login into admin panel. 
2. Go to plugins. 
3. Click on add new.  
4. Upload the ZIP file provided for this plugin.
5. Cick install.
6. Enable the plugin after you see successful installation page. 


To add source tracking on a form, add any of the following hidden fields anywhere in your CF7 form:

[hidden source class:sko_source]
[hidden campaign class:sko_campaign]
[hidden keyword class:sko_keyword]
[hidden medium class:sko_medium]


Note: It is vitally important not to change the field's class.

Every time the form is loaded onto a page, this plugin with automatically fill the hidden fields with your data.

== How to use UTM fields == 

https://ga-dev-tools.appspot.com/campaign-url-builder/

