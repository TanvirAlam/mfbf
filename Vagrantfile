# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "realreadme/amazon2016.09"
  config.vm.box_version = "1.0.0"
  # config.vm.box_check_update = false

  config.vm.network "private_network", ip: "192.168.54.32"
  config.vm.hostname = "mfbf.dev"

  config.vm.provision "shell", inline: <<-SHELL
    # Set up bash
    sed -i '/cd \/vagrant/d' /home/vagrant/.bashrc
    echo "cd /vagrant" >> /home/vagrant/.bashrc

    # Install stuff
    sudo yum update -y
    sudo yum install -y httpd24 php71-fpm php71-pdo php71-mysqlnd php71-mbstring mysql-server

    # Fix configs
    sudo sed -i 's/user = apache/user = vagrant/g' /etc/php-fpm-7.1.d/www.conf
    sudo sed -i 's/group = apache/group = vagrant/g' /etc/php-fpm-7.1.d/www.conf
    sudo sed -i 's/listen.acl_users = apache,nginx/listen.acl_users = apache/g' /etc/php-fpm-7.1.d/www.conf
    sudo sed -i 's/DocumentRoot \\"\\/var\\/www\\/html\\"/DocumentRoot \\"\\/vagrant\\/public\\"/g' /etc/httpd/conf/httpd.conf
    sudo sed -i 's/<Directory \\"\\/var\\/www\\">/<Directory \\"\\/vagrant\\">/g' /etc/httpd/conf/httpd.conf
    sudo sed -i 's/<Directory \\"\\/var\\/www\\/html\\">/<Directory \\"\\/vagrant\\/public\\">/g' /etc/httpd/conf/httpd.conf
    sudo sed -i 's/    DirectoryIndex index.html/    DirectoryIndex index.php/g' /etc/httpd/conf/httpd.conf
    sudo sed -i 's/    AllowOverride None/    AllowOverride All/g' /etc/httpd/conf/httpd.conf
    sudo echo -e "<FilesMatch \\.php$>\\n    SetHandler \\"proxy:unix:/var/run/php-fpm/www.sock\\|fcgi://127.0.0.1:9000\\"\\n</FilesMatch>" > /vagrant/php.conf.tmp
    sudo mv -f /vagrant/php.conf.tmp /etc/httpd/conf.d/php.conf
    sudo echo -e "* * * * * root php /vagrant/artisan schedule:run >> /dev/null 2>&1" > /vagrant/scheduler.tmp
    sudo mv -f /vagrant/scheduler.tmp /etc/cron.d/scheduler

    # Install composer
    sudo curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    composer global require hirak/prestissimo

    # Start services
    sudo service mysqld start
    sudo service httpd start
    sudo service php-fpm-7.1 start
    sudo service crond restart
    sudo chkconfig mysqld on
    sudo chkconfig httpd on
    sudo chkconfig php-fpm-7.1 on

    # Database prepping
    mysql -uroot -e 'CREATE DATABASE IF NOT EXISTS forge'
    mysql -uroot -e 'GRANT ALL PRIVILEGES ON forge.* TO "forge"@"127.0.0.1"'
    mysql -uroot -e 'FLUSH PRIVILEGES'
  SHELL
  config.vm.provision "shell", run: 'always', inline: <<-SHELL
    sudo service httpd start
  SHELL
end
