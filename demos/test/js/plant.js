var plant_interval = null;
function plantGrowth(){
    var status = document.getElementById('list-status');
    status.innerHTML = "Plant growth started...";
    plant_interval = setInterval(function(){
        axios.get(base_url+'plant/plantGrowth').then(function (response) {
        // handle success
            console.log(response.data);
            var plants_list = document.getElementById('plants-list');
            plants_list.innerHTML = response.data.html;
        })
        .catch(function (error) {
        // handle error
        console.log(error);
        })
    },1000*60)
}

function plantGrowthStop(){
    var status = document.getElementById('list-status');
    status.innerHTML = "Plant growth stopped!";
    clearInterval(plant_interval);
    plant_interval = null;
}