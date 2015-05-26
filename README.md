# website
Wordpress Project of Yogavihar Webpage

#mit github Account verbinden (vorher in ssh Key unter .ssh und github abgelegt)
git remote add origin git@github-yv:yogavihar/website.git

# vor den Änderungen
git pull

# Vorgehen
(ins Verzeichnis Work/www/yv wechseln)
git status
git add *
git status
git commit -m "Commitmessage"
git pull (macht merge)
git push oder git push origin master


# Wichtige Git-Befehle
git init

git add README.md

git commit -m "first commit"

git remote add origin https://github.com/yogavihar/website.git

git push -u origin master

…or push an existing repository from the command line

git remote add origin https://github.com/yogavihar/website.git

git push -u origin master

…or import code from another repository
