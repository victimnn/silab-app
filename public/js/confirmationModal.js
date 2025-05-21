const confirmationModal = document.getElementById('confirmationModal')
        const form = document.getElementById('deletePlaceForm')
        const btnVoltar = document.getElementById('btnVoltar')

        confirmationModal.addEventListener('show.bs.modal', (event) => {
            btnVoltar.focus()
            const id = (event.relatedTarget.getAttribute('data-place-id'));
            form.action = `/places/${id}`
        })