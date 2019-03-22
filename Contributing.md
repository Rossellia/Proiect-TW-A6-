## Cum sa contribui
Pentru a contribui, un colaborator trebuie sa aiba acces la repository-ul de la urmatorul link: https://github.com/Rossellia/Proiect-TW-A6- . Apoi acesta poate face un fork cu ajutorul butonului cu acelasi nume, buton din partea dreapta,sus, a paginii.

## Adaugarea fisierelor
Pentru a adauga fisiere va puteti folosi de butoanele “Create new file” sau “Upload files”. Pentru a face un folder,apasati “Create new file”. La nume trebuie sa scrieti “Numele_folder/” si este obligatoriu sa creati un fisier nou. Apoi puteti fara probleme sa adaugati fisierele dorite in folder.

## Pentru lucrul cu GitBash
1.	Alegeti un folder usor de gasit, de exemplu pe desktop. Ar fi de preferat ca directorul in care vreti sa descarcati continutul de pe GitHub sa fie gol. Schimbati-va in acel folder.

       $cd path_folder/nume_folder

2.	Faceti o copie a continutului repository-ului. 

$git clone https://github.com/Rossellia/Proiect-TW-A6-.git
3.	Schimbati-va astfel incat sa fiti in acel folder.
cd Proiect-TW-A6-
4.	Asigurati-va ca datele pe care le-ati descarcat sunt la zi si nu trebuie sa le redownloadati.

 $ git remote add upstream https://github.com/Rossellia/Proiect-TW-A6-.git
 $ git checkout master
 $ git pull upstream master
 $ git push origin master

5.	Adaugati-va propriul branch.

git checkout -b nume_folder/nume_branch

6.Dupa ce terminati de lucrat nu uitati sa adaugati propriul branch pe GitHub.
