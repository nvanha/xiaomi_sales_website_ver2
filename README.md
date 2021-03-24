### [Xiaomi Sales Website Version 2][link_ver2] - [nvan.ha][website] 👋

## Introduce
- This is a complete upgrade compared to [Version 1][link_ver1]
- Database use `Functions` and `Procedures`
- Site is built from `HTML, CSS, JavaScript, MySql, PHP`, not `Framework`
- Not yet support `English`
- Not yet `Responsive Web`

## Installation
Set config in `admincp/modules/config.php` :
```php
$host = '';
$user_name = '';
$password = '';
$database = '';

$conn = mysqli_connect($host, $user_name, $password, $database);

if (!$conn) {
    echo "Connection failed: ".mysqli_connect_error();
}
```
## Path
Index:
```path
localhost/xiaomi_sales_website_ver2/index.php
```

Admin Control Panel:
```path
localhost/xiaomi_sales_website_ver2/admincp/index.php
```
*Note, account login page Admin is: admin-admin*
### Connect with me:

[<img align="left" alt="nvanha.com" width="22px" src="https://raw.githubusercontent.com/iconic/open-iconic/master/svg/globe.svg" />][website]
[<img align="left" alt="nvanha | Facebook" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/facebook.svg" />][facebook]
[<img align="left" alt="nvanha | Instagram" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/instagram.svg" />][instagram]

[website]: https://nvanha.github.io/myweb
[instagram]: https://www.instagram.com/_haa_nguyen
[facebook]: https://www.facebook.com/nvh1120
[link_ver1]: https://github.com/nvanha/xiaomi_sales_website_ver1
[link_ver2]: https://github.com/nvanha/xiaomi_sales_website_ver2