<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#service").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
function jsKillPid(node)
{
    showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#service").html())
        request("{{ API('kill_pid') }}", data, function (response) {
            // Başarılıysa
            
            Swal.close();
            showSwal("Başarıyla sonlandırıldı.","success","2000");
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
}


    function getCommand(node){
         showSwal("Click test...", "warning");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_console_log') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#commandmodal").modal("show");
            $("#commandContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
</script>