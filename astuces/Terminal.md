# Terminal

## Sous Linux

`cd /dossierOùOnVeutAller` nous déplace vers le dossier où l'on veut se rentre (on peut enchainer les dossiers: ./dossierParent/DossierEnfant)

`ls` liste les dossiers présent à l'endroit où vous effectuez le ls.

`mkdir`

`rmdir`


`cat nom_ficher.md` oeret de lire le contenu d'un fichier Markdown

faire une recherche d'une chaine de caractère précise dans un fichier Markdown :

`cat nom_ficher.md | grep 'Chaine recherchée'` : recherche sensible à la casse (majuscule/minuscule)
`cat nom_ficher.md | grep -i 'Chaine recherchée'` : recherche insensible à la casse

### Git

documentations : https://git-scm.com/doc

#### Récupérer un repo

`git clone lienDuRepoACloner`

#### Ajouter et récupérer du contenu sur un repo existant

`git add .` ou `git add cheminDuDossier` ajoute le travail effectué dans un carton que l'on garde sur notre machine

`git commit -m "descriptionDuCommit` nomme le carton où l'on a mis notre travail en le gardant stocké sur notre machine

`git push` envoie le travail que l'on a mis en carton et qu'on a annoté sur github.

`git pull` récupère sur github tous ce qui a été ajouté (sur la branche où l'on se trouve ? A confirmer)

#### Les branch

`git branch -a` Nous montre les branches ainsi que celle où nous nous trouvons. la branche courante sera annoté d'une `*`

`git branch nomBranch` crée une nouvelle branch avec le nom souhaité sur la branche où vous étiez. Elle reprendra le code de cette dernière

`git checkout -b "nomBranch"` crée une branch et nous déplace dans cette dernière

`git checkout "nomBranchOùOnVeutAller"` Nous enmène dans la branch que l'on a cité
