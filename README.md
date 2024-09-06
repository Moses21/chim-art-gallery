# Chimwem Luwanda Art Galey Website

---

### _to set up the website if you are a developer please do the following_

---

1. cd into the project folder
2. open the terminal in that folder or CMD if you are on windows
3. run :

`composer install`

4. now setup the database by running the following in your cmd / terminal

`php artisan migrate:fresh --seed`

> this should be able to migrate data into your database. if you run into erorrs then do the following.

-   Make sure your Server is running and the database Driver is also running i.e Xampp or Wampp
-   Make sure your have a .env file if not there will be a :

    ```
     .env.example

    ```

    in the root of this project now if you are on linux run the following command to copy the contents of the file into a new .env file :

    ```
    cp .env.example .env
    ```

-   for windows run :

    ```copy .env.example .env

    ```

-   in this file there will be a line showing the name of the database for the project. I will look like this

    ```
    DB_DATABASE=chimwemwe_luwanda

    ```

-   the name of the database is : "chimweme_lunwanda" in this case you can make this database manually and then got back to running the command on number 4

    ```
     php artisan migrate:fresh --seed
    ```

-   this should do it.

> _this will install all the required dev dependencies for the laravel backend_

# once you have done so; then now let's setup the environment for the frontend

4. run :

```
 npm install

```

> _this will install all the required dev dependencies for the React Frontend_

---

_Voila you are done setting up: but now let's get into running the project_

---

> the poject as said ealier on has two parts in one :

1. The backend
2. The front end

> when running in development you have to run these two separately: like this :

1. Open two terminals in the same project folder
2. In the first terminal run this command to run the laravel part of the project :

```
php artisan serve

```

3. In the second terminal run this command to run the react part of the project:

    ```
    npm run dev

    ```

# _Please note_

> if you run the php part of the project without running the front end the project won't run you might get this error:

`Manifest.json not found`

> once we are done and we want to deploy the project to a live server: sitingmapange run ma terminal and what no so in production you will do this.

1.  run the following command to compile the react part of the project to a production enviornemnt:

    ```
    npm run build

    ```

2.  let's touch the .env file to make sure we are not logging any laravel errors to the user now. it's boring
    touch the following lines.

    -   edit them from this :

        ```
        APP_ENV=local
        APP_DEBUG=true

        ```

    -   to this :

        ```
        APP_ENV=production
        APP_DEBUG=false

        ```

> that's it you are good to go nchimwene.

---

_written by your truly_

[Takondwa Kapyola](https://github.com/takondwamw)

---
