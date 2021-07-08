
<script>

function login(){
    email =  document.getElementById("email").value;
    password = document.getElementById("password").value;    

    axios({
        method: 'post',
        url: 'login',
        data: {
            email: email,
            password:password
        }
    })
    .then(response => {
      // Obtenemos los datos
      console.log(response.data);
      localStorage.setItem("token", response.data.token);    
     
      localStorage.user_id =   response.data.id;
 
      document.getElementById("email").style.display = 'none'; 
      document.getElementById("password").style.display = 'none';
      document.getElementById("emailTitle").style.display = 'none'; 
      document.getElementById("passwordTitle").style.display = 'none';
      document.getElementById("loginButton").style.display = 'none';

    })
    .catch(e => {      
      console.log(e);
      // Capturamos los errores
    });
}

function logout(){
    
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };
    
    axios({
        method: 'get',
        url: '/api/logout'
    })   
    .then(response => {
        // Obtenemos los datos  
        console.log(response.data.message);   
        document.getElementById("tittle").innerHTML ="Logout!";
    })
    .catch(e => {
        console.log(e);
        // Capturamos los errores
    })

}
/*
function play(){ 
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };
    axios({
        method: 'get',
        url: '/api/players/games',
    })
    .then(response => {
        // Obtenemos los datos
        console.log(response.data);
        document.getElementById("tittle").value = "Play!"; 
        document.getElementById("shakeButton").style.display = 'block';

    })
    .catch(e => {      
        console.log(e);
        // Capturamos los errores
    });
}*/

function Shake(){
   
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };
    id =  localStorage.user_id;
    axios({
        method: 'post',
        url: '/api/players/'+ id + '/games'
    })   
    .then(response => {
        // Obtenemos los datos     
        d_1 = JSON.stringify(response.data.d_1);
        d_2 = JSON.stringify(response.data.d_2);    
      
        document.getElementById("score").innerHTML = "Dice one: " + d_1 + ". Dice two: " + d_2;
        document.getElementById("tittle").innerHTML ="Score!";
    })
    .catch(e => {
        console.log(e);
        // Capturamos los errores
    })
    
}

function Delete(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'delete',
        url: '/api/players/'+ id + '/games'
    })   
    .then(response => {
        // Obtenemos los datos     
        deleted = (JSON.stringify(response.data.deleted));
        document.getElementById("score").innerHTML = deleted;
        document.getElementById("tittle").innerHTML ="Deleted!";
    })
    .catch(e => {
        console.log(e);
        // Capturamos los errores
    })
}

function PlayersList(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'get',
        url: '/api/players/'
    })   
    .then(response => {
        // Obtenemos los datos     
        score = (JSON.stringify(response.data.score));
        document.getElementById("score").innerHTML =score;
        document.getElementById("tittle").innerHTML ="Score!";
    })
    .catch(e => {
        console.log(e);  
        // Capturamos los errores
    })
}

/*/players/{id}/games*/
function myGames(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'get',
        url:  '/api/players/'+ id + '/games'
    })   
    .then(response => {
        // Obtenemos los datos     
        games = (JSON.stringify(response.data.games));
        document.getElementById("score").innerHTML =games;
        document.getElementById("tittle").innerHTML ="My games!";
    })
    .catch(e => {
        console.log(e);  
        // Capturamos los errores
    })

}

function ranking(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'get',
        url: '/api/players/ranking'
    })   
    .then(response => {
        // Obtenemos los datos     
        ranking = (JSON.stringify(response.data.score));
        document.getElementById("score").innerHTML =ranking;
        document.getElementById("tittle").innerHTML ="Ranking!";
    })
    .catch(e => {
        console.log(e);  
        // Capturamos los errores
    })
}


function loser(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'get',
        url: '/api/players/loser'
    })   
    .then(response => {
        // Obtenemos los datos      
        worstPlayer = (JSON.stringify(response.data.worstPlayer));
        totalScore = (JSON.stringify(response.data.totalScore));
        
        document.getElementById("score").innerHTML = worstPlayer + "-> " + totalScore;
        document.getElementById("tittle").innerHTML ="Loser!";
    })
    .catch(e => {
        console.log(e);  
        // Capturamos los errores
    })
}

function winner(){
    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
      'Content-Type': 'text/plain;charset=utf-8',
    };

    id =  localStorage.user_id;

    axios({
        method: 'get',
        url: '/api/players/winner'
    })   
    .then(response => {
        // Obtenemos los datos      
        bestPlayer = (JSON.stringify(response.data.bestPlayer));
        totalScore = (JSON.stringify(response.data.totalScore));
        
        document.getElementById("score").innerHTML = bestPlayer + "-> " + totalScore;
        document.getElementById("tittle").innerHTML ="Winner!";
    })
    .catch(e => {
        console.log(e);  
        // Capturamos los errores
    })
}



</script>