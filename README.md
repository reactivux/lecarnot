## Cpanel

## Steps installation

1. cp .env.example .env ( and change UUID and MIX_APP_URL )
2. composer install
3. php artisan key:generate
4. php artisan passport:install --force
5. php artisan config:cache
6. php artisan storage:link

### 1 - Create folder on cpanel

Create folder with name of project (foodies) outside public_html or wwww folder

### 2 - Compress your project

Compress your project website from local without folder 'public'

### 3 - Upload project

Upload your project website inside folder (foodies) on cpanel

### 4 - Public folder

Back on local project, compress your public folder, and upload it inside public_html ( all files required to move them to the root folder )

### 5 - Edit index.php

Edit your file index.php :
require **DIR**.'/../foodies/vendor/autoload.php';
require_once **DIR**.'/../foodies/bootstrap/app.php';

### 6 - Edit AppServiceProvider.php

path : app/Providers/AppServiceProvider.php
Add this code on AppServiceProvider
public function boot(){$this->app->bind('path.public', function() {return base_path().'/../public_html';})}

### 7 - If you have a problem with cache, follow these steps

1. Application Cache: php artisan cache:clear
2. Configuration Cache: php artisan config:clear
3. Route Cache: php artisan route:clear
4. View Cache: php artisan view:clear
5. Compiled Class Files: php artisan clear-compiled
6. Optimization Level: php artisan optimize:clear
