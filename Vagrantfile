# -*- mode: ruby -*-
# vi: set ft=ruby :

$project_dir = "/srv/www"
Vagrant.require_version ">= 1.7.2"

ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

VAGRANTFILE_API_VERSION = "2"

if ! ENV['RAD_ENVIRONMENT']
    ENV['RAD_ENVIRONMENT'] = 'development'
end

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.ssh.username = 'radphp'
    config.ssh.password = 'radphp'

    config.vm.define 'radphp', primary: true do |radphp|
        radphp.vm.synced_folder '.', "#{$project_dir}"
        radphp.vm.provision "shell" do |s|
            s.path = "bin/provision.sh"
            s.args = "#{$project_dir}"
        end
        radphp.vm.provider 'docker' do |d|
            d.name = "radphp-demo-" + ENV['RAD_ENVIRONMENT']
            d.image = "radphp/docker-lepp"
            d.ports = ["80:80", "443:443", "8080:8080", "5432:5432"]
            d.has_ssh = true
            d.env = {
                'RAD_ENVIRONMENT' => ENV['RAD_ENVIRONMENT']
            }
        end
    end
end

