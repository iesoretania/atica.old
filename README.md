# ATICA

Web application for supporting Quality Management Systems.

ATICA is an open source Web application that intends to ease the work with QMS. Some of its features include:

  * Manage users and profiles.
  * Set up activities so users only see what they need to see.
  * Prepare an "action calendar" so users know what they need to do.
  * Manage the document workflow, including upload, review and acceptation.
  * Keep document revisions under control using tracking features.
  
## Requirements
These are the requirements for running ATICA:

  * Web server with PHP 5.2 or later.
  * MySQL, PostgreSQL, MSSQL, or Oracle database access. SQLite is also allowed, but not recommended for perfomance reasons.
  * For the client: IE 7.0+, Firefox 3.6+ or Webkit-based browser (Safari 3+, Chrome 10+, iOS 3+, Android Browser 2.2+), etc.

## Install
Follow these easy steps:

  * Unpack the source code into a folder which is accesible by the web server.
  * Create a database schema and a database user which has all privileges on that schema.
  * Open a browser and head to the *index.php* file.
  * Run the setup wizard.

## Acknowledgments
This application uses the following libraries:

  * [TinyMCE].
  * [Restler].
  * [Propel].

Special care has been taken to ensure that their respectives licenses are being respected. Should you find any uncompliance, don't hesitate
in opening an issue ticket.

## License
This application is licensed under [AGPL version 3].

[TinyMCE]: http://www.tinymce.com/index.php
[Restler]: http://luracast.com/products/restler/
[Propel]: http://www.propelorm.org/
[AGPL version 3]: http://www.gnu.org/licenses/agpl.htmlu.org/licenses/agpl.html