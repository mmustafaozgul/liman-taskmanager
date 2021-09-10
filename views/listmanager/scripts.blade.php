<script>
  function listManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('list_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#listele").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }


</script>