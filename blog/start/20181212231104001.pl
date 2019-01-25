rodzic(kasia,robert).
rodzic(tomek,robert).
rodzic(tomek,eliza).
rodzic(robert,anna).
rodzic(robert,magda).
rodzic(magda,jan).
 
kobieta(kasia).
kobieta(eliza).
kobieta(magda).
kobieta(anna).
 
mezczyzna(tomek).
mezczyzna(robert).
mezczyzna(jan).

matka(X,Y) :-
	rodzic(X,Y),
	kobieta(X).
 
ojciec(X,Y) :-
	rodzic(X,Y),
	mezczyzna(X).

brat(X,Y):-
	rodzic(Z,X),
	rodzic(Z,Y),
	mezczyzna(X),
	X \= Y.

siostra(X,Y):-
	rodzic(Z,X),
	rodzic(Z,Y),
	kobieta(X),
	X \= Y.

babcia(X,Y) :-
	rodzic(X,C),
	rodzic(C,Y),
	kobieta(X).

dziadek(X,Y) :-
	rodzic(X,C),
	rodzic(C,Y),
	mezczyzna(X).
	
przodek(X,Y) :-
	rodzic(X,Y).
 
przodek(X,Z) :-
	rodzic(X,Y),
	przodek(Y,Z).

potomek(X,Y) :-
	przodek(Y,X).

krewny(X,Y):-
	przodek(C,X),
	przodek(C,Y),
	X \= Y.
krewny(X,Y):-
	przodek(X,Y).

czlowiek(X) :-
	mezczyzna(X).
czlowiek(X) :-
	kobieta(X).



