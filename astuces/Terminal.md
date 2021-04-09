# Terminal

## Sous Linux

`pwd` vous affiche où vous vous trouvez (répertoire/dossier où vous êtes)

`cd ./dossierOùOnVeutAller` vous déplace vers le dossier où vous voulez vous rendre (on peut enchainer les dossiers: ./dossierParent/DossierEnfant). A savoir que `cd ..` vous fera revenir au dossier parent de celui où vous êtes.

`ls` liste les dossiers présent à l'endroit où vous effectuez le ls.`ls -a` permet d'afficher les dossiers cachés et `ls -l` permet d'afficher les dossiers sous forme de liste.

`mkdir NameNewDossier` crée un dossier. Vous pouvez aussi créer un dossier via un chemin. Exemple `mkdir ./chemin/MonNouveauDossier` ira créer un nouvau dossier dans le dossier enfant 'chemin' de celui où nous sommes (le `.` indiquant que c'est le dossier où nous nous trouvons)

`rmdir NameNewDossier` supprime un dossier **vide**.

`cat nom_ficher.md` permet de lire le contenu d'un fichier Markdown

faire une recherche d'une chaine de caractère précise dans un fichier Markdown :

- `cat nom_ficher.md | grep 'Chaine recherchée'` : recherche sensible à la casse (majuscule/minuscule)
- `cat nom_ficher.md | grep -i 'Chaine recherchée'` : recherche insensible à la casse

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

`git log` permet de voir la liste des différents commits effectuée sur la branche où nous sommes (s'il y a beaucoup de résultat, on peut se déplacer avec les flèches *up* et *down* et quitter cette navigation avec *Q*)

`git log --grep 'chaine recherchée'` permet de lsiter les commit contenant une chaine précise

`git log --author 'auteur recherché'` permet de lsiter les commit contenant un autheur précis

`git checkout <hash-commit>` permettra d'accéder aux fichier de ce commit. Il faut récupérer le hash correspondant et le mettre comme suit :
`git checkout 5657d3372ca31aadb3da1d99c798833718493b04`
On peut aussi juste écrire les premier caractères de 'lidentifiant(hash) du commit `git checkout 5657d3`