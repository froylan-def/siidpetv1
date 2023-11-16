<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Drive;

class GoogleDriveController extends Controller
{
    public $gClient;

    function subirArchivo(){
        
        $this->gClient = new Client();
        
        $this->gClient->setApplicationName('siidpet'); // ADD YOUR AUTH2 APPLICATION NAME (WHEN YOUR GENERATE SECRATE KEY)
        $this->gClient->setClientId('170290133021-fu7s97durqa8mjtd2cbj77uf4clo3bso.apps.googleusercontent.com');
        $this->gClient->setClientSecret('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');
        $this->gClient->setRedirectUri('http://172.21.85.37/');
        $this->gClient->setDeveloperKey('AIzaSyCm72hO186GFwXVzexUbU0Bga304NSe_ZM');
        $this->gClient->setScopes(array(               
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        
        $this->gClient->setAccessType("offline");
        
        $this->gClient->setApprovalPrompt("force");


    }

    
}
