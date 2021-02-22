SELECT titol, descripcio FROM videos WHERE MATCH(titol, descripcio) AGAINST ("gat");

SELECT titol, descripcio FROM videos WHERE MATCH(titol, descripcio) AGAINST ("%menja%");

SELECT usuaris.nom as 'Usuari', videos.titol as 'Video', reproduccions.numero as 'Reproduccions totals',  if(reaccions.`like/dislike`, 'Dislike', 'Like') as 'Reaccions' FROM reproduccions 
left outer  join reaccions on reaccions.Videos_idVideos = reproduccions.Videos_idVideos 
RIGHT outer  join videos on videos.idVideos = reaccions.Videos_idVideos
left outer  join usuaris on usuaris.idUsuari = reaccions.Usuaris_idUsuari
WHERE reproduccions.numero > 20
order by usuaris.nom;

SELECT usuaris.email as 'Usuari',canal.nom  as 'Canal' FROM   usuaris 
left outer join usuaris_suscribeix_canal on usuaris_suscribeix_canal.Usuaris_idUsuari =usuaris.idUsuari
JOIN canal on canal.idcanal = usuaris_suscribeix_canal.canal_idcanal;