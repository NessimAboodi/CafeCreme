document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('res-date');
    const timeSelect = document.getElementById('res-time');

    if (!dateInput || !timeSelect) return;

    // Fonction pour générer les options
    function generateSlots(startHour, startMin, endHour) {
        let options = '';
        for (let h = startHour; h <= endHour; h++) {
            let mStart = (h === startHour) ? startMin : 0;
            for (let m = mStart; m < 60; m += 15) {
                if (h === endHour && m > 0) break; // Arrêt à l'heure pile de fin

                let val = `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
                let display = `${h.toString().padStart(2, '0')}h${m.toString().padStart(2, '0')}`;
                options += `<option value="${val}">${display}</option>`;
            }
        }
        return options;
    }

    dateInput.addEventListener('change', function() {
        // Déterminer si c'est le week-end
        const dateParts = this.value.split('-');
        const selectedDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
        const day = selectedDate.getDay();
        const isWeekend = (day === 0 || day === 6);

        timeSelect.innerHTML = '<option value="" disabled selected>Choisissez un créneau</option>';

        if (isWeekend) {
            // Samedi - Dimanche : 09h30 - 17h
            timeSelect.innerHTML += generateSlots(9, 30, 17);
        } else {
            // Lundi - Vendredi : 08h - 19h
            timeSelect.innerHTML += generateSlots(8, 0, 19);
        }
    });
});
