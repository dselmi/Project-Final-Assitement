@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
<style>
    body {
  display: flex;
  margin-top: 50px;
  justify-content: center;
  background-color: #FFFCFF;
}
button {
  cursor: pointer;
  box-shadow: 0px 0px 2px gray;
  border: none;
  outline: none;
  padding: 5px;
  border-radius: 5px;
  color: white;
}

#header {
  padding: 10px;
  color: #d36c6c;
  font-size: 26px;
  font-family: sans-serif;
  display: flex;
  justify-content: space-between;
}

#container {
  width: 770px;
}
#weekdays {
  width: 100%;
  display: flex;
  color: #247BA0;
  text-align: center;
  border: 1px solid #e0e0e0;
}
#weekdays div {
  width: 14.3%;
  padding: 0px;
}
#calendar {
  width: 100%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
}
.day {
  width: 13.28%;
  padding: 10px;
  height: 100px;
  cursor: pointer;
  box-sizing: border-box;
  background-color: white;
  margin: 5px;
  box-shadow: 0px 0px 3px #CBD4C2;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.day:hover {
  background-color: #e8faed;
}

.day + #currentDay {
  background-color:#e8f4fa;
}
.event {
  font-size: 10px;
  padding: 3px;
  background-color: #58bae4;
  color: white;
  border-radius: 5px;
  max-height: 55px;
  overflow: hidden;
}
.padding {
  cursor: default !important;
  background-color: #FFFCFF !important;
  box-shadow: none !important;
}
#newEventModal, #deleteEventModal {
  display: none;
  z-index: 20;
  padding: 25px;
  background-color: #e8f4fa;
  box-shadow: 0px 0px 3px black;
  border-radius: 5px;
  width: 350px;
  top: 100px;
  left: calc(50% - 175px);
  position: absolute;
  font-family: sans-serif;
}
#eventTitleInput {
  padding: 10px;
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 25px;
  border-radius: 3px;
  outline: none;
  border: none;
  box-shadow: 0px 0px 3px gray;
}
#eventTitleInput.error {
  border: 2px solid red;
}
#cancelButton, #deleteButton {
  background-color: #d36c6c;
}
#saveButton, #closeButton {
  background-color: #92a1d1;
}
#eventText {
  font-size: 14px;
}
#modalBackDrop {
  display: none;
  top: 0px;
  left: 0px;
  z-index: 10;
  width: 100vw;
  height: 100vh;
  position: absolute;
  background-color: rgba(0,0,0,0.8);
}
</style>
<div class="content header-title-content" style="margin-top: -20px;">
    <div class="block-content block-content-full ">
    <div id="calendar-container">
      <div id="header">
        <div id="monthDisplay"></div>
        <div>
          <button type="button" class="btn btn-sm btn-outline-primary" id="backButton" style="width: 150px">Précédent</button>
          <button type="button" class="btn btn-sm btn-outline-primary"id="nextButton" style="width: 150px">Suivant</button>
        </div>
      </div>

      <div id="weekdays">
        <div>Dimanche</div>
        <div>Lundi</div>
        <div>Mardi</div>
        <div>Mercredi</div>
        <div>Jeudi</div>
        <div>Vendredi</div>
        <div>Samedi</div>
      </div>

      <div id="calendar"></div>
    </div>

    <div id="newEventModal">
      <h2>Nouveau RDV</h2>

      <input id="eventTitleInput" placeholder="Event Title" />

      <button id="saveButton">Enregistrer</button>
      <button id="cancelButton">Annuler</button>
    </div>

    <div id="deleteEventModal">
      <h2>RDV</h2>

      <p id="eventText"></p>

      <button id="deleteButton">Supprimer</button>
      <button id="closeButton">Annuler</button>
    </div>
    </div>
    </div>

    <div id="modalBackDrop"></div>
    @endsection
    @push('js_after')
    <script>
        let nav = 0;
        let clicked = null;
        let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

        const calendar = document.getElementById('calendar');
        const newEventModal = document.getElementById('newEventModal');
        const deleteEventModal = document.getElementById('deleteEventModal');
        const backDrop = document.getElementById('modalBackDrop');
        const eventTitleInput = document.getElementById('eventTitleInput');
        const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        function openModal(date) {
        clicked = date;

        const eventForDay = events.find(e => e.date === clicked);

        if (eventForDay) {
            document.getElementById('eventText').innerText = eventForDay.title;
            deleteEventModal.style.display = 'block';
        } else {
            newEventModal.style.display = 'block';
        }

        backDrop.style.display = 'block';
        }

        function load() {
        const dt = new Date();

        if (nav !== 0) {
            dt.setMonth(new Date().getMonth() + nav);
        }

        const day = dt.getDate();
        const month = dt.getMonth();
        const year = dt.getFullYear();

        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
            weekday: 'long',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
        });
        const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

        document.getElementById('monthDisplay').innerText =
            `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

        calendar.innerHTML = '';

        for(let i = 1; i <= paddingDays + daysInMonth; i++) {
            const daySquare = document.createElement('div');
            daySquare.classList.add('day');

            const dayString = `${month + 1}/${i - paddingDays}/${year}`;

            if (i > paddingDays) {
            daySquare.innerText = i - paddingDays;
            const eventForDay = events.find(e => e.date === dayString);

            if (i - paddingDays === day && nav === 0) {
                daySquare.id = 'currentDay';
            }

            if (eventForDay) {
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('event');
                eventDiv.innerText = eventForDay.title;
                daySquare.appendChild(eventDiv);
            }

            daySquare.addEventListener('click', () => openModal(dayString));
            } else {
            daySquare.classList.add('padding');
            }

            calendar.appendChild(daySquare);
        }
        }

        function closeModal() {
        eventTitleInput.classList.remove('error');
        newEventModal.style.display = 'none';
        deleteEventModal.style.display = 'none';
        backDrop.style.display = 'none';
        eventTitleInput.value = '';
        clicked = null;
        load();
        }

        function saveEvent() {
        if (eventTitleInput.value) {
            eventTitleInput.classList.remove('error');

            events.push({
            date: clicked,
            title: eventTitleInput.value,
            });

            localStorage.setItem('events', JSON.stringify(events));
            closeModal();
        } else {
            eventTitleInput.classList.add('error');
        }
        }

        function deleteEvent() {
        events = events.filter(e => e.date !== clicked);
        localStorage.setItem('events', JSON.stringify(events));
        closeModal();
        }

        function initButtons() {
        document.getElementById('nextButton').addEventListener('click', () => {
            nav++;
            load();
        });

        document.getElementById('backButton').addEventListener('click', () => {
            nav--;
            load();
        });

        document.getElementById('saveButton').addEventListener('click', saveEvent);
        document.getElementById('cancelButton').addEventListener('click', closeModal);
        document.getElementById('deleteButton').addEventListener('click', deleteEvent);
        document.getElementById('closeButton').addEventListener('click', closeModal);
        }

        initButtons();
        load();
</script>
@endpush


