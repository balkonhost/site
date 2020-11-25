@servers(['local' => 'localhost', 'prod' => 'user@balkon.host'])

@task('sync', ['on' => 'local'])
echo "Running file synchronization"
rsync -arv app user@balkon.host:~/web/balkon.host/laravel
rsync -arv config user@balkon.host:~/web/balkon.host/laravel
rsync -arv database user@balkon.host:~/web/balkon.host/laravel
rsync -arv public user@balkon.host:~/web/balkon.host/laravel
rsync -arv resources user@balkon.host:~/web/balkon.host/laravel
rsync -arv routes user@balkon.host:~/web/balkon.host/laravel
rsync -arv .env user@balkon.host:~/web/balkon.host/laravel
rsync -arv composer.json user@balkon.host:~/web/balkon.host/laravel
rsync -arv composer.lock user@balkon.host:~/web/balkon.host/laravel
rsync -arv package.json user@balkon.host:~/web/balkon.host/laravel
rsync -arv package-lock.json user@balkon.host:~/web/balkon.host/laravel
rsync -arv webpack.mix.js user@balkon.host:~/web/balkon.host/laravel
@endtask

@task('migrate', ['on' => 'prod'])
echo "Running migrations"
cd ~/web/balkon.host/laravel
php ./artisan migrate
php ./artisan db:seed
@endtask

@task('rollback', ['on' => 'prod'])
echo "Running rollback"
cd ~/web/balkon.host/laravel
php ./artisan migrate:rollback
@endtask

@task('npm', ['on' => 'prod'])
echo "NPM installing dependencies"
cd ~/web/balkon.host/laravel
npm i
@endtask

@task('composer', ['on' => 'prod'])
echo "Composer installing dependencies"
cd ~/web/balkon.host/laravel
composer install
@endtask

@task('replace', ['on' => 'prod'])
echo "Replace the old files"
cd ~/web/balkon.host/laravel/public
@endtask

@story('deploy')
sync
composer
migrate
replace
@endstory
