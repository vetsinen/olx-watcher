requirements: for local deploy this application needs docker and docker-compose

for first time you need to run from application directory:
    docker-compose up --build

for regular launch you need to start from application directory:
    docker-compose up

after containers runned application is availeble on aaddress http://localhost:8080

if you edit settings in .env file, you also need to change constants in src/config.php

