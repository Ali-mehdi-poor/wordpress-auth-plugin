### WordPress Auth

A simple authentication plugin to understand the structure of a WordPress plugin. This is a small project that helps those who are learning to write plugins for WordPress to become familiar with the basic structure as well as working with the WordPress APIs that it provides us and to have a general understanding of WordPress plugins.

### Usage 

To use it, simply create a folder named wordpress-auth in your WordPress directory from the wp-content folder inside the plugins folder, which is the same name as the main plugin file, and copy the contents of this repository into the folder. Then, by logging into the WordPress admin section from the plugins section, you can activate the wordpress authentication plugin.

After activating the plugin, you can use the following shortcodes on your desired page to perform authentication operations:

for register:
[wp_auth_register]

for login:
[wp_auth_login]