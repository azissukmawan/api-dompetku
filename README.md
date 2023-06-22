
# api-dompetku

this api project is used in flutter project [repository](https://github.com/azissukmawan/dompetku)


## Description

 - Register & Login
 - Add History income
 - Add History outcome
 - Get all History
 - Get detail History
 - Get history search
 - Update history
 - Delete history
 - Get analysis history


## Setup

- Clone this project ```https://github.com/azissukmawan/api-dompetku.git```
- ```cd project``` on your terminal to go project
- in file ```connection.php```
```php
$host = "your host";
$user = "root";
$password = "";
$db = "dompetku";
```
change variabel ```$host``` , ```$user```, ```$password```, ```$db``` for setup your database

database SQL file you can get in link here https://drive.google.com/file/d/118R_NyjHq4GfTXcTCcdGN7wVopYDGFQ3/view?usp=sharing

- Run server local like a [XAMPP](https://www.apachefriends.org/download.html) or [Laragon](https://laragon.org/download/index.html)
    
## API Reference

### Register

```http
  POST /user/register.php
```

| Key body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. add name data for the account |
|`email`| `string` | **Required**. add email data for the account |
|`password`| `anything` | **Required**. add password data for the account |

Response result

```json
{
    "success": true
}
```

### Login

```http
  POST /user/login.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. e-mail data that already exists in the database  |
| `password` | `anything` | **Required**. unencrypted password that already exists in the database  |

Response result
```json
{
    "success": true,
    "data": {
        "id_user": "2",
        "name": "azis",
        "email": "azis@gmail.com",
        "password": "encrypt password",
        "created_at": "2022-01-09 02:17:44",
        "updated_at": "2022-01-09 02:17:44"
    }
}
```

### Add history income or outcome

```http
  POST /history/add.php
```
| Key body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id_user` | `int` | **Required**. for the user id in the database  |
|`type`| `string` | **Required**. a value that has two options, ```Pengeluaran``` or ```Pemasukan``` |
|`date`| `Date format` | **Required**. date format with type ```yyy-MM-dd``` |
|`total`| `double` | **Required**. with appropriate references ```details``` |
|`details`| `Json format key: value` | **Required**. data with json format reference key:value, ```{"name": " ", "price": " "}``` |

Response result

```json
{
    "success": true
}
```
### Get all history

```http
  POST /history/history.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_user`      | `int` | **Required**. for get all data history in specific id user  |

Response result
```json
{
    "success": true,
    "data": [
        {
            "id_history": "31",
            "date": "2023-06-21",
            "total": "10000.0",
            "type": "Pengeluaran"
        },
        {
            "id_history": "24",
            "date": "2023-06-18",
            "total": "10000.0",
            "type": "Pengeluaran"
        },
    ]
}
```

### Get detail history

```http
  POST /history/detail_history.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_user`      | `int` | **Required**. for get data appropriate history in specific id user  |
|`type`| `string` | **Required**. a value that has two options, ```Pengeluaran``` or ```Pemasukan``` in specific detail|
|`date`| `Date format` | **Required**. date format with type ```yyy-MM-dd``` for specific history|

Response result
```json
{
    "success": true,
    "data": {
        "id_history": "22",
        "id_user": "2",
        "type": "Pengeluaran",
        "date": "2023-06-15",
        "total": "20000.0",
        "details": "[{\"name\":\"Ngojek\",\"price\":\"20000\"}]",
        "created_at": "2023-06-15T15:37:38.636849",
        "updated_at": "2023-06-15T15:37:38.637680"
    }
}
```

### Get history search

```http
  POST /history/history_search.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_user`      | `int` | **Required**. for get data appropriate history in specific id user  |
|`date`| `Date format` | **Required**. date format with type ```yyy-MM-dd``` for specific history|

Response result
```json
{
    "success": true,
    "data": [
        {
            "id_history": "21",
            "date": "2023-06-15",
            "total": "15000000.0",
            "type": "Pemasukan"
        },
        {
            "id_history": "22",
            "date": "2023-06-15",
            "total": "20000.0",
            "type": "Pengeluaran"
        }
    ]
}
```
### Update history

```http
  POST /history/update.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_history`      | `int` | **Required**. for get data appropriate history specific  |
| `id_user`      | `int` | **Required**. for get data appropriate history in specific id user  |
|`type`| `string` | **Required**. to change the values ​​of the two options|
|`date`| `Date format` | **Required**. to change the value date in history|
|`total`| `Double` | **Required**. to change the value total in history|
|`detail`| `Json format` | **Required**. to change the value detail in history|
|`update_at`| `Date fromat : time fromat` | Usually this is set automatically using the date and time format library|

Response result
```json
{
    "success": true
}
```

### Delete history

```http
  POST /history/delete.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_history`      | `int` | **Required**. for delete data appropriate history specific  |

Response result
```json
{
    "success": true
}
```

### Get analysis history

```http
  POST /history/analysis.php
```

| Key body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_user`      | `int` | **Required**. for get data in specific user  |
| `today`      | `date format` | **Required**. this format ```yyyy-MM-dd``` for reference today, yesterday, week seven days ago, month for reference income and outcome   |

Response result
```json
{
    "today": 0,
    "yesterday": 0,
    "week": [
        0,
        0,
        0,
        10000,
        20000,
        0,
        0
    ],
    "month": {
        "income": 23000000,
        "outcome": 670000
    }
}
```
## Contributing

Contributions are always welcome!

if you have free time and want to revise or add features, Then, you can open a new [issue](https://github.com/azissukmawan/api-dompetku/issues), of a [pull request](https://github.com/azissukmawan/api-dompetku/pulls). Thank you 😁

