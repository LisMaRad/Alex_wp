<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'Alex_wp');

// Project repository
set('repository', 'https://github.com/LisMaRad/Alex_wp');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', ['public/wp-config.php']);
set('shared_dirs', ['public/wp-content/uploads']);

// Writable dirs by web server 
//set('writable_dirs', []);
//set('allow_anonymous_stats', false);

// Hosts

host('vm-copper.multimediatechnology.at')
    ->user('admin')
	->port(5412)
	->set('deploy_path', '/home/admin/alex');    
    

//Composer
set('composer_action', false);

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
