# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    # Disable the default /vagrant synced folder and replace it
    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder ".", "/project"

    # Virtualbox, for all instances
    config.vm.provider "virtualbox" do |vb, override|
        override.vm.box = "ubuntu/trusty64"
        vb.memory = "1024" # in MB

        override.vm.network "private_network", type: "dhcp"
        override.ssh.forward_agent = true
    end

    config.vm.provision "shell", inline: $script
end

$script = <<SCRIPT
apt-add-repository -y ppa:ondrej/php5-5.6
apt-get update
apt-get install -y php5-cli php5-xdebug
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin
SCRIPT
