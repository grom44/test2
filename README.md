Step to run:
    1. Clone repository git clone https://ssiadek@bitbucket.org/ssiadek/simple_crud_test.git
    2. Run composer install command (you need to use environment with php7 and composer installed)
    3. Change DB connection in .env file (there is already some test database connected so you can leave it for playing arond)
    4. If you want to use your own data base remeber to create it (u can use php bin/console doctrine:database:create)
       Remeber to migrate  (php bin/console make:migration and php bin/console doctrine:migrations:migrate)
    5. To run server use symfony server:start
    6. Open /user route (default: http://127.0.0.1:8000/user/)
    7. U can import users from csv file located in src/Resources directory by using command php bin/console crud:import_users users.csv



