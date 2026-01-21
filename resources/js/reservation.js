document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('res-date');
    const timeInput = document.getElementById('res-time');

    if (dateInput && timeInput) {
        function updateTimeLimits() {
            if (!dateInput.value) return;

            const date = new Date(dateInput.value);
            const day = date.getDay(); // 0 = Dimanche, 6 = Samedi

            let min, max;
            if (day === 0 || day === 6) { // Week-end
                min = "09:30";
                max = "17:00";
            } else { // Semaine
                min = "08:00";
                max = "19:00";
            }

            timeInput.min = min;
            timeInput.max = max;

            // Si une heure est déjà choisie et devient invalide par rapport au nouveau jour
            if (timeInput.value) {
                if (timeInput.value < min || timeInput.value > max) {
                    timeInput.value = "";
                    alert("Les horaires pour ce jour sont : " + min + " - " + max);
                }
            }
        }

        dateInput.addEventListener('change', updateTimeLimits);
    }
});
