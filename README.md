# PHP-TEST

##Task 1

1. Clone the repository in the folder
2. Rename .env.example file to .env
3. Add Database details in .env file
4. run php artisan:migrate --seed
5. This application uses HTTP Basic Auth, to authenticate the api calls add API_USERNAME = test and API_PASSWORD = test in .env file

Endpoints:

To fetch student lists:

GET - /students

Single Student Details:

GET - /students/{id} (where id is from student table column "id")

Create student:

POST - /students

Update student:

POST - /students/{id} (where id is from student table column "id")


##Task 2

1. ADD CE_URL = https://v6.exchangerate-api.com/v6/40a4ad45c14352d573633789/latest and CE_BASE_CURRENCY = EUR in .env file.

Endpoints:

To update Exchange rate list:

GET - /update-currency-rates

To get latest echange rate list:

GET - /currency-rates

