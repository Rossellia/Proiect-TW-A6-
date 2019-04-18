# Proiect-TW-A6-
Realizat de:Bucnaru Raluca,
            Tulbure Lucia,
            Bardita Larisa B5

## Descrierea proiectului

Aplicatia numita TeaSk se doreste a le oferi utilizatorilor posibilitatea de a-si imbunatati competentele in diferite limbaje de 
programare prin participarea la anumite evenimente.Aceste evenimente vor fi recomandate pe baza unui sistem, fie bazat pe tehnici de 
machine learning, fie printr-un anumit algoritm.

TeaSk va avea integrate unele servicii de pe site-uri precum GitHub sau LinkedIn pentru a stabili nivelul la care se afla utilizatorul. De 
asemenea, el va avea posibilitatea de a rezolva anumite teste pentru a i se stabili nivelul la care se afla pentru un anumit limbaj de 
programare. In plus,vor exista statistici pe baza la evolutia utilizatorului.

## Rolul fiecarui utilizator

1.Utilizatorii neinregistrati sau nelogati pot vizualiza pagina principala de dinainte de login, pagina in care i se ofera posibilitatea 
de a se autentifica, un link pentru inregistrare, sau sa vada anumite evenimente. Cum utilizatorului nu i se cunoaste nivelul pentru 
anumite limbaje de programare, evenimentele afisate vor fi aleatorii.

2.Utilizatorii ce doresc sa se inregistreze pot intra pe pagina de register unde vor trebui sa introduca adresa de e-mail,un nume de 
utilizator si o parola. De asemenea, acestia pot bifa ce limbaje de programare stiu.

3. Utilizatorii autentificati vor fi trimisi la o alta pagina principala ce va contine diferite butoane. Aceste butoane, la apasarea 
lor, vor duce la alte pagini,precum pagina de evenimente, pagina in care utilizatorul poate raspunde la anumite teste, et cetera.

### Tehnologii

Cel mai probabil se va lucra in PHP si Javascript.Urmeaza de a ne decide pe tehnologiile ce dorim a le folosi pentru a finaliza aces 
proiect.

### Baza de date

Se vor folosi baze de date pentru a stoca informatiile utilizatorilor precum parola, e-mail, limbajele de programare cunoscute, nivelul 
pentru fiecare limbaj si asa mai departe.

### Frontend 

Tehnologiile folosite sunt:
1. HTML5 (Hyper Text Markup Language) pentru a defini structura paginilor Web
2. CSS3 (Cascading Style Sheets) pentru infrumusetarea paginilor
3. Probabil se vor folosi si Javascript si PHP, insa momentan s-a lucrat in principal in HTML si CSS.

## Interactiunea clientului cu serverul

Initial clientul nu este autentificat sau inregistrat si poate vizualiza o lista de evenimente, ori poate alege sa se logheze sau 
inregistreze. Dupa ce se autentifica pagina principala se schimba intr-o pagina cu butoane.Acestea sunt Teach,Events,Activities,Skills, 
Knowledge.

### Teach

Utilizatorul poate adauga intrebari in diferite domenii, insa aceste domenii trebuie sa tina de limbaje de programare precum C/C++,Java, 
Rust, etc.

### Events

Utilizatorul poate vizualiza o lista de evenimente pe baza limbajelor de programare stiute si nivelul la care este acesta.

### Activities

Aceasta este pagina care interactioneaza cu GitHub si repo-urile de pe GitHub.

### Skills

Aceasta pagina web ii testeaza "skill-urile" utilizatorului printr-un formular cu intrebari cu un singur raspuns corect. Prin acesta 
exista o sa sansa ca utilizatorul sa treaca la urmatorul nivel.

### Knowledge

In aceasta pagina utilizatorul poate viziona evenimentele la care a participat, poate adauga link-uri de evenimente si poate da feedback 
la anumite evenimente.
