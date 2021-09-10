<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>
@endcomponent


 
@component("modal-component", [
    "id" => "commandmodal",
    "title" => "komut ekranı",
    "notSized" => "true"
])
<pre id="commandContent" style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"></pre>
@endcomponent



@include("taskmanager.scripts")