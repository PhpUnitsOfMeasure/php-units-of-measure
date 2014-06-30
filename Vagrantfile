Vagrant.configure("2") do |config|
    config.vm.box = "precise64"
    config.vm.box_url = "http://files.vagrantup.com/precise64.box"

    config.vm.network :private_network, ip: "192.168.56.11"
    config.ssh.forward_agent = true
    config.vm.network :forwarded_port, guest: 80, host: 8080

    config.vm.provider :virtualbox do |v|
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        v.customize ["modifyvm", :id, "--memory", 512]
    end

    config.vm.synced_folder "./", "/project", :nfs => true

    config.vm.provision "shell", path: "vagrant/provision_scripts/base.sh"
    #config.vm.provision "shell", path: "vagrant/provision_scripts/nginx.sh"
    config.vm.provision "shell", path: "vagrant/provision_scripts/php.sh"
    #config.vm.provision "shell", path: "vagrant/provision_scripts/mysql.sh"
    #config.vm.provision "shell", path: "vagrant/provision_scripts/memcached.sh"
    #config.vm.provision "shell", path: "vagrant/provision_scripts/yuicompressor.sh"
    #config.vm.provision "shell", path: "vagrant/provision_scripts/compass.sh"
end
