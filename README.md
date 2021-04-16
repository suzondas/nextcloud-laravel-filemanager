<h2>Laravel Based File Manager for Nextcloud Storage using WebDav</h4>
<p><img style="float:left;" src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="120"><img  style="float:left;"src="https://www.zdnet.com/a/hub/i/r/2016/06/02/ed1d81e9-20ae-40c9-bbd9-3ecddb63d5c7/resize/770xauto/8d1d33319448e46b76491d6f3564d201/nextcloud-logo.jpg" width="80"><img style="float:left;" src="https://www.netdrive.net/static/netdrive_www/images/webdav-flat.png" width="50"></p>
 
## About Project
Main objective for developing this project was to provide an interactive File Manager for Nextcloud storage using WebDav
technology. 

## Used Dependencies
1. Laravel 8.12
2. [laravel-webdav](https://github.com/protonemedia/laravel-webdav)

## Guideline to use
1. After downloding the project please install dependenies using <pre>composer install</pre>
2. Change your Nextcloud credentials in /config/filesystems.php as:
<pre>'webdav' => [
                 'driver' => 'webdav',
                 'baseUri' => 'http://v2202104146053149958.hotsrv.de', //replace by yours baseUri
                 'userName' => 'admin', //replace by your user name
                 'password' => 'ficu3Hochoong7Mu8baelai4', //replace by your password
                 'pathPrefix' => 'nextcloud/remote.php/webdav', //keep it intake
             ],
</pre>

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Suzon Das via [suzon.du@hotmail.com](mailto:suzon.du@hotmail.com). All security vulnerabilities will be promptly addressed.

## License

This is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
