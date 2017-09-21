
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"

  config.vm.network "private_network", ip: "192.168.54.32"

  config.vm.hostname = "mfbf.dev"

  composer_cache_dir = Dir.home + "/.composer/cache"
  FileUtils.mkdir_p(composer_cache_dir) unless File.directory?(composer_cache_dir)
  config.vm.synced_folder composer_cache_dir, "/home/vagrant/.composer/cache", owner: "vagrant", group: "vagrant", :mount_options => ["umask=002"]

  config.vm.provider "virtualbox" do |vb|
    vb.memory = 2048
    vb.cpus = 1
    vb.customize ["modifyvm", :id, "--vram", "16"]
    vb.customize ["modifyvm", :id, "--ioapic", "on"]
  end

  config.vm.provision "shell", inline: <<-SHELL
    # Basics
    echo "cd /vagrant" >> /home/vagrant/.bashrc
    echo "export PATH=\\$PATH:/vagrant:/vagrant/vendor/bin" >> /home/vagrant/.bashrc
    sudo apt-get update -qq
    sudo apt-get install -qq git-all unzip

    # MariaDB
    if [ ! -f /home/vagrant/.maria ]
    then
        touch /home/vagrant/.maria
        sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xcbcb082a1bb943db
        sudo add-apt-repository 'deb [arch=amd64,i386,ppc64el] http://mirrors.dotsrc.org/mariadb/repo/10.2/ubuntu trusty main'
        sudo debconf-set-selections <<< 'mariadb-server-10.2 mysql-server/root_password password vagrant'
        sudo debconf-set-selections <<< 'mariadb-server-10.2 mysql-server/root_password_again password vagrant'
        sudo apt-get update -qq
        sudo apt-get install -qq mariadb-server
    fi

    # Nginx
    if [ ! -f /home/vagrant/.nginx ]
    then
        touch /home/vagrant/.nginx
        sudo update-rc.d apache2 disable
        sudo service apache2 stop
        sudo apt-get install -qq nginx
        sudo update-rc.d nginx enable
        sudo rm -rf /etc/nginx/sites-enabled/*
        sudo ln -s /vagrant/vagrant/sites-available/dev /etc/nginx/sites-enabled/
    fi

    # PHP 7.0 FPM
    if [ ! -f /home/vagrant/.php71 ]
    then
        touch /home/vagrant/.php71
        sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
        sudo apt-get update -qq
        sudo apt-get install -qq php7.1-fpm php7.1-mbstring php7.1-mysql php7.1-cli php7.1-xml php7.1-zip
        sudo cp -f /vagrant/vagrant/pool.d/www.conf /etc/php/7.1/fpm/pool.d/
        sudo service php7.1-fpm restart
    fi

    sudo cp -f /vagrant/vagrant/cron.d/scheduler /etc/cron.d/
    sudo service cron restart

    # Composer
    chown vagrant:vagrant /home/vagrant/.composer
    sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

    # NodeJS
    curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
    sudo apt-get install -yqq nodejs

    # Copy environment file
    sudo cp /vagrant/vagrant.env /vagrant/.env

    # Migrate and seed database
    mysql -uroot -pvagrant -e 'drop database if exists forge;'
    mysql -uroot -pvagrant -e 'create database forge;'
    sudo -u vagrant -Hi composer --no-ansi install -d /vagrant
    sudo -u vagrant -Hi php /vagrant/artisan migrate
    sudo -u vagrant -Hi php /vagrant/artisan db:seed
  SHELL

  config.vm.provision "shell", run: 'always', inline: <<-SHELL
    sudo -u root -i service nginx restart
  SHELL
end
