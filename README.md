<h4><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="150"> Based File Manager for Nextcloud Storage using WebDav</h4>

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
