<?php
/*
|--------------------------------------------------------------------------
| Code in bootstrap/environment.php
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Dotenv package is not accessible in the file so we will use the other way around.
| Create an instance of Dotenv class which takes two parameters:
| $dotenv = new Dotenv\Dotenv(path_to_env_file, name_of_file);
|
*/

$env = $app->detectEnvironment(function () {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../', '.env');
    $dotenv->load();
    if (getenv('APP_ENV') && file_exists(__DIR__ . '/../.' . getenv('APP_ENV') . '.env')) {
        $dotenv = new Dotenv\Dotenv(__DIR__ . '/../', '.' . getenv('APP_ENV') . '.env');
        $dotenv->overload();
    }
});
