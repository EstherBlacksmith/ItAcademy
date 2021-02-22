CREATE VIEW vistaClientes AS SELECT * FROM dadespersonals WHERE dadespersonals.tipus = 'client';

select concat(DadesT.nom," ",DadesT.primerCognom) as 'Treballador', concat(DadesC.nom," ",DadesC.primerCognom) as 'Client', ulleres.tipusMontura from dadespersonals as DadesT 
RIGHT outer join treballador_a_client on treballador_a_client.dadesPersonals_iddadesPersonals = DadesT.iddadesPersonals
LEFT outer join dadespersonals as DadesC  on (DadesC.iddadesPersonals = treballador_a_client.dadesPersonals_iddadesPersonals1)
LEFT outer join ulleres on treballador_a_client.idUlleres = ulleres.idulleres ;

SELECT sum(ulleres.preu) FROM ulleres,treballador_a_client where ulleres.idulleres = treballador_a_client.idUlleres and ulleres.colorE = 'sense';