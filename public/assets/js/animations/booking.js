
$(document).ready(function() {

    //initialisation var
    let selectionDate = null;
    let selectionTime = null;
    let selectionTreatments = [];

    //Initialisation du calendrier
    $("#booking-calendar").datepicker({
        minDate: 0,
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        dayNames: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samdei"],
        dayNameShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        onSelect: function(dateText, inst){
            selectionDate =$(this).datepicker("getDate");

            //Activation de l'heure
            $("#booking-time").prop("disabled", false);

            //mise a jour du recap
            updateSummary();
        }
//Fin de l'initialisation calendrier
    });


    //Chargement des soins ds le selecteur
    soins.forEach(function(soin) {
        const option = `<option value="${soin.id}">${soin.nom} - ${soin.prix} € - ${soin.duree}</option>`;
        $("#soin-select").append(option);
        });

        //Selection de l'heure 
        $("#booking-time").on("change", function() {
            selectionTime =$(this).val();

            //activation du selecteur de soin 
            $("#soin-select").prop("disabled", false);
            $("#personne-nombre").prop("disabled", false);

            //mise a jour du recap
            updateSummary();
        });

        //Gestion du bouton d'ajout de soin 
        $("#soin-select").on("change", function() {
            if ($(this).val()) {
                $("#add-soin").prop("disabled", false);
            } else {
                $("#add-soin").prop("disabled", true);
            }
        });


        //Ajouter le soin selectionner au recapitulatif
        $("#add-soin").on("click", function(){
            const treatmentId = parseInt($("#soin-select").val());
            const peopleCount= parseInt($("#personne-nombre").val());

            if (treatmentId && peopleCount >= 1 && peopleCount <= 4) {
                const soin = soins.find(t => t.id === treatmentId);

                if(soin) {
                    //Verification si ce soin est deja ajoute
                    const existingIndex = selectionTreatments.findIndex(t => t.id ===treatmentId);
                    if (existingIndex !== -1) {
                        //MAJ de la quantité
                        selectionTreatments[existingIndex].quantity = peopleCount;
                    } else {
                        //Ajouter le nouveau soin
                        selectionTreatments.push({
                            ...soin,
                        quantity: peopleCount
                        });
                    }

                    //Réinitialisrrr les champs
                    $("#soin-select").val("");
                    $("#personne-nombre").val(1);
                    $("#add-soin").prop("disabled", true);


            //MAJ du recap
            updateSummary();

            //Activation du bouton de confirmation
            $("#confirm-booking").prop("disabled", false);

                }

            }

        })


        //Supprimer un soion du recap
        $(document).on("click", ".remove-treatment", function() {
            const index =$(this).data("index");

            if (index !== undefined) {
                selectionTreatments.splice(index, 1);

                //MAJ du recap
            updateSummary();

            //Desactivation du bouton de confirmation si aucun soin n'est selectioné
            if(selectionTreatments.length ===0) {
                $("#confirm-booking").prop ("disabled", true);
                }

            }
            
        });

        //Gérer la conformation de la reservation
        
        $("#confirm-booking").on("click", function() {

            //!!!!!!A voir et adapter pour la suite si envoi d'email??

            const bookingData = {
                date: selectionDate,
                time: selectionTime,
                soins: selectionTreatments,
                comments: $("comment").val()
            };
            console.log("Données de réservation:", bookingData);
        });


        //Fonction pour MAJ le recap
        function updateSummary () {
            //MAJ date et heure
            if(selectionDate){
                const formattedDate = formatDateToFrench(selectionDate);
                let dateTimeText = formattedDate;
                if (selectionTime) {
                    dateTimeText += ` à ${selectedTime}`;
                }
                $("#recap-datetime").html(`<p>${dateTimeText}</p>`);
            }else {
                $("#recap-datetime").html(`<p class="empty-message">Aucune date selectionée</p>`);
            }

            //MAJ des soins selectionnés
            if (selectionTreatments.length > 0) {
                let treatmentsHTML = 'ul id="soin-list">';
                let totalPrice = 0;

                selectionTreatments.forEach((soin, index) => {
                    const subtotal = soin.prix * soin.quantity;
                    totalPrice += subtotal;

                    treatmentsHTML += `
                    <li>
                     <div class="soin-details">
                            ${soin.nom} 
                            <small>(${soin.quantity} ${soin.quantity > 1 ? 'personnes' : 'personne'})</small>
                        </div>
                        <div class="soin-actions">
                            <span class="soin-prix">$(subtotal)€</span>
                            <button class="remove-treatment" data-index="${index}"></button>
                        </div>
                    </li>
                    `;
                });

                treatmentsHTML += '</ul>';
                treatmentsHTML += `<div id="total-price"  class="recap-total">Total: $(totalPrice)€</div>`;

                $("#recap-soin").html(treatmentsHTML);       
            } else {
                $("#recap-soin").html(`<p class="empty-message">Aucun soin selectionné</p>`);
            }
    
        }


        //Fonction pour formater la date en français

        function formatDateToFrench(date) {
            if (!date) return '';

            const days = ["Dimanche", "Lundi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
            const months = ["janvier", "février", "Mears", "avril", "mai", "juin","juillet", "août", "septembre", "octobre", "novembre", "decembre"];
            const dayName = days[date.getDay()];
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();

            return `${dayName} ${day} ${month} ${year}`;

        }

            //FONTION pour réinitialiser le formulaire 

        function resetForm() {
            //réinitialisation variables
            selectionDate = null;
            selectionTime = null;
            selectionTreatments = [];

            //Réinitialiser l'interface 
            $("#booking-calendar").datepicker("setDate", null);
            $("#booking-time").val("").prop("disabled", true);
            $("#soin-select").val("").prop("disabled", true);
            $("#add-soin").prop("disabled", true);
            $("#confirm-booking").prop("disabled", true);
            $("#comments").val("");

            //MAJ du recap
            updateSummary();

        

        }


    });

































