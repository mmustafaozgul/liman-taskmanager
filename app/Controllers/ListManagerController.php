<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class ListManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo(" ls -la  ");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "authority" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6],
                 "time" => $process[7],
                 "folder" => $process[8],
                  
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["authority", "pid", "cpu", "status", "service", "ram", "command","time","folder"],
            "title" => ["izinler", "alt.d.no", "sahibi", "Grubu", "boyut", "Ay", "Gün","Saat","Dosya Adı"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Komut Satırı" => [
                "target" => "getCommand",
                "icon" => "fa-solid fa-code"
            ],
    ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function getConsole(){

         validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("systemctl status", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }
}
