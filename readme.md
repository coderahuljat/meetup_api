# MeetUp API TEST

This repo contains code for Test Assignment. Following technology/platform used to develope
  - Laravel 5.8 (requires at least PHP 7.1.3)
  - MySQL 5.7
  - Composer
  - Git
  - PHP 7.3, Apache Server, etc

# Deploying the Project

  - Clone this repo into the root of Apache server and goto the directory
  - Run following to install Laravel Framework
  - ```sh
    $ composer install
    ```
  - Copy .env.example as .env (if .env is not already created)
  - Change database credentials in .env
  - Run following to create required database table
  - ```sh
    $ php artisan migrate
    ```
# Running the Project
  - Run following to start the deployment server
  - ```sh
    $ php artisan serve
    ```
  - By default the server will start on <http://127.0.0.1:8000>

# API
  - Register (Multiple entries can be created)
  -- **POST** http://127.0.0.1:8000/api/participants
  -- Sample Request
   ```sh
      {
    "data": [
	    {
		    "name": "NIRMEET SANGHANI",
		    "age": 30,
		    "dob": "1990-01-05",
		    "profession": "IT",
		    "no_of_guests": 2,
		    "address": "Kandivali"
		 },
		 {
		    "name": "RAM",
		    "age": 25,
		    "dob": "1995-01-05",
		    "profession": "BPO",
		    "no_of_guests": 0,
		    "address": "Malad"
		 },
	    ]
    }
```
 --Response
```sh
{
    "status": 200,
    "payload": [
        {
            "name": "NIRMEET SANGHANI",
            "age": 30,
            "dob": "1990-01-01",
            "profession": "IT",
            "no_of_guests": 2,
            "address": "Kandivali",
            "updated_at": "2020-11-02 19:14:16",
            "created_at": "2020-11-02 19:14:16",
            "id": 3
        },
        {
            "name": "RAM",
            "age": 25,
            "dob": "1995-01-05",
            "profession": "BPO",
            "no_of_guests": 2,
            "address": "Malad",
            "updated_at": "2020-11-02 19:14:17",
            "created_at": "2020-11-02 19:14:17",
            "id": 4
        }
    ],
    "message": "Data saved successfully"
}
```    
  - UPDATE (Pass Primary Key in URL)
  -- **PUT** http://127.0.0.1:8000/api/participants/1
  -- Sample Request
```sh
{
   "name": "NIRMEET SANGHANI ABCD",
   "age": 35,
   "dob": "1990-04-20",
   "profession": "SEN IT",
   "no_of_guests": 1,
   "address": "Kandivali EAST"
}
```


-- Sample Response
```sh
{
    "status": 200,
    "payload": {
        "id": 1,
        "name": "NIRMEET SANGHANI ABCD",
        "age": 35,
        "dob": "1990-04-20",
        "profession": "SEN IT",
        "no_of_guests": 1,
        "address": "Kandivali EAST",
        "created_at": "2020-11-02 15:06:31",
        "updated_at": "2020-11-02 18:15:28"
    },
    "message": "Data updated successfully"
}
```

- LIST (Paginate to show 10 records, pass page=page_no in url)
-- **GET** http://127.0.0.1:8000/api/participants?page=1
-- Sample Response
```sh
{
    "status": 200,
    "payload": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "NIRMEET SANGHANI",
                "age": 30,
                "dob": "1990-04-15",
                "profession": "IT",
                "no_of_guests": 2,
                "address": "Kandivali",
                "created_at": "2020-11-02 18:31:35",
                "updated_at": "2020-11-02 18:31:35"
            },
            {
                "id": 2,
                "name": "NIRMEET SANGHANI",
                "age": 30,
                "dob": "1990-04-15",
                "profession": "IT",
                "no_of_guests": 2,
                "address": "Kandivali",
                "created_at": "2020-11-02 18:31:35",
                "updated_at": "2020-11-02 18:31:35"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/participants?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/participants?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/participants",
        "per_page": 10,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    },
    "message": "Data retrieved successfully."
}
```
**THANK YOU!**
