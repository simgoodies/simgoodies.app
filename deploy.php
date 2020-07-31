<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'simgoodies');

// Project repository
set('repository', 'https://github.com/vatsimgoodies/vatgoodies.com.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);



// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('staging')
    ->hostname('forge@simgoodies.roelgonzalez.space')
    ->stage('staging')
    ->set('deploy_path', '~/simgoodies.roelgonzalez.space');

// Tasks

task('what_branch', function () {
    $branch = ask('What branch to deploy?');

    if (!empty($branch)) {
        on(roles('app'), function ($host) use ($branch) {
            set('branch', $branch);
        });
    }
})->local();

task('build', function () {
    run('cd {{release_path}} && build');
});

before('deploy', 'what_branch');

after('deploy:vendors', 'yarn');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');