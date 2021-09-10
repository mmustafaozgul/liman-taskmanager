#
# An example usage of apt from python programmatically
#
#
import apt # use apt-get to install somehow pip has an issue
import apt_pkg
apt_pkg.init_config()
apt_pkg.init_system()
cache  = apt_pkg.Cache()                    # all cache packages
ipacks = [pack for pack in cache.packages] 
# Matches for starting with liboost-python
import re
pattern = re.compile(r'^libboost-python')
cached = [pack for pack in ipacks if pattern.match(pack.name)]
# Check if any is installed
pack_installed = [pack for pack in cached if pack.current_state == apt_pkg.CURSTATE_INSTALLED]
# Details if there is any installed
if len(pack_installed) > 0:
        # full name, version string
        print ("installed names and version strings")
        [(pack.name, pack.current_ver.ver_str) for pack in pack_installed] 

#
# References:
# http://apt.alioth.debian.org/python-apt-doc/library/apt_pkg.html
# https://launchpad.net/python-apt/
#