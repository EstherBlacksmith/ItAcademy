SELECT sum(numReproduccio) FROM reproducions;

SELECT cancons.titol as 'Cançó', reproducions.numReproduccio as 'Reproduccions'  FROM reproducions 
join cancons on reproducions.cancons_idcancons = cancons.idcancons
order BY reproducions.numReproduccio desc;

SELECT DISTINCT usuaris.nom as 'Usuari' , playlist.titol as 'Playlist', cancons.titol as 'Cançó' 
FROM usuaris, llistareproduccio , cancons, playlist
where llistareproduccio.idcancons = cancons.idcancons
and playlist.idPlaylist = llistareproduccio.idPlaylist
and usuaris.idusuaris = playlist.idusuariCrea ;