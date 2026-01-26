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
     */
    function generateSlots(startHour, startMin, endHour, bookedSlots = []) {
        let options = '';
        for (let h = startHour; h <= endHour; h++) {
            let mStart = (h === startHour) ? startMin : 0;
            for (let m = mStart; m < 60; m += 15) {
                // Arrêt à l'heure pile de fin (ex: 17h00)
                if (h === endHour && m > 0) break;

                // Formatage pour la valeur (09:30) et l'affichage (09h30)
                let val = `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
                let display = `${h.toString().padStart(2, '0')}h${m.toString().padStart(2, '0')}`;

                // Vérification si le créneau est dans la liste des réservations
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

                if (isWeekend) {
                    // Samedi - Dimanche : 09h30 - 17h
                    timeSelect.innerHTML += generateSlots(9, 30, 17, bookedSlots);
                } else {
                    // Lundi - Vendredi : 08h - 19h
                    timeSelect.innerHTML += generateSlots(8, 0, 19, bookedSlots);
                }
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des créneaux:', error);
                timeSelect.innerHTML = '<option value="" disabled selected>Erreur de chargement. Veuillez réessayer.</option>';
            });
    });
});
