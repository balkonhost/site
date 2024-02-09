@servers(['local' => 'localhost', 'prod' => 'balkon@obschaga1.balkon.host'])

@task('sync', ['on' => 'local'])
    echo "Running file synchronization"
    rsync -arv app balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv config balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv database balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv public balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv resources balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv routes balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv .env balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv composer.json balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv composer.lock balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv package.json balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv package-lock.json balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
    rsync -arv webpack.mix.js balkon@obschaga1.balkon.host:~/web/balkon.host/public_html
@endtask

@task('migrate', ['on' => 'prod'])
    echo "Running migrations"
    cd ~/web/balkon.host/public_html
    php ./artisan migrate
    php ./artisan db:seed
@endtask

@task('rollback', ['on' => 'prod'])
    echo "Running rollback"
    cd ~/web/balkon.host/public_html
    php ./artisan migrate:rollback
@endtask

@task('npm', ['on' => 'prod'])
    echo "NPM installing dependencies"
    cd ~/web/balkon.host/public_html
    npm i
@endtask

@task('composer', ['on' => 'prod'])
    echo "Composer installing dependencies"
    cd ~/web/balkon.host/public_html
    php8.1 ~/composer.phar update
    php8.1 ~/composer.phar install
@endtask

@task('replace', ['on' => 'prod'])
    echo "Replace the old files"
    cd ~/web/balkon.host/public_html
@endtask

@story('deploy')
    sync
    composer
    migrate
    replace
@endstory
