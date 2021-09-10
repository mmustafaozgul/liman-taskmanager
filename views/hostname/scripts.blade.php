<script>
    function getHostname(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        data.append("testJavascriptVerisi", $(".hostname").html());

        data.append("degiskenIsmi", $(".hostname").html());


        request("{{ API('get_hostname') }}", data, function(response){
            response = JSON.parse(response);
            $('.hostname').text(response.message);
            Swal.close();
            $('#setHostnameModal').modal('hide');
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>