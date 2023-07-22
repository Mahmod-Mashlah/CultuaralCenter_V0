import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from '/public/assets/plugins/sweetalert2/sweetalert2.all';
import Swal from '/public/assets/plugins/sweetalert2/sweetalert2.all.min';
import Swal from '/public/assets/plugins/sweetalert2/sweetalert2';
import Swal from '/public/assets/plugins/sweetalert2/sweetalert2.min';

window.Swal = Swal;
Swal.defaults.position = 'top-end';
