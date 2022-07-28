<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'contrib/rsync.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/ardie85/wongtani-frontend-admin.git');
set('ssh_multiplexing',true);

set('rsync_src', function(){
	return __DIR__;
});

add('rsync',[
	'exclude'=> [
	'.git',
	'.github',
	'deploy.php',
	],
]);

task('deploy:secrets',function(){
	file_put_content(__DIR__.'./env',getenv('DOT_ENV'));
	upload('.env',get('deploy_path').'/shared');
});

// [Optional] Allocate tty for git clone. Default value is false.
// set('git_tty', true); 

// Host

host('103.19.208.16')
    ->setRemoteUser('deployer')//SSH user
    ->set('port',22)
    ->setDeployPath('/var/www/html/wongtani-frontend-admin')
    ->set('branch','master');//Git branch

after('deploy:failed','deploy:unlock');

desc('Start of Deploy the application');

task('deploy',[
    'deploy:info',
	'deploy:prepare',
	'deploy:lock',
    'deploy:release',
	'rsync',
	'deploy:secrets',
	'deploy:vendors',
	'deploy:shared',
    'deploy:writable',
	'artisan:storage:link',
	'artisan:view:cache',
	'artisan:config:cache',
	'artisan:migrate',
	'artisan:queue:restart',
	'deploy:publish',
]);

desc('End of Deploy the application');
