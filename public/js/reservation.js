document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('res-date');
    const timeSelect = document.getElementById('res-time');

    if (!dateInput || !timeSelect) return;

    /**
     * Génère les balises <option> pour le select des horaires
     * @param {number} startHour - Heure de début
     * @param {number} startMin - Minutes de début
     * @param {number} endHour - Heure de fin
     * @param {Array} bookedSlots - Liste des créneaux déjà réservés (ex: ['09:30', '10:15'])
     * @param {string|null} minTime - Heure minimum autorisée (format "HH:mm") si c'est aujourd'hui
     */
    function generateSlots(startHour, startMin, endHour, bookedSlots = [], minTime = null) {
        let options = '';
        for (let h = startHour; h <= endHour; h++) {
            let mStart = (h === startHour) ? startMin : 0;
            for (let m = mStart; m < 60; m += 15) {
                // Arrêt à l'heure pile de fin (ex: 17h00)
                if (h === endHour && m > 0) break;

                // Formatage pour la valeur (09:30) et l'affichage (09h30)
                let val = `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
                let display = `${h.toString().padStart(2, '0')}h${m.toString().padStart(2, '0')}`;

                // --- NOUVEAU : Vérification si l'heure est déjà passée ---
                if (minTime && val <= minTime) {
                    continue; // On ignore ce créneau car il est déjà passé
                }

                // Vérification si le créneau est dans la liste des réservations existantes
                const isBooked = bookedSlots.includes(val);

                // Préparation des attributs si réservé
                const disabledAttr = isBooked ? 'disabled' : '';
                const styleAttr = isBooked ? 'style="color: red; font-style: italic;"' : '';
                const labelSuffix = isBooked ? ' (Complet)' : '';

                options += `<option value="${val}" ${disabledAttr} ${styleAttr}>${display}${labelSuffix}</option>`;
            }
        }
        return options;
    }

    dateInput.addEventListener('change', function() {
        const selectedDate = this.value;
        if (!selectedDate) return;

        // --- NOUVEAU : Calcul pour savoir si la date choisie est aujourd'hui ---
        const now = new Date();
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, '0');
        const dayOfMonth = now.getDate().toString().padStart(2, '0');
        const todayStr = `${year}-${month}-${dayOfMonth}`;

        let minTime = null;
        if (selectedDate === todayStr) {
            // On récupère l'heure et les minutes actuelles
            // Optionnel : ajouter 30 minutes de battement (now.getTime() + 30 * 60000)
            minTime = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
        }

        // 1. Déterminer si c'est le week-end
        const dateParts = selectedDate.split('-');
        const dateObj = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
        const day = dateObj.getDay(); // 0 = Dimanche, 6 = Samedi
        const isWeekend = (day === 0 || day === 6);

        // Message d'attente
        timeSelect.innerHTML = '<option value="" disabled selected>Chargement des disponibilités...</option>';

        // 2. Appeler l'API pour récupérer les créneaux déjà pris pour cette date
        fetch(`/api/booked-slots?date=${selectedDate}`)
            .then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            })
            .then(bookedSlots => {
                // Réinitialiser le menu
                timeSelect.innerHTML = '<option value="" disabled selected>Choisissez un créneau</option>';

                let slotsHtml = '';
                if (isWeekend) {
                    // Samedi - Dimanche : 09h30 - 17h
                    slotsHtml = generateSlots(9, 30, 17, bookedSlots, minTime);
                } else {
                    // Lundi - Vendredi : 08h - 19h
                    slotsHtml = generateSlots(8, 0, 19, bookedSlots, minTime);
                }

                if (slotsHtml === '') {
                    timeSelect.innerHTML = '<option value="" disabled selected>Plus de créneaux disponibles pour aujourd\'hui</option>';
                } else {
                    timeSelect.innerHTML += slotsHtml;
                }
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des créneaux:', error);
                timeSelect.innerHTML = '<option value="" disabled selected>Erreur de chargement. Veuillez réessayer.</option>';
            });
    });
});
