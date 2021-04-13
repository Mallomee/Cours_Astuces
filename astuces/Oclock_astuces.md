# Astuces pour ceux d' O'clock

## PairProgramming

Pour accéder au lan de ton partenaire de code, ce dernier doit aller dans son navigateur et taper dans sa barre de l'URL `vpn.lan`. Cela l'enverra sur une page où il pourra copier le lien pour accéder à sa VM. Il lui suffit ensuite de vous le donner pour vous permettre d'accéder à ce dernier.

**Note** Si vous codez en équipe, pensez à sauvagarder avant chaque vérification de votre page internet pour voir les modifications que vous avez effectué.

Avec **VSC** Les liveshare sont aussi un bon moyen de coder en équipe. Vous pouvez suivre votre partenaire via l'onglet liveshare et en faisant un clic droit sur lui et sélectionner `suivre ce participant`. Cette commande est aussi possible via l'icône d'une punaise en haut à droite de VSC dans laquelle il faudra mettre le nom de la personne que vous souhaitez suivre.

## Récupérer les exercices vierges

- Ouvrir le dossier sur **VSC**
- lancer la console et effectuer un `git log`
- copier le hach du commit initial (ça correspondra à `d3585a1e43a386416b4d3f15d8870afd713f8547` dans l'exemple ci-dessous)

```bash
commit d3585a1e43a386416b4d3f15d8870afd713f8547
Author: Christophe Deneuve <33314621+christopheOclock@users.noreply.github.com>
Date:   Fri Mar 12 18:03:35 2021 +0100

    Initial commit
```

- effectuer un `git branch NomDeLaBranchOùOnLeMet HachDuCommitInitial`
- faire un `git stash` qui garde vos corrections sur la branch master mais qui vous permet d'aller ensuite sur la branch où vous avez mis les exercices vierges.

Pensez à recréer une branch si vous souhaitez refaire des commits de vos exercices pour éviter d'effectuer à chaque fois cette manipulation. 