# Quick Vagrant
## Introduction
This Vagrant configuration code is designed to be included in a project as a git submodule, or else
copied into a project subdirectory in some other fashion.  It provides basic support for provisioning a virtual machines for a variety of use cases.

## Installation
The quickest and easiest way to include this module in your project is to add it as a git submodule:

From the root directory of your parent project:

``` bash
git submodule add {remote repository} vagrant
git commit -m "Added quick vagrant submodule"

```

If instead you need to make changes from the default values and want to commit those changes to your project (which is likely), then you could copy the contents into your project with:

``` bash
git clone --depth=1 {remote repository} vagrant
rm -rf vagrant/.git
```

## Configuration
The default `vagrantfile` will boot a basic machine with no tools enabled by default, but it is likely that you'll want to add additional provisioning like PHP, Nginx and MySQL.

I've chosen to avoid typical tools like Puppet and Chef, and instead rely on shell scripts for provisioning.  In the included Vagrantfile, you'll see several provisioner shell scripts commented out at the bottom of the file, for instance:

``` bash
config.vm.provision "shell", path: "provision_scripts/base.sh"
```

Uncomment the scripts you want to install, and feel free to inspect the existing shell scripts and write your own if the default ones do not suffice.

## Use
Once you have the `vagrantfile` configured to your needs, bring up the virtual machine with:

``` bash
cd vagrant
vagrant up
```

You can then ssh into the machine with

``` bash
vagrant ssh
```

And if the machine has a web server installed (like Nginx), you can visit its port 80 by opening your browser and going to localhost:8080. See the port forwarding section of the `vagrantfile` to see how this is configured.
