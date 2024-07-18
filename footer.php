<footer class="footer mt-auto py-3 bg-body-tertiary">
  <div class="container">
    <span class="text-body-secondary">@ UNCHK <?php echo date('Y'); ?></span>
  </div>
</footer>
<!-- <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
            "oLanguage": {
                "sSearch": "Rechercher",
                "sLengthMenu": "Afficher _MENU_ Lignes par page",
                "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                "oPaginate": {
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const avatarInput = document.querySelector('input[name="avatar"]');
        const avatarPreview = document.getElementById('imagePreview');

        avatarInput.addEventListener('change', function () {
            if (avatarInput.files && avatarInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                    avatarPreview.style.display = 'block';
                };

                reader.readAsDataURL(avatarInput.files[0]);
            }
        });
    });
</script>
    </body>
</html>