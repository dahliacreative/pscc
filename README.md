# pscc




This repository contains the Concrete5.7 public website.

All development should follow the [style guide](https://github.com/rawnet/handbook/blob/master/Back-End/Concrete5.7%20Style%20Guide.md)

## Local Development
* Clone the repo into project directory

### Installing Vagrant
* Install vagant https://www.vagrantup.com/downloads.html (if you do not have it already)
* run ```vagrant up``` You now have a blank box ready to go

That is it seriously you have a functioning machine

### Running Ansible
The below instructions should only have to be run once to set everything up after that ignore these bullets
* In your project directory ``` cd ansible ```
* Run ```make install```
* Run ```make provision-development```
* Run ```make deploy-development```

### Getting a copy of the DB
In your project directory ```cd ansible``` then run ```make db-development```. That is it, it will grab you the latest version of staging.

### Getting a copy of the files directory
Want some nice pictures, sure no problem in you project directory ```cd ansible``` then run ```make files-development```. That is it, it will grab you the files directory from staging.



### To compile the user interface:
*Please do not edit compiled files, or commit them to github!*
- In terminal, from your project root, run `npm install` - You only need to do this when you first clone the repo
- In terminal from your project root, run `grunt` to compile and watch for further changes; or
- Run `grunt build` to simply build the project
