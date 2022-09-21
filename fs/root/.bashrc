# ~/.bashrc: executed by bash(1) for non-login shells.

# Note: PS1 and umask are already set in /etc/profile. You should not
# need this unless you want different defaults for root.
# PS1='${debian_chroot:+($debian_chroot)}\h:\w\$ '
# umask 022

SITE="nivenly.com"
echo "Starting ${SITE}) [cron]..."
cron
echo "Correcting www-data permissions ${SITE}) [apache]..."
chown -v -R www-data /var/www
