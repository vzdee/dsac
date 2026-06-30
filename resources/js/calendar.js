import { Calendar } from '@fullcalendar/core';

import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import listPlugin from '@fullcalendar/list';

document.addEventListener('livewire:navigated', () => {

    const calendarEl = document.getElementById('calendar');

    if (!calendarEl) return;

    const calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            timeGridPlugin,
            interactionPlugin,
            listPlugin,
        ],

        locale: 'es',

        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            list: 'Agenda',
        },

        initialView: 'dayGridMonth',

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listWeek'
        },

        // Aquí le decimos a FullCalendar que obtenga las citas desde nuestra nueva ruta
        events: '/api/mis-citas',

    });

    calendar.render();

});