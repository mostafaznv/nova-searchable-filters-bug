## Nova Searchable Filters [Bug Reproduction]

> [!NOTE] 
> This is a reproduction of a bug in the `laravel/nova` package.


I'm facing an issue with `belongsTo` relationships in my Nova resources.
If I enable the `searchable` method on the `belongsTo` field, the filter box crashes, and I receive a console error. 
These fields work fine when I want to `create`/`update` an item on the `add`/`edit` pages.
However, when I attempt to filter results on the index page, the filter box crashes, and I receive a console error.



![https://private-user-images.githubusercontent.com/7619687/291857610-cb69bb02-9d3f-4726-a458-6ba0803d72ed.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MDc3MjYyMjgsIm5iZiI6MTcwNzcyNTkyOCwicGF0aCI6Ii83NjE5Njg3LzI5MTg1NzYxMC1jYjY5YmIwMi05ZDNmLTQ3MjYtYTQ1OC02YmEwODAzZDcyZWQucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI0MDIxMiUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNDAyMTJUMDgxODQ4WiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9NjY3NWU0MjZiZjBkNTRmMjA3MWJjMjY3ZjM0ZjM2MjVlMzcyZGUzNjAwNDkwZWEzMDUyYzIxOTRiZjQxMjIwYyZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmYWN0b3JfaWQ9MCZrZXlfaWQ9MCZyZXBvX2lkPTAifQ.r0xN_WPNADD4Mn7i-Adf-1yZ_iCDvzIOgHOXXci71Co](img.png)


<br>

----

<br>

### Reproduction Steps:
1. Clone the repository
2. Open the `.env` file and set your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
3. Open the `.env` file and set your `NOVA_LICENSE_KEY`
4. Run `composer install`
5. Migrate and seed the database using the following command:
    ```bash
    php artisan migrate:fresh --seed
    ```
6. Run the server using the following command:
    ```bash
    php artisan serve
    ```
7. Visit the admin panel by going to http://127.0.0.1:8000/nova
8. Your credentials are:
    - Email: `admin@nova.com`
    - Password: `password`
9. Open the inspect element tool in Chrome/Firefox and navigate to the `console` tab
10. Go to the `Article` resource and try to filter the results using the `User`/`Category` filter.
11. **Boom!** You will see the error in the console, and the filter box will crash until you close it or refresh the page.
