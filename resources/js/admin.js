import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

document.addEventListener('submit', function (event) {
    const form = event.target;

    if (!form.classList.contains('js-confirm-action')) {
        return;
    }

    event.preventDefault();

    Swal.fire({
        title: form.dataset.title || '¿Estás seguro de realizar esta acción?',
        text: form.dataset.text || 'Esta acción no se puede deshacer.',
        icon: form.dataset.icon || 'warning',
        showCancelButton: true,
        confirmButtonText: form.dataset.confirmText || 'Confirmar',
        cancelButtonText: form.dataset.cancelText || 'Cancelar',
        cancelButtonColor: form.dataset.cancelColor || '#6b7280',
        confirmButtonColor: form.dataset.confirmColor || '#B0393F',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.classList.remove('js-confirm-action');
            form.submit();
        }
    });
});