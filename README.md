DESCRIPTION

 Web app calculates end of service for employees based on SA law for end of service rules and conditions









INSTALATTION

1. git pull origin https://github.com/AsmaaIbrahim57/end-of-service-sa in htdocs directory
2. open the project in your IDE 
3. create a file named .env then copy the code in this file .env.example and paste it in your .env file
    then change database config to your username, password, and db name
4. create the db
5. write these commands in the terminal:
                         composer install
                         php artisan key:generate
                         php artisan migrate
                         npm install
                         php artisan serve
                         copy the link in your terminal and paste it into your browser address bar






FEATURES

1. Create Employee => /create
2. Show Employees list => /
3. Set Resignation Reason 
4. Calculate End of Service value
