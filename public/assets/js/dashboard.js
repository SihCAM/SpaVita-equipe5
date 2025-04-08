
document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    loadPlanning();
});


function initCharts() {

//On utilise methode promiseAll pour faire Appel aux 2API en parallèle (deux fichiers json)
Promise.all([
    fetch('public/api/dashboardData.php').then(res => res.json()),//Pour les soins
    fetch('public/api/getSessionsByDay.php').then(res => res.json()),//pour les séances
])
    
    .then(([dashboardData, sessionsData]) => {

        //LOG pour verifier les données reçues
        console.log("Soins :", dashboardData.statsSoins);
        console.log("Sessions :", sessionsData);
        //Mettre a jour les stats dans le DOM 
        document.getElementById('rdvAujourdhui').textContent = dashboardData.rdvAujourdhui;
        document.getElementById('clientsSemaine').textContent = dashboardData.clientsSemaine;
        document.getElementById('tauxOccupation').textContent = dashboardData.tauxOccupation + '%';

        //Simulation : données fictives si aucune reservation (test sans la BDD)
        if(Object.keys(dashboardData.statsSoins).length === 0) {
            dashboardData.statsSoins = {
                "Massage": 20,
                "Soin Visage": 30,
                "Soin corps": 15,
                "Hammam": 9
            };
        }
        if(Object.keys(sessionsData).length === 0) {
            sessionsData = {
                "Lundi": 15,
                "Mardi": 3,
                "Mercredi": 12,
                "Jeudi": 10,
                "Vendredi": 10,
                "Samedi": 20,
                "Dimanche": 25
            };
        }

        //Donut chart pour les types de soins
        const servicesCtx = document.getElementById('servicesChart').getContext('2d');
        new Chart(servicesCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(dashboardData.statsSoins),
                datasets: [{
                    data: Object.values(dashboardData.statsSoins),
                    backgroundColor: [
                        '#d4af37', '#A9927D', '#22333B', '#5E503F', '#92817A'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {position: 'right' },
                    title: {
                        display: true,
                        text: 'Répartition des soins'
                    }
                }
            }
        });

        //Bar chart : Sessios par jour
        const sessionsCtx = document.getElementById('sessionsChart').getContext('2d');
        console.log("Valeurs du graphique barres :", Object.values(sessionsData));
        new Chart(sessionsCtx, {
            type: 'bar',
            data: {
                labels: Object.keys(sessionsData),
                datasets: [{
                    label: 'Nombre de séances',
                    data: Object.values(sessionsData),
                    backgroundColor: '#d4af37', 
                    borderColor: '#d4af37',
                    borderWidth: 1     
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 100,
                        ticks: { stepSize: 5}
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Nombre de séances par jour'
                    }
                }
            }
        });
    })
    .catch(error =>{
        console.error("Erreur lors du chargement des données du dashboard: ", error);
    });

}


//Planning praticiens
function loadPlanning() {

        fetch('public/api/getPraticiensPlanning.php')
        .then(res => {
            console.log(`Statut de al réponse : ${res.status}`);
            return res.json();
        })
            

        .then(planning => {
            const container = document.getElementById('schedule-timeline');
            container.innerHTML = ''; //Vide au depart

            const joursOrdre = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

            joursOrdre.forEach(jour => {
                const column = document.createElement('div');
                column.classList.add('schedule-day-column');

                //const titre = document.createElement('h4');
                //titre.textContent = jour;
                //column.appendChild(titre);

                if(planning[jour]) {
                    planning[jour].forEach(item => {
                        const div = document.createElement('div');
                        div.classList.add('planning-item');
                        div.textContent = item;
                        column.appendChild(div);
                    });
                }
                container.appendChild(column);
            });
        })

        .catch(error => {
            console.error("Erreur lors de la récupéraitn du planning des praticiens :", error);

        });
       
    }





