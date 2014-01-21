set :application, "Dive Bar"
set :repository,  "git@github.com:umerfarooq/qb.git"
set :scm, :git
set :use_sudo, false
set :branch, 'master'
default_run_options[:pty] = true

set :deploy_to, "/home/bitbytez/qb.bitbytez.com/"
set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
set :ssh_options, {:forward_agent => true}

task :dev do
  server "www.qb.bitbytez.com", :app
  set :user, "bitbytez"
  set :password, Capistrano::CLI.password_prompt("#{fetch(:user, "server_user")} password: ")
end

desc "Symlink shared configs and folders on each release."
task :symlink_shared do
  run "ln -nfs #{shared_path}/wp-config.php #{release_path}/wp-config.php"
  run "ln -nfs #{shared_path}/.htaccess #{release_path}/.htaccess"
  run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
end
after :deploy, "symlink_shared"
after :deploy, 'deploy:cleanup'