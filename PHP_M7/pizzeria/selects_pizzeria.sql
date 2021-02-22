SELECT *
FROM comandalinies
INNER JOIN comanda
ON comandalinies.idComanda=comanda.idComanda;

SELECT count(comandalinies.idComandaLinies)
FROM comandalinies
INNER JOIN comanda
ON comandalinies.idComanda=comanda.idComanda;


SELECT count(Treballador.idTreballador)
FROM Treballador
INNER JOIN botiga;

SELECT DISTINCT producte.nom, producte.Tipus, producte.preu FROM pizza,hamburguesa,beguda join producte 
ORDER BY producte.tipus, producte.preu desc;

SELECT concat (client.nom, " ", client.CognomPrimer) as 'Client',comanda.Domicili as 'Tipus de servei',  upper(concat(producte.Tipus, "  ",  producte.nom) ) as 'Tipus producte',  producte.nom, (comandalinies.Quantitat * producte.preu) as 'PVP Total' from comanda 
RIGHT outer join comandalinies on comanda.idcomanda = comandalinies.idComanda
RIGHT outer join client on comanda.idClient = client.idClient
RIGHT outer join producte on producte.idProducte = comandalinies.idProducte
WHERE comanda.idComanda > 0;