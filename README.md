# esercizio1_tutorato

Utilizzando il database seguente sviluppare una pagina PHP index.php che realizzi i seguenti punti:

1.	Dare un’intestazione alla pagina e un paragrafo diviso in due colonne (come fosse un articolo scientifico per capirci, va bene un lorem ipsum)
2.	Realizzare una tabella che contenta i primi 20 record della tabella prodotti.	La colonna img deve essere un link che al click si apra in una nuova scheda.
3.	Prima della tabella login aggiungere un form che permetta di restringere la ricerca dei prodotti per nome e categoria. La ricerca per categoria deve essere un dropdown creato dinamicamente a partire dalla tabella categorie del database.
4.	Creare una pagina login.php con un form che richieda username e password. Implementare un sistema di login basato su cookies (creare anche l’opportuno metodo di logout)
5.	BONUS: Creare una pagina register.php che consenta di registrare un nuovo utente. L’username deve essere univoco e la password non deve essere salvata in chiaro (HINT: usare bcript).


Per importare il database è necessario accedere al pannello di controllo mysql, creare un database che abbiamo nome “esercizio1_tutorato” con codifica utf8_general_ci. Dopodichè nella tab import caricare il file esercizio1_tutorato.sql e in fondo alla pagina cliccare “Go”
