requirements: for local deploy this application needs docker and docker-compose

for  launch you need to start from application directory:
    docker-compose up

after containers runned application is availeble on address http://localhost:8080

To run utility for price updates checkup you need to run from project root folder in console:
  docker exec -it your_php_container_name php mailtask.php
where your_php_container_name is name of php application container in your system


for email service work you need to setup in correct way system utility
/usr/sbin/sendmail


if you edit settings in .env file, you also need to change constants in src/config.php

