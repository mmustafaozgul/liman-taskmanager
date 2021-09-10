<?php
namespace App\Controllers;

class RunScriptController
{
	public function run()
	{
        // runScript function
        // 1st parameter: filename under scripts folder STRING
        // 2nd parameter: parameters STRING
        // 3nd parameter: run as sudo BOOL
		$script = runScript("example.py", "", false);

        return $script;
	}

    public function test()
    {
        validate([
            'testJavascriptVerisi' => 'required|string|max:255'
        ]);

        checkPort("10.0.0.100", 22);

        $istekVerisi = request("testJavascriptVerisi");

        server()->name;
        server()->ip_address;

        user()->name;
        user()->email;

        respond($istekVerisi, 201);

        view("alert", [
            "type" => "danger",
            "title" => "Örnek Alert",
            "message" => "Mesajınızı buraya yazabilirsiniz."
        ]);
    }
}
